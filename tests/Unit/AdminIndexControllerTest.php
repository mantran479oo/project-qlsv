<?php

namespace Tests\Unit;

use Mockery as m;
use Tests\TestCase;
use App\Models\User;
use App\Models\Information;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
    use DatabaseMigrations;

    protected $InformationRepository;
    protected $UserRepository;
    protected $ClassRepository;
    protected $SubjectRepository;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->InformationRepository = m::mock(InformationEloquentRepository::class);
        $this->UserRepository        = m::mock(UserEloquentRepository::class);
        $this->ClassRepository       = m::mock(ClassEloquenRepository::class);
        $this->SubjectRepository     = m::mock(SubjectEloquenRepository::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }

    /** @test */
    public function testCreate()
    {
        $this->InformationRepository->shouldReceive('create')->with([
             
        ]);
    }
}
