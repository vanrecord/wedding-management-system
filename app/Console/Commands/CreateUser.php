<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create {name} {email} {password}';
    protected $description = 'Create a new user';
    // run example: php artisan user:create "Chan Sovann" "chansovann@gmail.com" "Chan1998"

    public function handle()
    {
        app(User::class)->delete();
        User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
        ]);

        $this->info('User created successfully!');
    }
}
