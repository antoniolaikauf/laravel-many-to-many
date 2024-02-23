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
        // qua avviene il collegamento con la many to many 
        // si prende technology dei modelse in questo caso si usa create e each nelle meny to many questo perchè 
        // per far si che si colleghino tra di loro le tabelle many to many devono essere gia create e popolate nel database se no la tabella 
        // ponte non sa a chi riferirsi se non sono create di gia le due tabelle 
        // essendo che con la make le crea ma non popola il database quindi non funzionerebbe 
        technology::factory()
            ->count(10)
            ->create()
            ->each(function ($technologie) {
                // si prende un progetto e si da un limite che sarebbe quante volte un id del progetto può appartenere ad una row della tabella technologies
                // quindi in questo caso l'id 1 si potra avere solo in 3 row 
                $projects = project::inRandomOrder()->limit(3)->get();
                $technologie->projects()->attach($projects);
                $technologie->save();
            });
    }
}
