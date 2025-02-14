<?php

namespace Database\Seeders;

use App\Models\CurrentJob;
use Illuminate\Database\Seeder;

class CurrentJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentJobs = [
            [
                'name' => 'Lập Trình Viên PHP (Senior)',
                'company_id' => 17,
                'salary_from' => null,
                'salary_to' => 20000000,
                'experience' => 2,
                'gpa_from' => 2.5,
                'category_id' => 2,
                'job_type' => 0
            ],
            [
                'name' => 'Giáo Viên Tin Học',
                'company_id' => 17,
                'salary_from' => 15000000,
                'salary_to' => 18000000,
                'experience' => 0.5,
                'category_id' => 4,
                'gpa_from' => 2.5,
                'job_type' => 0
            ],
            [
                'name' => 'Giáo Viên Tiếng Anh (THCS & THPT)',
                'company_id' => 17,
                'salary_from' => null,
                'salary_to' => 15000000,
                'category_id' => 4,
                'experience' => 1,
                'gpa_from' => 2.5,
                'job_type' => 1
            ],
            [
                'name' => 'Trợ Giảng Tiếng Anh (Giáo Viên Tiếng Anh Nguồn) - Khối Tiểu Học & Trung Học ',
                'company_id' => 17,
                'salary_from' => null,
                'salary_to' => 10000000,
                'category_id' => 4,
                'experience' => 0,
                'gpa_from' => 3,
                'job_type' => 1
            ],
            [
                'name' => 'Middle/Senior PHP Developer (Upto 30M)',
                'company_id' => 1,
                'salary_from' => 15000000,
                'salary_to' => 20000000,
                'category_id' => 2,
                'experience' => 2,
                'gpa_from' => 3,
                'job_type' => 1
            ],
            [
                'name' => 'Trưởng Nhóm Lập Trình Viên PHP',
                'company_id' => 2,
                'salary_from' => 10000000,
                'salary_to' => 15000000,
                'experience' => 2,
                'category_id' => 2,
                'gpa_from' => 3,
                'job_type' => 2
            ],
            [
                'name' => 'Content Marketing',
                'company_id' => 2,
                'salary_from' => 10000000,
                'salary_to' => 20000000,
                'experience' => 0,
                'gpa_from' => 2,
                'job_type' => 2,
                'category_id' => 6,
            ],
            [
                'name' => 'Chuyên Viên Lập Trình PHP',
                'company_id' => 2,
                'salary_from' => 10000000,
                'salary_to' => 20000000,
                'experience' => 3,
                'gpa_from' => 2,
                'category_id' => 2,
                'job_type' => 3
            ],
            [
                'name' => 'Chuyên Viên Designer (UI-UX)',
                'company_id' => 2,
                'salary_from' => 10000000,
                'salary_to' => 20000000,
                'experience' => 1,
                'gpa_from' => 2.8,
                'category_id' => 6,
                'job_type' => 2
            ],
            [
                'name' => 'Technical Leader (PHP)',
                'company_id' => 2,
                'salary_from' => 8000000,
                'salary_to' => 11000000,
                'experience' => 2.5,
                'gpa_from' => 3.8,
                'category_id' => 2,
                'job_type' => 1
            ],
            [
                'name' => 'Chuyên Viên Kinh Doanh Khách Hàng Doanh Nghiệp',
                'company_id' => 2,
                'salary_from' => 14000000,
                'salary_to' => 17000000,
                'experience' => 3,
                'category_id' => 1,
                'gpa_from' => 3,
                'job_type' => 1
            ],
            [
                'name' => 'Chuyên Viên Kinh Doanh / Tư Vấn/ Sales',
                'company_id' => 2,
                'salary_from' => 8000000,
                'salary_to' => 20000000,
                'experience' => 2,
                'category_id' => 1,
                'gpa_from' => 2,
                'job_type' => 1
            ],
            [
                'name' => 'Nhân Viên Kinh Doanh /Sale/Tư Vấn Tuyển Sinh - Tại Hà Nội - Thu Nhập Đến 25 Triệu/Tháng',
                'company_id' => 5,
                'salary_from' => 8000000,
                'salary_to' => 15000000,
                'experience' => 0.5,
                'category_id' => 1,
                'gpa_from' => 2.5,
                'job_type' => 1
            ],
            [
                'name' => 'Frontend Developer (VueJS/NuxtJS)',
                'company_id' => 3,
                'salary_from' => 8000000,
                'salary_to' => 17000000,
                'experience' => 0.5,
                'category_id' => 2,
                'gpa_from' => 2.5,
                'job_type' => 1
            ],
            [
                'name' => 'Frontend Developer (Angular, TypeScript)',
                'company_id' => 4,
                'salary_from' => 8000000,
                'salary_to' => 17500000,
                'experience' => 1,
                'category_id' => 2,
                'gpa_from' => 2.8,
                'job_type' => 1
            ],
            [
                'name' => 'Immigration Consultant ( Nhân Viên Tư Vấn , Sales) ',
                'company_id' => 1,
                'salary_from' => 8000000,
                'salary_to' => 17500000,
                'experience' => 1,
                'category_id' => 2,
                'gpa_from' => 2.8,
                'job_type' => 1
            ],
            [
                'name' => 'Giáo Viên IELTS - Giáo Viên Tiếng Anh',
                'company_id' => 9,
                'salary_from' => 10000000,
                'salary_to' => 18500000,
                'experience' => 2,
                'category_id' => 4,
                'gpa_from' => 2.8,
                'job_type' => 1
            ],
            [
                'name' => 'Giáo Viên Tiếng Nhật',
                'company_id' => 8,
                'salary_from' => 10000000,
                'salary_to' => 15500000,
                'experience' => 1,
                'category_id' => 4,
                'gpa_from' => 2.5,
                'job_type' => 1
            ],
            [
                'name' => 'Giáo Viên Tiếng Nhật',
                'company_id' => 1,
                'salary_from' => 10000000,
                'salary_to' => 16500000,
                'experience' => 1.5,
                'category_id' => 4,
                'gpa_from' => 2.5,
                'job_type' => 1
            ],
        ];

        foreach ($currentJobs as $currentJob) {
            CurrentJob::create($currentJob);
        }
    }
}
