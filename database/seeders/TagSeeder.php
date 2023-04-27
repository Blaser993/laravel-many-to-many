<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['CSS','SASS','HTML','JS','Bootstrap','PHP','Vue','Laravel'];

        foreach ($tags as $tag_name) {
            $tag = new Tag();

            $tag->name = $tag_name;
            $tag->slug = Str::slug($tag_name);

            $tag->save();
        }
    }
}
