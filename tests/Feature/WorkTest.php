<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Work;
use App\Models\Follow;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_ListOfEntryCanBeRead()
    {
        $this->withoutExceptionHandling();
        
        Work::all();
        Follow::all();

        $response = $this->get('/');

        $response->assertStatus(200)
                ->assertViewIs('home');
    }
}
