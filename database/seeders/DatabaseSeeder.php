<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Str;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'uuid' => Str::uuid(),
                'first_name' => fake()->firstname(),
                'last_name' => fake()->lastname(),
                'name' => fake()->name(),
                'gender' => "male",
                'profile' => "profiles/s2ds.jpg",
                // 'thumbnail' => "profiles/jxAjtc7uY9PLx26EytgGTA0dtgqqJKbI8TqF8zbe.png",
                'email' => fake()->SafeEmail(),
                'mobile' => fake()->phoneNumber(),
                "email_verified_at" => now(),
                "mobile_verified_at" => now(),
                'password' => Hash::make("password"),
            ]);
        }
        for ($i = 0; $i < 100; $i++) {
            Page::create([
                "uuid" => Str::uuid(),
                "user_id" => User::InRandomOrder()->first()->id,
                "icon" => "pages/txx.jpg",
                "thumbnail" => "pages/txx.jpg",
                "description" => fake()->sentence(rand(10, 50)),
                "name" => fake()->name(),
                "location" => fake()->sentence(3),
                "type" => fake()->sentence(3),
                "members" => rand(200, 10000),
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            Group::create([
                "uuid" => Str::uuid(),
                "user_id" => User::InRandomOrder()->first()->id,
                "icon" => "pages/abc.jpg",
                "thumbnail" => "pages/abc.jpg",
                "description" => fake()->sentence(rand(10, 50)),
                "name" => fake()->name(),
                "location" => fake()->sentence(3),
                "type" => fake()->sentence(3),
                "members" => rand(200, 10000),
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            Post::create([
                "uuid" => Str::uuid(),
                "user_id" => User::InRandomOrder()->first()->id,
                "icon" => "pages/abc.jpg",
                "thumbnail" => "pages/abc.jpg",
                "description" => fake()->sentence(rand(10, 50)),
                "name" => fake()->name(),
                "location" => fake()->sentence(3),
                "type" => fake()->sentence(3),
                "members" => rand(200, 10000),
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            Post::create([
                "uuid" => Str::uuid(),
                "user_id" => $user->id,
                "icon" => "pages/abc.jpg",
                "thumbnail" => "pages/abc.jpg",
                "content" => fake()->sentence(rand(10, 50)),
                "page_id" => $page->id,
                'is_page_post' => 1,
                'status' => 'pending',
                "likes" => rand(200, 10000),
                "comments" => rand(200, 10000),
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            Post::create([
                "uuid" => Str::uuid(),
                "user_id" => $user->id,
                "content" => fake()->sentence(rand(10, 50)),
                "group_id" => $group->id,
                'status' => 'pending',
                'is_group_post' => 1,
                "likes" => rand(200, 10000),
                "comments" => rand(200, 10000),
            ]);
        }

        $user = User::create([
            'uuid' => Str::uuid(),
            'first_name' => "tauseed",
            'last_name' => "zaman",
            'name' => "tauseedzaman",
            'gender' => "male",
            'profile' => "profiles/s2ds.jpg",
            'email' => "tauseedzaman@connectme.com",
            'mobile' => "",
            "email_verified_at" => now(),
            "mobile_verified_at" => now(),
            'password' => Hash::make("password"),
        ]);

        $page = Page::create([
            "uuid" => Str::uuid(),
            "user_id" =>  $user->id,
            "icon" => "pages/txx.jpg",
            "thumbnail" => "pages/txx.jpg",
            "description" => fake()->sentence(rand(10, 50)),
            "name" => 'tauseed.zaman',
            "location" => fake()->sentence(3),
            "type" => fake()->sentence(3),
            "members" => rand(200, 10000),
        ]);

        

        $group = Group::create([
            "uuid" => Str::uuid(),
            "user_id" => $user->id,
            "icon" => "groups/PPkgajdx8gA1jb9tuk3D6tMTFJeKObHtUzgnGxpC.jpg",
            "thumbnail" => "groups/PPkgajdx8gA1jb9tuk3D6tMTFJeKObHtUzgnGxpC.jpg",
            "description" => fake()->sentence(rand(10, 50)),
            "name" => fake()->name(),
            "location" => fake()->sentence(3),
            "type" => fake()->sentence(3),
            "members" => rand(200, 10000),
        ]);
    }
}
