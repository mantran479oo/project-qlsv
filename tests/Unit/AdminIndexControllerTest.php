<?php

namespace Tests\Unit;

use Mockery as m;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Point;
use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Repositories\Repository\ClassEloquenRepository;
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

    protected $informationRepository;
    protected $classRepository;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->informationRepository = m::mock(InformationEloquentRepository::class);
        $this->classRepository       = m::mock(ClassEloquenRepository::class);
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

    /** @test
     *  @covers ::create
     */
    public function a_information_create()
    {
        $params   = $this->data();
        $response = $this->post('admin/add', $params);
        $response->assertStatus(302);
        $this->assertDatabaseHas('informations', $params);
    }

    /** @test 
     *  @covers ::edit
     */
    public function a_information_edit()
    {
        $this->withoutExceptionHandling();
        $informationMock = Information::factory()->create();
        $id = $informationMock->id;
        $this->informationRepository->shouldReceive('myProfile')->with($id)->andReturn($informationMock);
        $response = $this->get('admin/edit/' . $id);
        $response->assertStatus(200);
        $this->assertEquals($response->baseResponse->isSuccessful(), true);
    }

    /** @test
     *  @covers ::delete
     */
    public function a_information_destroy()
    {
        $informationMock = Information::factory()->create();
        $response = $this->get("admin/remove/$informationMock->id");
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseMissing('informations', ['created_at' => null, 'id' => $informationMock->id]);
    }

    /** @test 
     *  @covers ::update
     */
    public function update()
    {
        $this->withoutExceptionHandling();
        $informationMock = Information::factory()->create();
        $this->informationRepository->shouldReceive('update')->with($informationMock->id)->andReturnTrue();
        $response = $this->post("admin/update/$informationMock->id", [
            'name' => 'aaaa',
        ]);
        $response->assertStatus(302);
        $this->assertInstanceOf(RedirectResponse::class, $response->baseResponse);
    }

    public function data()
    {
        return [
            'id' => 1,
            'name' => "sadas",
            'address' => Str::random(12),
            'hobby' => "hat",
            'date' => Carbon::now()->format('d-m-Y'),
            'gender' => 1

        ];
    }
}
