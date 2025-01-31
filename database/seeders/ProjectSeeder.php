<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users
        $users = User::pluck('id');
        
        if ($users->count() < 2) {
            $this->command->info('Not enough users in the database. Please seed users first.');
            return;
        }

        $projects = [];
        for ($i = 1; $i <= 40; $i++) {
            $issuedBy = $users->random();
            $clientId = $users->whereNotIn('id', [$issuedBy])->random();
            
            $projects[] = [
                'project_name' => 'Project ' . $i,
                'issued_by' => $issuedBy,
                'client_id' => $clientId,
                'description' => 'This is a description for project ' . $i . '.',
                'target_date' => now()->addDays(rand(30, 365))->toDateString(),
                'status' => collect(['ongoing', 'pending', 'completed'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('projects')->insert($projects);
    }
}
