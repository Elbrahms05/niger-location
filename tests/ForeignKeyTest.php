<?php

namespace Elbrahms\NigerLocation\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;
use Elbrahms\NigerLocation\Models\Country;
use Elbrahms\NigerLocation\Models\Region;
use Elbrahms\NigerLocation\Models\Departement;
use Elbrahms\NigerLocation\Models\Commune;
use Elbrahms\NigerLocation\Models\Localite;
use Elbrahms\NigerLocation\Tests\TestCase;

class ForeignKeyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_foreign_key_constraint_on_region_country_id()
    {
        $this->expectException(QueryException::class);

        Region::factory()->create(['region_country_id' => 10]); // Adjust the foreign key accordingly
    }

    /** @test */
    public function it_validates_foreign_key_constraint_on_departement_region_id()
    {
        $this->expectException(QueryException::class);

        Departement::factory()->create(['departement_region_id' => 9999]); // Adjust the foreign key accordingly
    }

    /** @test */
    public function it_validates_foreign_key_constraint_on_commune_departement_id()
    {
        $this->expectException(QueryException::class);

        Commune::factory()->create(['commune_departement_id' => 9999]); // Adjust the foreign key accordingly
    }

    /** @test */
    public function it_validates_foreign_key_constraint_on_localite_commune_id()
    {
        $this->expectException(QueryException::class);

        Localite::factory()->create(['localite_commune_id' => 9999]); // Adjust the foreign key accordingly
    }

    /** @test */
    public function it_allows_creating_a_region_with_valid_country_id()
    {
        $country = Country::factory()->create();

        $region = Region::factory()->create(['region_country_id' => $country->id]);

        $this->assertDatabaseHas('regions', ['id' => $region->id, 'region_country_id' => $country->id]);
    }

    /** @test */
    public function it_allows_creating_a_departement_with_valid_region_id()
    {
        $region = Region::factory()->create();

        $departement = Departement::factory()->create(['departement_region_id' => $region->id]);

        $this->assertDatabaseHas('departements', ['id' => $departement->id, 'departement_region_id' => $region->id]);
    }

    /** @test */
    public function it_allows_creating_a_commune_with_valid_departement_id()
    {
        $departement = Departement::factory()->create();

        $commune = Commune::factory()->create(['commune_departement_id' => $departement->id]);

        $this->assertDatabaseHas('communes', ['id' => $commune->id, 'commune_departement_id' => $departement->id]);
    }

    /** @test */
    public function it_allows_creating_a_localite_with_valid_commune_id()
    {
        $commune = Commune::factory()->create();

        $localite = Localite::factory()->create(['localite_commune_id' => $commune->id]);

        $this->assertDatabaseHas('localites', ['id' => $localite->id, 'localite_commune_id' => $commune->id]);
    }
}
