<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nhan_viens')->delete();

        DB::table('nhan_viens')->truncate();

        DB::table('nhan_viens')->insert([
            [
                'email'             =>  'vohungtinh@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Võ Hưng Tĩnh',
                'so_dien_thoai'     =>  '0905523543',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  1,
            ],
            [
                'email'             =>  'admintinh@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Admin Tĩnh',
                'so_dien_thoai'     =>  '0388824999',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  2,
            ],
        ]);
    }
}
