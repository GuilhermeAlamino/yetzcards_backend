<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where('email', 'root@root.com')->count() === 0) {
            User::create([
                'name' => 'root',
                'email' => 'root@root.com',
                'password' => Hash::make('password'),
                'role_id' => '1',
            ]);
        }
    }
}
