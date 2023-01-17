<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('it_IT');

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->subject = $faker->sentence();
            $project->presentation = $faker->paragraph();
            $project->content = $faker->paragraphs(3, true);
            // $project->slug = Str::slug($project->title, '-');
            $project->slug = Project::generateSlug($project->title);
            $project->save();
        }
    }
}
