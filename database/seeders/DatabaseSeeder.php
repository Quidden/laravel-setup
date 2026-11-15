<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(3)->create();

        foreach ($users as $user) {
            $projects = Project::factory(2)->create([
                'user_id' => $user->id,
            ]);

            foreach ($projects as $project) {
                $tasks = Task::factory(5)->sequence(
                    ['status' => 'new'],
                    ['status' => 'in_progress'],
                    ['status' => 'done']
                )->create([
                    'project_id' => $project->id,
                    'author_id' => $user->id,
                ]);

                foreach ($tasks as $task){
                    $commentAuthors = $users->random(fake()->numberBetween(2, 3));

                    foreach ($commentAuthors as $commentAuthor) {
                        Comment::factory()->create([
                            'task_id' => $task->id,
                            'user_id' => $commentAuthor->id,
                        ]);
                    }
                }
            }
        }

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
