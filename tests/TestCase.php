<?php

namespace Elbrahms\NigerLocation\Tests;

use Elbrahms\NigerLocation\LocationServiceProvider;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{

    use CreatesApplication;
    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LocationServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('app.key', 'base64:' . base64_encode(
            Encrypter::generateKey($app['config']['app.cipher'])
        ));

        $app['config']->set('location.countries_table', 'countries');
        $app['config']->set('location.regions_table', 'regions');
        $app['config']->set('location.departements_table', 'departements');
        $app['config']->set('location.communes_table', 'communes');
        $app['config']->set('location.localites_table', 'localites');
        $app['config']->set('location.country_initial_id', 159);
        $app['config']->set('location.routes.prefix', 'location');
        $app['config']->set('location.routes.middleware', 'web');
    }

    /**
     * Set up the database.
     */
    protected function setUpDatabase()
    {
        // Use Laravel's migrate:fresh to handle the migrations
        Artisan::call('migrate:fresh');

        // Seed the database
        $this->seedDatabase();
    }

    /**
     * Seed the database with required data.
     */
    protected function seedDatabase()
    {
        $this->seed(\Elbrahms\NigerLocation\Database\Seeders\CountriesTableSeeder::class);
        $this->seed(\Elbrahms\NigerLocation\Database\Seeders\RegionsTableSeeder::class);
        $this->seed(\Elbrahms\NigerLocation\Database\Seeders\DepartementsTableSeeder::class);
        $this->seed(\Elbrahms\NigerLocation\Database\Seeders\CommunesTableSeeder::class);
        $this->seed(\Elbrahms\NigerLocation\Database\Seeders\LocalitesTableSeeder::class);
    }
}

