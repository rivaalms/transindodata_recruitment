<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CheckIn;
use App\Models\PaymentStatus;
use App\Models\TicketName;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        UserRole::create([
            'name' => 'Guest'
        ]);
        UserRole::create([
            'name' => 'Admin'
        ]);

        CheckIn::create([
            'name' => 'Checked'
        ]);
        CheckIn::create([
            'name' => 'Not checked'
        ]);

        TicketName::create([
            'name' => 'Regular',
            'price' => 50000
        ]);
        TicketName::create([
            'name' => 'VIP',
            'price' => 150000
        ]);

        PaymentStatus::create([
            'name' => 'Pending'
        ]);
        PaymentStatus::create([
            'name' => 'Success'
        ]);
        PaymentStatus::create([
            'name' => 'Canceled'
        ]);
    }
}
