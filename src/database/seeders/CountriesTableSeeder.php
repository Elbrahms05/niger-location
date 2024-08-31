<?php
namespace Elbrahms\NigerLocation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Elbrahms\NigerLocation\Models\Country;
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::create([
            'id' => 159,
            'sortname' => 'NE',
            'name' => 'Niger',
            'slug' => 'niger',
            'phonecode' => 227,
            'status' => 1
        ]);

    }
}


