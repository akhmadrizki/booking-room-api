<?php

namespace Database\Seeders;

use App\Models\CategoryRoom;
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
        $admin = [
            'name'     => 'admin',
            'email'    => null,
            'username' => 'admin',
            'nim'      => null,
            'role'     => 'admin',
            'password' => Hash::make('admin123'),
        ];

        User::create($admin);

        $master = [
            'name'     => 'master',
            'email'    => null,
            'username' => 'master',
            'nim'      => null,
            'role'     => 'master',
            'password' => Hash::make('master123'),
        ];

        User::create($master);

        $seminar = [
            'id'       => 1,
            'category' => 'seminar'
        ];
        CategoryRoom::create($seminar);

        $workshop = [
            'id'       => 2,
            'category' => 'workshop'
        ];
        CategoryRoom::create($workshop);

        $meeting = [
            'id'       => 3,
            'category' => 'meeting'
        ];
        CategoryRoom::create($meeting);
    }
}
