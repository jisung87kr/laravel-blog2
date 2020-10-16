<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 1)->create(
            [
                'name' => 'jisung',
                'email' => 'jisung87kr@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        )->each(function ($user) {
            $user->posts()->createMany(
                factory(App\Post::class, 50)->make()->toArray()
            );
        });

        // $user->posts()->createMany(
        //     factory(App\Post::class, 10)->make()->toArray()
        // );
    }
}
