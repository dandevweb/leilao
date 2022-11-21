<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->create([
            'name' => 'Danilo Augusto',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('password'),

        ]);

        Client::factory(20)->create();
    }
}