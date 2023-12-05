<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Role::where('name', 'admin')->orWhere('name', 'player')->count() === 0) {
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'player']);
        }
    }
}
