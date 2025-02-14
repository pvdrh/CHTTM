<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CurrentJob;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    const MAX_SALARY = 20000000;
    const MAX_EXPERIENCE = 3;
    const MAX_GPA = 4;

    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'data' => $users,
        ], 200);
    }

    public function show($id)
    {
        $user = User::with(['userInfor'])->find($id);

        return response()->json([
            'data' => $user,
        ], 200);
    }

    public function getAllSkills(): JsonResponse
    {
        $skills = Skill::all();
        return response()->json([
            'data' => $skills,
        ], 200);
    }

    public function getAllJobPositions(): JsonResponse
    {
        $jobs = JobPosition::all();
        return response()->json([
            'data' => $jobs,
        ], 200);
    }

    public function getCompanySuggests()
    {
        $companySuggests = Company::inRandomOrder()->take(5)->get();

        return response()->json([
            'data' => $companySuggests,
        ], 200);
    }

    public function getJobSuggests(Request $request)
    {
        $search = $request->get('search');
        $userId = (int)$request->input('user_id');
        $salaryWeight = floatval($request->get('salary'));
        $gpaWeight = floatval($request->get('gpa'));
        $experienceWeight = floatval($request->get('experience'));

        $user = User::with('userInfor')->find($userId);
        $query = CurrentJob::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $jobs = $query->where('category_id', $user->userInfor->category_id)->with(['company'])->get();

        if ($salaryWeight > 0 || $gpaWeight > 0 || $experienceWeight > 0) {
            //Chuẩn hoá dữ liệu người dùng
            $userSalary = ($user->userInfor->salary_expect <= self::MAX_SALARY) ? $user->userInfor->salary_expect / self::MAX_SALARY : 1;
            $userGpa = ($user->userInfor->gpa <= self::MAX_GPA) ? $user->userInfor->gpa / self::MAX_GPA : 1;
            $userExperience = ($user->userInfor->experience <= self::MAX_EXPERIENCE) ? $user->userInfor->experience / self::MAX_EXPERIENCE : 1;

            //Chuẩn hoá dữ liệu job
            $dataOfJobs = [];
            foreach ($jobs as $job) {
                $salary = ($job->salary_to <= self::MAX_SALARY) ? $job->salary_to / self::MAX_SALARY : 1;
                $gpa = ($job->gpa_from <= self::MAX_GPA) ? $job->gpa_from / self::MAX_GPA : 1;
                $experience = ($job->experience <= self::MAX_EXPERIENCE) ? $job->experience / self::MAX_EXPERIENCE : 1;
                $dataOfJobs[] = [
                    'experience' => $experience,
                    'salary' => $salary,
                    'gpa' => $gpa,
                ];
            }
//            dd($dataOfJobs);
            $weighted_user_values = [
                'experience' => $userExperience * $experienceWeight,
                'salary' => $userSalary * $salaryWeight,
                'gpa' => $userGpa * $gpaWeight,
            ];
            $weighted_job_values = [];
            foreach ($dataOfJobs as $dataOfJob) {
                $weighted_job_values[] = [
                    'experience' => $dataOfJob['experience'] * $experienceWeight,
                    'salary' => $dataOfJob['salary'] * $salaryWeight,
                    'gpa' => $dataOfJob['gpa'] * $gpaWeight,
                ];
            }

            // Xác định giá trị tốt nhất và tệ nhất cho mỗi tiêu chí
            $weighted_job_salaries = array_column($weighted_job_values, 'salary');
            $weighted_job_gpas = array_column($weighted_job_values, 'gpa');
            $weighted_job_experiences = array_column($weighted_job_values, 'experience');

            // Kết hợp mảng của weighted job values với mảng của weighted user values
            $merged_salaries = array_merge($weighted_job_salaries, array($weighted_user_values['salary']));
            $merged_gpas = array_merge($weighted_job_gpas, array($weighted_user_values['gpa']));
            $merged_experiences = array_merge($weighted_job_experiences, array($weighted_user_values['experience']));

            // Tính giá trị lớn nhất và nhỏ nhất
            $best_values = array(
                'salary' => max($merged_salaries),
                'gpa' => max($merged_gpas),
                'experience' => max($merged_experiences)
            );

            $worst_values = array(
                'salary' => min($merged_salaries),
                'gpa' => min($merged_gpas),
                'experience' => min($merged_experiences)
            );

            // Tính toán khoảng cách từ mỗi giải pháp đến giải pháp tốt nhất và tệ nhất
            $distances_to_best = [];
            $distances_to_worst = [];
            foreach ($weighted_job_values as $weighted_job_value) {
                $distances_to_best[] = sqrt(
                    pow($weighted_job_value['salary'] - $best_values['salary'], 2) + pow(
                        $weighted_job_value['gpa'] - $best_values['gpa'],
                        2
                    ) + pow($weighted_job_value['experience'] - $best_values['experience'], 2)
                );
                $distances_to_worst[] = sqrt(
                    pow($weighted_job_value['salary'] - $worst_values['salary'], 2) + pow(
                        $weighted_job_value['gpa'] - $worst_values['gpa'],
                        2
                    ) + pow($weighted_job_value['experience'] - $worst_values['experience'], 2)
                );
            }

            // Tính toán chỉ số tương đối gần gũi cho mỗi công việc
            for ($i = 0; $i < count($jobs); $i++) {
                $jobs[$i]['result'] = $distances_to_worst[$i] / ($distances_to_best[$i] + $distances_to_worst[$i]);
            }

            $jobs = $jobs->toArray();
            usort($jobs, function ($a, $b) {
                if ($a['result'] == $b['result']) {
                    return 0;
                }
                return ($a['result'] > $b['result']) ? -1 : 1;
            });
        }

        return response()->json([
            'data' => $jobs,
        ], 200);
    }
}
