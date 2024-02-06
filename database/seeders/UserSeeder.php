<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'superadmin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('secret'),
            'role' => 'SuperAdmin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
