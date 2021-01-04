<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'name'     => 'admin',
            'email'    => null,
            'username' => 'admin',
            'nim'      => null,
            'role'     => 'admin',
            'password' => Hash::make('admin123'),
        ];

        User::create($fields);
    }
}
