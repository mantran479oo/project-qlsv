<?php

namespace Tests\Unit;

use Mockery as m;
use App\Models\Information;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Repositories\Repository\ClassEloquenRepository;
use App\Repositories\Repository\UserEloquentRepository;
use App\Repositories\Repository\SubjectEloquenRepository;
use App\Repositories\Repository\InformationEloquentRepository;

/**
 * Class AdminIndexControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\admin\indexController
 */
class AdminIndexControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $InformationRepository;
    protected $UserRepository;
    protected $ClassRepository;
    protected $SubjectRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->InformationRepository = m::mock(InformationEloquentRepository::class);
        $this->UserRepository = m::mock(UserEloquentRepository::class);
        $this->ClassRepository = m::mock(ClassEloquenRepository::class);
        $this->SubjectRepository = m::mock(SubjectEloquenRepository::class);
    }

    /** @test */
    public function testCreate()
    {
        $myProfile = factory(Information::class);
    }

    public function dataCreateUser()
    {
        return [
            'id' => '2',
            'student_code' => '123',
            'name' => 'da',
            'date' => '12',
            'olds' => '12',
            'class_code' => 'RM1',
            'hobby' => 'da',
            'gender' => 'nam',
            'address' => 'sda'
        ];
    }
}
