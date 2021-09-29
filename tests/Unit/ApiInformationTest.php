<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Information;
use Illuminate\Testing\Fluent\AssertableJson;


class ApiInformationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->json('GET', '/api/profile/8')
        ->seeJsonStructure([
            "id",
            "student_code",
            "name",
            "date",
            "olds",
            "hobby",
            "gender",
            "address",
            "class_code",
        ]);
    }
}
