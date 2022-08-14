<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for($i=0;$i<10;$i++){
            $role[]=[
                'ten_role'=>'Admin',
                'mo_ta'=>'Cao Cấp',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            $danh_muc[]=[
                'ten_danhmuc'=>'BackEnd',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            $khoa_hoc[]=[
                'ten_khoahoc'=>'Php3',
                'hinh_anh'=>'1.jpg',
                'mo_ta'=>'laravel',
                'ngay_dang'=>date('2022-12-9'),
                'so_luot_xem'=>'123',
                'id_danhmuc'=>1,
                'id_giangvien'=>1,
                'gia_khoahoc'=>'400.000',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            $lop[]=[
                'ten_lop'=>'123ph',
                'id_giangvien'=>1,
                'id_khoahoc'=>3,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            $giang_vien[]=[
                'ten_giangvien'=>'Hoàng Thắng',
                'hinh_anh'=>'1.jpg',
                'dia_chi'=>'Thạch Thất',
                'email'=>'tung9122002@gmail.com',
                'sdt'=>'907897321',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            $dang_ky[]=[
                'id_user'=>4,
                'id_lop'=>4,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            $slider[]=[
                'tieu_de'=>'Khóa học hay',
                'mo_ta'=>'Hay lắm',
                'hinh_anh'=>'1.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            

        }
        DB::table('danh_muc')->insert($danh_muc);
        DB::table('khoa_hoc')->insert($khoa_hoc);
        DB::table('lop')->insert($lop);
        DB::table('giang_vien')->insert($giang_vien);
        DB::table('dang_ky')->insert($dang_ky);
        DB::table('slider')->insert($slider);
        DB::table('role')->insert($role);
        DB::table('users')->insert([
            'name' => "Poly",
            'email' => 'poly@gmail.com',
            'hinh_anh'=>'1.jpg',
            'sdt'=>'0392725483',
            'dia_chi'=>'Thạch Thất',
            'id_role'=>1,
            'password' => Hash::make('123456'),
        ]);
    }
}
