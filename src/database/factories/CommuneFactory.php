<?php

namespace Elbrahms\NigerLocation\Database\Factories;

use Elbrahms\NigerLocation\Models\Commune;
use Elbrahms\NigerLocation\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommuneFactory extends Factory
{
    protected $model = Commune::class;

    public function definition()
    {
        return [
            'commune' => $this->faker->unique()->city,
            'commune_departement_id' => Departement::factory(), // Creates a related Departement
        ];
    }
}
