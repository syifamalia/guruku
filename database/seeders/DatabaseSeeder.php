<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'name' => 'Syifa Amalia',
            'username' => 'syifamalia',
            'email' => 'syifamalia@gmail.com',
            'password' => bcrypt('12345')
        ]);
    }
}
