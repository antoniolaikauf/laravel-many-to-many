<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // qua si chiamano i seeder e bisogna farli in ordine essendo che verranno fate in base a quelle 
        // si mette la tabella nucleo per prima essendo che la tabella figlia della tabella nucleo deve far riferimento ad essa quindi 
        // se si crea prima la tabella figlia non sa a chi riferirsi e quindi da errore
       $this->call([
            typeSeeder::class,
            projectSeeder::class
       ]);
    }
}
