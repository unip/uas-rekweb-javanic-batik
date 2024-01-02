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
            'display_name' => 'Abdurrahman Al Hanif',
            'username' => 'admin',
            'email' => 'abdurrahman.alhanif@gmail.com',
            'password' => Hash::make('12345'),
            'phone' => '12345',
            'role' => 'admin',
        ]);

        User::create([
            'display_name' => 'Yohanes Crusc',
            'username' => 'ycrusc',
            'email' => 'ycrusc@gmail.com',
            'password' => Hash::make('12345'),
            'phone' => '12345678',
            'role' => 'admin',
        ]);
    }
}
