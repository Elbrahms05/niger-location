<?php

namespace Elbrahms\NigerLocation\Database\Factories;

use Elbrahms\NigerLocation\Models\Localite;
use Elbrahms\NigerLocation\Models\Commune;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocaliteFactory extends Factory
{
    protected $model = Localite::class;

    public function definition()
    {
        return [
            'localite' => $this->faker->unique()->streetName,
            'localite_commune_id' => Commune::factory(), // Creates a related Commune
        ];
    }
}
