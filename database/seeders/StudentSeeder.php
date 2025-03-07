<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Student;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Student::create([
            'masinhvien' => 'SV001',
            'tensinhvien' => 'Nguyen Van A',
            'khoa' => 'Cong nghe thong tin',
            'ngaysinh' => '2000-01-01',
            'ngayratruong' => '2024-06-30',
            'quequan' => 'Ha Noi',
            'tentaikhoan' => 'student1',
        ]);

        Student::create([
            'masinhvien' => 'SV002',
            'tensinhvien' => 'Tran Thi B',
            'khoa' => 'Kinh te',
            'ngaysinh' => '2001-05-15',
            'ngayratruong' => null,
            'quequan' => 'TP HCM',
            'tentaikhoan' => 'student1',
        ]);
    }
}
