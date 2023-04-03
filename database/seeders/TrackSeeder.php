<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Track;
use Faker\Generator as Faker;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 50; $i++) {
            $track = new Track;
            $track ->title = $faker->firstNameFemale();  
            $track ->album = $faker->lastName();
            $track ->author = $faker->titleMale();
            $track ->editor = $faker->titleFemale();;
            $track ->length = $faker->numberBetween(0, 100);
            $track ->poster = "https://picsum.photos/300/200";
            $track ->save();
        }

    }
} 
