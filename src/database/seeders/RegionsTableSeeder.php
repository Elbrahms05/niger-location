<?php
namespace Elbrahms\NigerLocation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Elbrahms\NigerLocation\Models\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country_id = config('location.country_initial_id', 159);
        Region::create([
            'id' => 1,
            'name' => 'AGADEZ',
            'code' => 'AZ',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 2,
            'name' => 'DIFFA',
            'code' => 'DA',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 3,
            'name' => 'DOSSO',
            'code' => 'DO',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 4,
            'name' => 'MARADI',
            'code' => 'MI',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 5,
            'name' => 'TAHOUA',
            'code' => 'TA',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 6,
            'name' => 'TILLABERI',
            'code' => 'TI',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 7,
            'name' => 'ZINDER',
            'code' => 'ZR',
            'region_country_id' => $country_id
        ]);



        Region::create([
            'id' => 8,
            'name' => 'NIAMEY',
            'code' => 'NY',
            'region_country_id' => $country_id
        ]);
    }
}
