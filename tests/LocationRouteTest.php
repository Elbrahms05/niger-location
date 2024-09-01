<?php

namespace Elbrahms\NigerLocation\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Elbrahms\NigerLocation\Models\Country;
use Elbrahms\NigerLocation\Models\Region;
use Elbrahms\NigerLocation\Models\Departement;
use Elbrahms\NigerLocation\Models\Commune;
use Elbrahms\NigerLocation\Models\Localite;
use Elbrahms\NigerLocation\Tests\TestCase;

class LocationRouteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Ensure a clean database state before each test
        Country::query()->delete();
        Region::query()->delete();
        Departement::query()->delete();
        Commune::query()->delete();
        Localite::query()->delete();
    }

    /** @test */
    public function it_can_access_all_countries()
    {
        Country::factory()->count(3)->create();

        $response = $this->getJson('/location/countries');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_a_country_by_id()
    {
        $country = Country::factory()->create();

        $response = $this->getJson('/location/country/' . $country->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $country->id]);
    }

    /** @test */
    public function it_can_access_all_regions()
    {
        Region::factory()->count(3)->create();

        $response = $this->getJson('/location/regions');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_a_region_by_id()
    {
        $region = Region::factory()->create();

        $response = $this->getJson('/location/region/' . $region->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $region->id]);
    }

    /** @test */
    public function it_can_access_regions_by_country_id()
    {
        $country = Country::factory()->create();
        Region::factory()->count(3)->create(['region_country_id' => $country->id]);

        $response = $this->getJson('/location/regions-by-country/' . $country->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_all_departements()
    {
        Departement::factory()->count(3)->create();

        $response = $this->getJson('/location/departements');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_a_departement_by_id()
    {
        $departement = Departement::factory()->create();

        $response = $this->getJson('/location/departement/' . $departement->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $departement->id]);
    }

    /** @test */
    public function it_can_access_departements_by_region_id()
    {
        $region = Region::factory()->create();
        Departement::factory()->count(3)->create(['departement_region_id' => $region->id]);

        $response = $this->getJson('/location/departements-by-region/' . $region->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_departements_by_country_id()
    {
        $country = Country::factory()->create();
        $region = Region::factory()->create(['region_country_id' => $country->id]);
        Departement::factory()->count(3)->create(['departement_region_id' => $region->id]);

        $response = $this->getJson('/location/departements-by-country/' . $country->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_all_communes()
    {
        Commune::factory()->count(3)->create();

        $response = $this->getJson('/location/communes');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_a_commune_by_id()
    {
        $commune = Commune::factory()->create();

        $response = $this->getJson('/location/commune/' . $commune->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $commune->id]);
    }

    /** @test */
    public function it_can_access_communes_by_departement_id()
    {
        $departement = Departement::factory()->create();
        Commune::factory()->count(3)->create(['commune_departement_id' => $departement->id]);

        $response = $this->getJson('/location/communes-by-departement/' . $departement->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_communes_by_region_id()
    {
        $region = Region::factory()->create();
        $departement = Departement::factory()->create(['departement_region_id' => $region->id]);
        Commune::factory()->count(3)->create(['commune_departement_id' => $departement->id]);

        $response = $this->getJson('/location/communes-by-region/' . $region->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_communes_by_country_id()
    {
        $country = Country::factory()->create();
        $region = Region::factory()->create(['region_country_id' => $country->id]);
        $departement = Departement::factory()->create(['departement_region_id' => $region->id]);
        Commune::factory()->count(3)->create(['commune_departement_id' => $departement->id]);

        $response = $this->getJson('/location/communes-by-country/' . $country->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_all_localites()
    {
        Localite::factory()->count(3)->create();

        $response = $this->getJson('/location/localites');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_a_localite_by_id()
    {
        $localite = Localite::factory()->create();

        $response = $this->getJson('/location/localite/' . $localite->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $localite->id]);
    }

    /** @test */
    public function it_can_access_localites_by_commune_id()
    {
        $commune = Commune::factory()->create();
        Localite::factory()->count(3)->create(['localite_commune_id' => $commune->id]);

        $response = $this->getJson('/location/localites-by-commune/' . $commune->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    /** @test */
    public function it_can_access_localites_by_departement_id()
    {
        $departement = Departement::factory()->create();
        $commune = Commune::factory()->create(['commune_departement_id' => $departement->id]);
        Localite::factory()->count(3)->create(['localite_commune_id' => $commune->id]);

        $response = $this->getJson('/location/localites-by-departement/' . $departement->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_localites_by_region_id()
    {
        $region = Region::factory()->create();
        $departement = Departement::factory()->create(['departement_region_id' => $region->id]);
        $commune = Commune::factory()->create(['commune_departement_id' => $departement->id]);
        Localite::factory()->count(3)->create(['localite_commune_id' => $commune->id]);

        $response = $this->getJson('/location/localites-by-region/' . $region->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_access_localites_by_country_id()
    {
        $country = Country::factory()->create();
        $region = Region::factory()->create(['region_country_id' => $country->id]);
        $departement = Departement::factory()->create(['departement_region_id' => $region->id]);
        $commune = Commune::factory()->create(['commune_departement_id' => $departement->id]);
        Localite::factory()->count(3)->create(['localite_commune_id' => $commune->id]);

        $response = $this->getJson('/location/localites-by-country/' . $country->id);

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

}
