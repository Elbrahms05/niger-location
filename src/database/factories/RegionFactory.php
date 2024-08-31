<?php

namespace Elbrahms\NigerLocation\Database\Factories;

use Elbrahms\NigerLocation\Models\Region;
use Elbrahms\NigerLocation\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RegionFactory extends Factory
{
    protected $model = Region::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->lexify('?????'), // Generates a 5-letter name
            'code' => strtoupper($this->faker->unique()->lexify('?????')), // 5-letter uppercase code
            'region_country_id' => Country::factory(), // Creates a related Country
        ];
    }
}
