<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\AssertableJson;

class RouteTest extends TestCase
{
    public function testRouteHomeInsertion()
    {
        $response = $this->get('/');
        $response->assertViewHas('message', 'Vous y êtes !');
    }

    public function test_fluent_json()
    {
    $response = $this->json('GET', '/account/101');

    $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->missing('api_token')
                 ->etc()
        );
    }

  }
