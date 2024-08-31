<?php
namespace Elbrahms\NigerLocation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Elbrahms\NigerLocation\Models\Localite;

class LocalitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the path to the localites.sql file in the same directory as this seeder
        $path = __DIR__ . '/localites.sql';

        if (file_exists($path)) {
            $sql = file_get_contents($path);
            DB::statement($sql);
        } else {
            // Handle the error if the file does not exist
            throw new \Exception("The file localites.sql does not exist at the path: $path");
        }
    }
}
