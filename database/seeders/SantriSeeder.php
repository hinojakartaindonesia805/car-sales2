<?php

namespace Database\Seeders;

use Database\Factories\SantriFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SantriFactory::new()->count(100)->create();
    }
}
