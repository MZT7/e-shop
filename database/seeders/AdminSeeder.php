<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([

            'name' => 'Admin',
            'email' => 'duzioristo@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => true,

            'phone_number' => '09090202853',
            'password' => bcrypt('mezu123'), //password
            'remember_token' => Str::random(10),


        ]);
    }
}
