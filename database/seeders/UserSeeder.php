<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Lê Hồng Minh', 'email' => 'minhlh@gmail.com'],
            ['name' => 'Phạm Thu Hà', 'email' => 'hapt@gmail.com'],
            ['name' => 'Nguyễn Thị Hương', 'email' => 'huongnt@gmail.com'],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }

        $userInfors = [
            [
                'category_id' => 2,
                'user_id' => 1,
                'salary_expect' => 19500000,
                'gpa' => 3.8,
                'experience' => 3,
            ],
            [
                'user_id' => 2,
                'category_id' => 4,
                'salary_expect' => 12000000,
                'gpa' => 3.5,
                'experience' => 1.5,
            ],
            [
                'user_id' => 3,
                'salary_expect' => 15000000,
                'gpa' => 2.5,
                'category_id' => 1,
                'experience' => 2,
            ],
        ];

        foreach ($userInfors as $data) {
            \App\Models\UserInfor::create($data);
        }
    }
}
