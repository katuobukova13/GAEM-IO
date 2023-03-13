<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\WeatherController;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    protected string $token;

    public function setUp(): void
    {
        parent::setUp();

        /**
         * @var UserService $userService
         * @var User $user
         */

        $userService = App::make(UserService::class);

        $user = User::factory()->create();
        $this->token = $userService->createToken($user, [
            'name' => 'Test',
            'abilities' => ['*']
        ]);
    }

    public function testShow(): void
    {
        $city = 'Paris';

        $response = $this
            ->withToken($this->token)
            ->get('/api/v1/getCityWeather/' . $city);

        $this->assertEquals($response['name'], $city);
        $this->assertNotEmpty($response['main']['temp']);
    }

    public function testIndex(): void
    {
        $cities = ['Barcelona', "Limassol", "Amsterdam"];

        $response = $this
            ->withToken($this->token)
            ->get(action(
                [WeatherController::class, 'index'],
                ['cities' => $cities]
            ));

        $this->assertEquals($response[0]['name'], $cities[0]);
        $this->assertEquals($response[1]['name'], $cities[1]);
        $this->assertEquals($response[2]['name'], $cities[2]);
        $this->assertNotEmpty($response[0]['main']['temp']);
        $this->assertNotEmpty($response[1]['main']['temp']);
        $this->assertNotEmpty($response[2]['main']['temp']);
        $this->assertCount(3, $response->json());
    }
}
