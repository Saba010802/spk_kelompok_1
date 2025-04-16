<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'usertype' => 'Admin',
            'name' => 'Grup 5',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345'),
            'mobile' => '0812345',
            'address' => 'Indonesia',
            'gender' => 'Male',
            'role' => 'Admin',
        ]);
    }
}
