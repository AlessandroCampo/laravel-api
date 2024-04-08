<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $my_stacks = [
            [
                'name' => 'laravel',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg'
            ],
            [
                'name' => 'vue',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/95/Vue.js_Logo_2.svg'
            ],
            [
                'name' => 'Javascript Plain',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png'
            ],
            [
                'name' => 'Tailwind',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg'
            ],
            [
                'name' => 'Bootstrap',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/b/b2/Bootstrap_logo.svg'
            ],
            [
                'name' => 'Phaser 3',
                'logo_url' => 'https://en.wikipedia.org/wiki/Phaser_%28game_framework%29#/media/File:Phaser_Logo.png'
            ],
        ];

        // \App\Models\User::factory(10)->create();
        // $this->call(TechnologySeeder::class);
        // $this->call(ProjectSeeder::class);
        // $this->call(StackSeeder::class);
        $technologies = Technology::all();
        // foreach ($my_stacks as $technology) {
        //     $technologies[] = Technology::factory()->create($technology);
        // }

        $projects = Project::factory(30)->create();
        $projects->each(function (Project $project) use ($technologies) {
            $index = random_int(0, count($technologies) - 1);
            $project->technologies()->attach($technologies[$index]);
        });
    }
}
