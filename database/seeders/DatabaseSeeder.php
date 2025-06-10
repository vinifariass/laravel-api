<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\TicketFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        TicketFactory::factory(100)
            ->recycle($users)
            ->create();
        /* 
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
