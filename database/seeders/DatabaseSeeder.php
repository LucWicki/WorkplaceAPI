<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Weekday;
use App\Models\Department;
use App\Models\Allocation;
use App\Models\Meeting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'username' => 'Chef',
            'email' => 'chef@work.ch',
            'password' => 'password',
            'is_chef' => true
        ]);
        User::factory(2)->create(['password' => 'password']);

        Weekday::factory()->create(['dayname' => 'Monday']);
        Weekday::factory()->create(['dayname' => 'Tuesday']);
        Weekday::factory()->create(['dayname' => 'Wednesday']);
        Weekday::factory()->create(['dayname' => 'Thursday']);
        Weekday::factory()->create(['dayname' => 'Friday']);

        Department::factory(2)->create();
        Meeting::factory(2)->create();
        Allocation::factory(4)->create();

    }
}
