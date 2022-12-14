<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $this->call(UserSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(AuctionSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(VehicleImageSeeder::class);
        $this->call(PropertyImageSeeder::class);
    }
}