<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Work;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Follow;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      // User::factory()->create([
           // 'name' => 'Test User',
         //   'email' => 'test@example.com',
       // ]);

       Work::factory(10)->create();
       Follow::factory(10)->create();
       
       // Work::factory(10)->create();
    }
  }