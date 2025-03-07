<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\ResearchPaper;

class ResearchPaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ResearchPaper::create([
            'mabaiviet' => 'BV001',
            'tenbaiviet' => 'Nghien cuu ve AI',
            'noidung' => 'Noi dung nghien cuu ve tri tue nhan tao...',
            'path' => '/articles/ai.pdf',
            'ngaydang' => now(),
            'nguoidang' => 'teacher1',
        ]);

        ResearchPaper::create([
            'mabaiviet' => 'BV002',
            'tenbaiviet' => 'Phan tich kinh te 2025',
            'noidung' => 'Phan tich xu huong kinh te...',
            'path' => '/articles/kinhte.pdf',
            'ngaydang' => now(),
            'nguoidang' => 'teacher1',
        ]);
    }
}
