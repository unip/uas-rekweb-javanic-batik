<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        User::create([
            'username' => 'admin',
            'email' => 'abdurrahman.alhanif@gmail.com',
            'password' => Hash::make('12345'),
            'phone' => '12345',
            'role' => 'admin',
        ]);
    }
}
