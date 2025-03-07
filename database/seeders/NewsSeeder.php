<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        News::create([
            'matintuc' => 'TT001',
            'tentintuc' => 'Khai giang nam hoc moi',
            'tomtat' => 'Truong to chuc le khai giang...',
            'path' => '/news/khaigiang.pdf',
            'ngaydang' => now(),
            'nguoidang' => 'admin1',
        ]);

        News::create([
            'matintuc' => 'TT002',
            'tentintuc' => 'Hoi thao khoa hoc',
            'tomtat' => 'Hoi thao ve cong nghe moi...',
            'path' => '/news/hoithao.pdf',
            'ngaydang' => now(),
            'nguoidang' => 'teacher1',
        ]);
    }
}
