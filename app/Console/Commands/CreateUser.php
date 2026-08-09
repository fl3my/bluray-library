<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

#[Signature('app:create-user')]
#[Description('Create a user')]
class CreateUser extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->ask('Password');

        $role = $this->choice('Role', ['user', 'admin'], 'user');

        // Prevent duplicate accounts
        If (User::where('email', $email)->exists()) {
            $this->error('User with email ' . $email . ' already exists.');

            return self::FAILURE;
        }

        // Make sure role exists
        If(!Role::where('name', $role)->exists()) {
            $this->error('Role ' . $role . ' does not exist.');
            return self::FAILURE;
        }

        // Create the user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $user->assignRole($role);

        $this->info('User ' . $email . ' created successfully.');
        $this->info('Role: ' . $role);

        return self::SUCCESS;
    }
}
