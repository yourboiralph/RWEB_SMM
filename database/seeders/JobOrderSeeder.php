<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class JobOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch some existing project and user IDs
        $projectIds = DB::table('projects')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        if (empty($projectIds) || count($userIds) < 2) {
            $this->command->warn('Not enough data in projects or users table. Please seed them first.');
            return;
        }

        $faker = Faker::create();
        $jobs = [];
        for ($i = 0; $i < 40; $i++) {
            $jobs[] = [
                'project_id' => $faker->randomElement($projectIds),
                'worked_by' => $faker->randomElement($userIds),
                'issued_by' => $faker->randomElement($userIds),
                'job_name' => $faker->jobTitle,
                'description' => $faker->sentence,
                'target_date' => $faker->dateTimeBetween('+1 days', '+30 days')->format('Y-m-d'),
                'status' => $faker->randomElement(['pending', 'in-progress', 'completed']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('jobs')->insert($jobs);
    }
}
