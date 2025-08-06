<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(SuperAdminSeeder::class);
        $this->call(CircuitSeeder::class);
        $this->call(CongregationSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(PrivilegeSeeder::class);
        $this->call(AssignmentSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(PrivilegePublisherSeeder::class);
        $this->call(AssignmentPublisherSeeder::class);
    }
}
