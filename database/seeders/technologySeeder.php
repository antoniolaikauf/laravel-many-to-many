<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\technology;
use App\Models\project;

class technologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        technology::factory()
        ->count(10)
        ->create()
        ->each(function ($technologie) {

            $projects = project::inRandomOrder()->limit(3)->get();
            $technologie->projects()->attach($projects);
            $technologie->save();
        });
    }
}
