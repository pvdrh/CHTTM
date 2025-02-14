<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Kinh doanh'],
            ['name' => 'IT phần mềm'],
            ['name' => 'Hành chính'],
            ['name' => 'Giáo dục'],
            ['name' => 'Tư vấn'],
            ['name' => 'Truyền thông'],
            ['name' => 'Kế toán'],
            ['name' => 'Thương mại'],
            ['name' => 'Dịch vụ'],
            ['name' => 'Viễn thông'],
            ['name' => 'Logistic'],
            ['name' => 'Xây dựng'],
            ['name' => 'Nông nghiệp'],
            ['name' => 'Công nghệ'],
            ['name' => 'Điện tử'],
            ['name' => 'Tài chính'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
