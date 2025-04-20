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
            'name' => 'Sabaria',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345'),
            'mobile' => '0812345678',
            'address' => 'Indonesia',
            'gender' => 'Female',
            'role' => 'Admin',
        ]);
    }
}
