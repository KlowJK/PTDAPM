<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'magiaovien' => 'GV001',
            'tengiaovien' => 'Le Van C',
            'khoa' => 'Cong nghe thong tin',
            'quequan' => '2024-03-06',
            'tentaikhoan' => 'teacher1',
        ]);

        Teacher::create([
            'magiaovien' => 'GV002',
            'tengiaovien' => 'Pham Thi D',
            'khoa' => 'Kinh te',
            'quequan' => null,
            'tentaikhoan' => 'teacher1',
        ]);
    }
}
