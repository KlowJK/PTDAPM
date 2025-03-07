<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Property;
use app\Models\Admin;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'maquantri' => 'QT001',
            'tenquantri' => 'Nguyen Van A',
            'quequan' => 'Da Nang',
            'tentaikhoan' => 'admin1',
        ]);

        $this->call([]);
    }
}
