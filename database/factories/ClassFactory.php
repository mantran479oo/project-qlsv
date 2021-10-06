<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = classroom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_code' => Str::random(3),
            'class_name' => Str::random(4),
            'updated_at' => '2021-09-19 15:07:00',
           'created_at' => '2021-09-19 15:07:00',
        ];
    }
}
