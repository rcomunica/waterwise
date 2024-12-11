<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();


        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $devices = Device::factory(10)->create(["user_id" => $user->id]);

        $user->update(
            [
                "current_device_id" => $devices->random()->id,

            ]
        );
    }
}
