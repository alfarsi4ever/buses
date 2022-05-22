<?php

namespace Database\Factories;
use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Code::class;
    public function definition()
    {
        return [
            'busNum'=> $this->faker->numerify('#####'),
            'busAlph'=> $this->faker->bothify('??'),
            'barCodeUrl'=> $this->faker->bothify('?###??##?###??##?###??##?###??##')
        ];
    }
}
