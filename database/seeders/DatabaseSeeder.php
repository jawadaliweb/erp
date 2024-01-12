<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $user = User::create([
            'name'     => 'Admin',
            'email'     => 'admin@admin.com',
            'email_verified_at' => '2022-08-24 18:22:13',
            'account_type'     => 'admin',
            'password'      => bcrypt('password'),
        ]);

        Branch::create([
            'user_id'     => $user->id,
            'branch_name'     => 'Head Office',
        ]);
    }
}
