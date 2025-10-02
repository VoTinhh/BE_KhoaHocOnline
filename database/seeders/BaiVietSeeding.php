<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BaiVietSeeding extends Seeder
{
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->insert([
            [
                'tieu_de' => 'Học JavaScript Cơ Bản',
                'slug_tieu_de' => 'hoc-javascript-co-ban',
                'hinh_anh' => 'https://topdev.vn/blog/wp-content/uploads/2023/11/javascript.png',
                'mo_ta_ngan' => 'JavaScript là ngôn ngữ lập trình phổ biến nhất để phát triển web.',
                'noi_dung' => 'Khóa học JavaScript cơ bản giúp bạn nắm vững cú pháp, kiểu dữ liệu, vòng lặp, hàm và cách thao tác DOM...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Khám phá HTML5 và CSS3',
                'slug_tieu_de' => 'kham-pha-html5-css3',
                'hinh_anh' => 'https://hourofcode.vn/wp-content/uploads/2024/10/lap-trinh-web-HTML-CSS.png',
                'mo_ta_ngan' => 'HTML5 và CSS3 là nền tảng để xây dựng giao diện web.',
                'noi_dung' => 'Trong bài viết này, bạn sẽ tìm hiểu về cấu trúc trang web với HTML5 và cách tạo kiểu dáng với CSS3...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Lập trình ReactJS cho người mới',
                'slug_tieu_de' => 'lap-trinh-reactjs-cho-nguoi-moi',
                'hinh_anh' => 'https://khoahocgiatot.com/wp-content/uploads/2024/04/lo-trinh-hoc-react-js-870x440-1.jpg',
                'mo_ta_ngan' => 'ReactJS là thư viện JavaScript phổ biến để xây dựng giao diện người dùng.',
                'noi_dung' => 'Bạn sẽ làm quen với component, props, state và cách quản lý dữ liệu trong ReactJS...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'PHP và Laravel Framework',
                'slug_tieu_de' => 'php-va-laravel-framework',
                'hinh_anh' => 'https://photo2.tinhte.vn/data/attachment-files/2025/03/8660653_Laravel_Framework.webp',
                'mo_ta_ngan' => 'Laravel là framework PHP mạnh mẽ giúp phát triển web nhanh chóng.',
                'noi_dung' => 'Bài viết này giới thiệu về Laravel, cách tổ chức code theo MVC và các tính năng nổi bật như Migration, Seeder, Eloquent...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Hướng dẫn Git và GitHub',
                'slug_tieu_de' => 'huong-dan-git-va-github',
                'hinh_anh' => 'https://d3hi6wehcrq5by.cloudfront.net/itnavi-blog/2021/08/4-1.png',
                'mo_ta_ngan' => 'Git là công cụ quản lý phiên bản mã nguồn phổ biến nhất hiện nay.',
                'noi_dung' => 'Bài viết sẽ hướng dẫn bạn cách khởi tạo repository, commit, push code và làm việc nhóm với GitHub...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Cấu trúc dữ liệu và Giải thuật',
                'slug_tieu_de' => 'cau-truc-du-lieu-va-giai-thuat',
                'hinh_anh' => 'https://gochocit.com/wp-content/uploads/2021/10/cau-truc-du-lieu-va-giai-thuat.jpg',
                'mo_ta_ngan' => 'Cấu trúc dữ liệu và giải thuật là nền tảng quan trọng trong lập trình.',
                'noi_dung' => 'Bài viết này giải thích về Array, Linked List, Stack, Queue và các thuật toán tìm kiếm, sắp xếp cơ bản...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'NodeJS và ExpressJS',
                'slug_tieu_de' => 'nodejs-va-expressjs',
                'hinh_anh' => 'https://caodang.fpt.edu.vn/wp-content/uploads/a-9.png',
                'mo_ta_ngan' => 'NodeJS giúp xây dựng ứng dụng server-side bằng JavaScript.',
                'noi_dung' => 'Bạn sẽ học cách tạo RESTful API với ExpressJS, xử lý request, response và kết nối với cơ sở dữ liệu...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Cơ bản về SQL',
                'slug_tieu_de' => 'co-ban-ve-sql',
                'hinh_anh' => 'https://techvccloud.mediacdn.vn/280518386289090560/2022/1/4/sql-la-gi-1-1641279661816510979667-0-0-393-700-crop-1641280416636717362441.jpg',
                'mo_ta_ngan' => 'SQL là ngôn ngữ dùng để quản lý và truy vấn cơ sở dữ liệu quan hệ.',
                'noi_dung' => 'Trong bài viết này, bạn sẽ làm quen với các câu lệnh SELECT, INSERT, UPDATE, DELETE và JOIN trong SQL...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Học Python cho người mới',
                'slug_tieu_de' => 'hoc-python-cho-nguoi-moi',
                'hinh_anh' => 'https://vtiacademy.edu.vn/upload/images/artboard-1-copy-6-100.jpg',
                'mo_ta_ngan' => 'Python là ngôn ngữ lập trình dễ học, mạnh mẽ và đa năng.',
                'noi_dung' => 'Khóa học Python cho người mới sẽ giúp bạn làm quen với biến, hàm, vòng lặp, cũng như ứng dụng Python trong AI và Data Science...',
                'tinh_trang' => 0,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],

        ]);
    }
}
