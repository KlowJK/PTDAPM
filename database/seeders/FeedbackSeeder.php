<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Feedback::create([
            'mathacmac' => 'TM001',
            'noidung' => 'Lam sao de dang ky hoc phan?',
            'ngaythacmac' => now(),
            'ngayphanhoi' => now()->addDay(),
            'nguoiphanhoi' => 'admin1',
        ]);

        Feedback::create([
            'mathacmac' => 'TM002',
            'noidung' => 'Lich thi cuoi ky khi nao cong bo?',
            'ngaythacmac' => now(),
            'ngayphanhoi' => null,
            'nguoiphanhoi' => null,
        ]);
    }
}
