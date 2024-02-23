<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\type;

use function PHPSTORM_META\type;

class typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // qua si fa normalmente essendo che non deve far riferimento a niente questa tabella
        type::factory()->count(7)->create();
    }
}
