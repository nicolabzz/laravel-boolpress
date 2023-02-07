<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Qwer & co.',
                'email'     => 'qwer@qwer.qwer',
                'password'  =>  Hash::make('qwer'),
            ],
            [
                'name'      => 'ASDF Srl',
                'email'     => 'asdf@asdf.asdf',
                'password'  =>  Hash::make('asdf'),
            ],
            [
                'name'      => 'Zxcv & Bros',
                'email'     => 'zxcv@zxcv.zxcv',
                'password'  =>  Hash::make('zxcv'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
