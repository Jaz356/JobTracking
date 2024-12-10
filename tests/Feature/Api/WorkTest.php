<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Work;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_CheckIfReceiveAllEntryOfJournalInJsonFile(){
        $work = Work::factory(2)->create();
        $response =$this->get(route('apiWork'));
        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_CheckIfCanDeleteEntryInJournalWithApi(){
        $work =  Work::factory(2)->create();

        $response = $this->delete(route('apiDeleteWork', 1));
        $this->assertDatabaseCount('Jobs', 0);

        $response = $this->get(route('apiDeleteWork', 1));
        $response -> assertJsonCount(0);
    }

    public function test_CheckIfCanCreateNewEntryInJournalCheckWithJsonFile(){
       
        $response = $this->post(route('apiCreateWork'), [
                'entry' => ' ',
        ]);

        $response = $this->get(route('apiWork'));
        $response -> assertStatus(200)
                  -> assertJsonCount(0);
    }

    public function test_CheckIfCanUpdateEntryInWorkWithJsonFile(){
        $response = $this->post(route('apiCreateWork'),[
            'id' => '1',
            'company' => '$company',
            'workapply' => '$workapply',
            'status' => '$status',
        ]);

        $data = ['company' => " "]; 
        $response = $this->get(route('apiWork'));
        $response ->assertStatus(200)
                  ->assertJsonCount(0)
                  ->assertJsonFragment($data);

        $response = $this->put(route('apiWorkUpdate'),[
            'id' => '1',
            'company' => '$company',
            'workapply' => '$workapply',
            'status' => '$status',
        ]);

        $data = ['company' => " "];
        $response = $this->get(route('apiWorkUpdate'));
        $response ->assertStatus(200)
                  ->assertJsonCount(1)
                  ->assertJsonFragment($data); 
    }
}