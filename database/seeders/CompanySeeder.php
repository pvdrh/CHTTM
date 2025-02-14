<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['name' => 'CÔNG TY CỔ PHẦN CÔNG NGHỆ SỐ THIÊN QUANG', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-cong-nghe-so-thien-quang-b906eec4de4398408fd4b215feffc22e-65b20947c23b6.jpg', 'category_id' => 10],
            ['name' => 'Công ty CP Vật Liệu Công Nghệ Cao Kim Nam', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-cp-vat-lieu-cong-nghe-cao-kim-nam-b3d4949e994ff7ea2b8e2828ac61c5d1-653875ac6663e.jpg', 'category_id' => 8],
            ['name' => 'Công ty Cổ phần 9Pay', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-9pay-6066e0b3e8cb4.jpg', 'category_id' => 16],
            ['name' => 'CÔNG TY CỔ PHẦN GIAO HÀNG TIẾT KIỆM', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-giao-hang-tiet-kiem-637de1b0d244b.jpg', 'category_id' => 11],
            ['name' => 'CÔNG TY TNHH DỰ TÀI (IVY MODA FASHION BRAND)', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/28a42072cbea574cbd0550e41ff39b66-624acbd255a1a.jpg', 'category_id' => 8],
            ['name' => 'Công ty TNHH Pentalog Việt Nam', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-tnhh-pentalog-viet-nam-5fbf586cd46db.jpg', 'category_id' => 2],
            ['name' => 'CÔNG TY CỔ PHẦN SMARTOSC', 'image' => 'https://cdn-new.topcv.vn/unsafe/135x/https://static.topcv.vn/company_logos/cong-ty-co-phan-smartosc-61d50e76c4aec.jpg', 'category_id' => 2],
            ['name' => 'XGame', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/nKFmdM5Qw0mbANlHDgL7pReCus9WQaR3_1712830639____0f74783143728af1d20bcbb9f8cad321.png', 'category_id' => 2],
            ['name' => 'VTI Corporatin', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/gh8H6QNmETfUUqBtealyL1t3AtSi3XKZ_1671704587____bc1bbf964552b7cccd04b616d9e44e47.jpg', 'category_id' => 2],
            ['name' => 'CÔNG TY CỔ PHẦN DỊCH VỤ TRUYỀN THÔNG ĐA PHƯƠNG TIỆN VIỆT NAM', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/RWMPtlAo1uV4cAYFmvTJBi5U7qtQjWOX_1697688842____57508d3bdddc9908bfa140cad17d90ee.jpg', 'category_id' => 9],
            ['name' => 'FPT Software', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/fpt-software-6073b38a10cb4.jpg', 'category_id' => 2],
            ['name' => 'CÔNG TY CỔ PHẦN DỊCH VỤ DI ĐỘNG THỂ HỆ MỚI (NMS)', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-dich-vu-di-dong-the-he-moi-nms-612f13af7b344.jpg', 'category_id' => 9],
            ['name' => 'Công ty Cổ phần viễn thông FPT', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-vien-thong-fpt-5d5f5980e317c.jpg', 'category_id' => 10],
            ['name' => 'Công ty cổ phần chứng khoán FPT', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-chung-khoan-fpt-5d807abb59677.jpg', 'category_id' => 16],
            ['name' => 'Công ty Cổ phần Bán lẻ Kỹ thuật số FPT', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/n0KHk7XaKpN8TxBOwdnP6rc2Gh8WXyg2_1634027913____6f6b658004e401d4a82dabc09b019e00.PNG', 'category_id' => 8],
            ['name' => 'Công ty Cổ phần Đào tạo trực tuyến Unica', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-co-phan-dao-tao-truc-tuyen-unica-592566f2a73be_rs.jpg', 'category_id' => 4],
            ['name' => 'CÔNG TY CỔ PHẦN VINSCHOOL', 'image' => 'https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/IWgswbwUnoLOrYkhMlzv0jHNxbWU3kgz_1633685713____cac5f742fc82a09850b270566e892324.jpg', 'category_id' => 3]
        ];

        foreach ($companies as $item) {
            \App\Models\Company::create($item);
        }
    }
}
