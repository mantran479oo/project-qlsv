<?php

namespace Database\Factories;

use App\Models\Point;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Point::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_code' => random_int(1,5),
            'number_point' => 1,
            'subject_code' => Str::random(4),
           'updated_at' => '2021-09-19 15:07:00',
           'created_at' => '2021-09-19 15:07:00',
        ];
    }
}
