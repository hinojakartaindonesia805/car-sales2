<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suara;

class SuaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suara::factory()->count(100)->create();
    }
}
