<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'updated_at' => '2021-09-19 15:07:00',
           'created_at' => '2021-09-19 15:07:00',
        ];
    }
}
