<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['HTML', 'CSS', 'JavaScript', 'PHP', 'SQL', 'Vue.js', 'Sass', 'Bootstrap'];

        foreach ($technologies as $technology) {
            $newTech = new Technology();
            $newTech->name = $technology;
            $newTech->description = $faker->text(150);
            $newTech->utility = $faker->paragraph(1); 
            $newTech->save();
        }
    }
}
