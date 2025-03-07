<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Document::create([
            'matailieu' => 'TL001',
            'tentailieu' => 'Huong dan dang ky hoc phan',
            'path' => '/documents/huongdan.pdf',
            'noidung' => 'Tai lieu huong dan chi tiet...',
            'ngaydang' => now(),
            'nguoidang' => 'admin1',
        ]);

        Document::create([
            'matailieu' => 'TL002',
            'tentailieu' => 'De cuong mon hoc',
            'path' => '/documents/decuong.pdf',
            'noidung' => 'Noi dung de cuong mon hoc...',
            'ngaydang' => now(),
            'nguoidang' => 'teacher1',
        ]);
    }
}
