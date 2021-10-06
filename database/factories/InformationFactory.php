<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Information;
use Illuminate\Support\Str;
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
            'id' => 1,
            'name' => "sadas",
            'address' => Str::random(12),
            'hobby' => "hat",
            'date' => Carbon::now()->format('d-m-Y'),
            'class_code' => Str::random(3),
            'gender' => 1,
           'updated_at' => '2021-09-19 15:07:00',
           'created_at' => '2021-09-19 15:07:00',
        ];
    }
}
