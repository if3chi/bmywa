<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $user = User::create([
                'name' => 'Jaspar Ifechi',
                'email' => 'admin@bmywa.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin.passwd'),
                'remember_token' => Str::random(10)
            ]);

            $user->roles()->attach(Role::first()->id);
        });

        DB::transaction(function () {
            $user = User::create([
                'name' => 'Entry Curator',
                'email' => 'curator@bmywa.com',
                'email_verified_at' => now(),
                'password' => bcrypt('curator.passwd'),
                'remember_token' => Str::random(10)
            ]);

            $user->roles()->attach([3]);
        });
    }
}
