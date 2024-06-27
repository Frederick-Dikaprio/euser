<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Traits\WrapperJsonClass;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WrapperJsonClassTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $url = env('APP_URL');
        $openPack = Http::get($url . '/api/v1/subscription/packages');

        $response = new WrapperJsonClass();

        $element = $response->handleResponse($openPack);

        $this->assertNotEmpty($element);
    }
}
