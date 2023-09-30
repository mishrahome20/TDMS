<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createUser = $this->command->ask('Do you want to create a user', 'yes');
        if ($createUser === 'yes') {
            $email = $this->command->ask('Choose the email for user','meryjohn20@gmail.com');
            $password = $this->command->secret('Choose the password for user');
            $name = $this->command->ask('Choose the name for user','Mery john');
            $phone = $this->command->ask('Choose the phone number for user','9824342709');
            $phone = $this->command->ask('Choose the Code for user',Str::random(10));
            $option = [
                'Normal',
                'Admin',
            ];
            $choice = $this->command->choice('Choose the user TYPE form below',$option,'Normal','3');

            if ($choice === 'Normal')
            {
                User::create([
                    'name'  => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'code'  => '87878787',
                    'password' => Hash::make($password),
                    'status' => '1',
                    'is_super_admin' => '0',
                ]);
            } else {
                User::create([
                    'name'  => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'code'  => '87878787',
                    'password' => Hash::make($password),
                    'status' => '1',
                    'is_super_admin' => '1',
                ]);
            }
            $this->command->info('User created successfully');
            $this->command->warn($email);
            $this->command->warn($password);
        }

    }
}
