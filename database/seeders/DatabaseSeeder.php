<?php

namespace Database\Seeders;

use App\Models\Employee;
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

        Employee::factory()->create([
            'username' => 'Chef',
            'email' => 'Chef@work.ch',
            'password' => 'password',
            'is_chef' => true
        ]);
        Employee::factory(2)->create();

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
