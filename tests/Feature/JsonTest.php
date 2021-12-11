<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\AssertableJson;

class JsonTest extends TestCase
{
     public function test_making_an_api_request()
    {
        $response = $this->postJson('api/teamBuilding', ['name'=>'Toto', 'avatar'=> 'lutin.png', 'color' => 'blue']);

        $response
            ->assertStatus(403);
           
    }

    public function test_making_an_api_request_false()
    {
        $response = $this->postJson('api/teamBuilding', ['name'=>'Toto', 'avatar'=> 'lutin.png', 'color' => 'blue']);

        $response
        ->assertStatus(201)
        ->assertJson([
            'created' => true,
        ]);
           
    }
    
    public function test_fluent_json()
    {
    $response = $this->json('POST', '/account/92');

    $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->missing('api_token')
                 ->etc()       
        );
         
    }

    public function test_fluent_json_team()
    {
    $response = $this->json('POST', '/teamBuilding');

    $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->missing('api_token')
                 ->etc()        
        );
    }

  }
