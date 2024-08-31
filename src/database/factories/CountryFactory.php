<?php

namespace Elbrahms\NigerLocation\Database\Factories;

use Elbrahms\NigerLocation\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CountryFactory extends Factory
{
    protected $model = \Elbrahms\NigerLocation\Models\Country::class;

    public function definition()
    {
        return [
            'sortname' => $this->faker->countryCode,
            'name' => $this->faker->country,
            'slug' => Str::slug($this->faker->country),
            'phonecode' => $this->faker->numberBetween(1, 999),
            'status' => 1, // Default to active
        ];
    }
}
