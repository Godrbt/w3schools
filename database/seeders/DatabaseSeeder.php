<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Faker\Generator as Faker;
use App\Models\Service;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if the settings table is empty before seeding
        if (Setting::count() === 0) {
            Setting::factory()->create();
        }

        // Check if the users table is empty before creating user, permissions, and roles
        if (User::count() === 0) {
            User::factory()->create();
        }
    }
}
