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
        $response =$this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_CheckIfCanDeleteEntryInJournalWithApi(){
        $work =  Work::factory(2)->create();

        $response = $this->delete(route('apidestroy', 1));
        $this->assertDatabaseCount('Jobs', 1);

        $response = $this->get(route('apidestroy', 1));
        $response -> assertJsonCount(1);
    }

    public function test_CheckIfCanCreateNewEntryInJournalCheckWithJsonFile(){
       
        $response = $this->post(route('apistore'), [
                'entry' => ' ',
        ]);

        $response = $this->get(route('apihome'));
        $response -> assertStatus(200)
                  -> assertJsonCount(1);
    }

    public function test_CheckIfCanUpdateEntryInWorkWithJsonFile(){
        $response = $this->post(route('apistore'),[
            'company' => ' ',
        ]);

        $data = ['company' => " "]; 
        $response = $this->get(route('apihome'));
        $response ->assertStatus(200)
                  ->assertJsonCount(1)
                  ->assertJsonFragment($data);

        $response = $this->put('/api/journals/1', [
            'company' => ' ',
        ]);

        $data = ['company' => " "];
        $response = $this->get(route('apihome'));
        $response ->assertStatus(200)
                  ->assertJsonCount(1)
                  ->assertJsonFragment($data);          
    }
}
