<?php

namespace Database\Factories;

use App\Models\Labor;
use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LaborFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Labor::class;
    public function definition()
    {
        return [
            'Bus_id'=> Code::all()->random()->id,
            'name'=> $this->faker->name,
            'phone'=> $this->faker->numerify('9#######')
        ];
    }
}
