<?php

namespace Elbrahms\NigerLocation\Database\Seeders;

use Illuminate\Database\Seeder;

class LocationDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DepartementsTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        $this->call(LocalitesTableSeeder::class);
    }
}
