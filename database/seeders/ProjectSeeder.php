<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Tag;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     * @return void
     */
    public function run(Faker $faker)
    {
        $tag_ids = Tag::all()->pluck('id')->all();

        for ($i = 0; $i < 50; $i++){

            $project = new Project();
            $project->title = $faker->unique()->sentence($faker->numberBetween(3,5));
            $project->description = $faker->optional()->text(500);
            $project->slug = Str::slug($project->title, '-');
            $project->save();

            $project->tags()->attach( $faker->randomElements($tag_ids));
        }
    }
}
