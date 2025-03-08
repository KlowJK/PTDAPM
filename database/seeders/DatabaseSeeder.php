<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Property;
use app\Models\Admin;
use App\Models\Feedback;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,

            DocumentSeeder::class,
            ResearchPaperSeeder::class,
            NewsSeeder::class,
            FeedbackSeeder::class,
        ]);
    }
}
