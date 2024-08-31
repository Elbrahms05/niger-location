<?php

namespace Elbrahms\NigerLocation\Database\Factories;

use Elbrahms\NigerLocation\Models\Departement;
use Elbrahms\NigerLocation\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartementFactory extends Factory
{
    protected $model = Departement::class;

    public function definition()
    {
        return [
            'departement' => $this->faker->unique()->word,
            'departement_region_id' => Region::factory(), // Creates a related Region
        ];
    }
}
