<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_data = [
            [
                'nama' => 'Yefta El Imani',
                'role_id'=> '2',
                'username' => 'kasirA',
                'password' => bcrypt('123456'),
                'alamat'   => 'Pancing',
                'jenis_kelamin' => 'laki-laki',
                'no_hp'=>'082288778988',

            ],
            [
                'nama' => 'Kelvin Natanael',
                'role_id'=> '1',
                'username' => 'dapurA',
                'password' => bcrypt('123456'),
                'alamat'   => 'Pancing',
                'jenis_kelamin' => 'laki-laki',
                'no_hp'=>'082288778968',

            ],
            [
                'nama' => 'Felix Christian',
                'role_id'=> '3',
                'username' => 'manager',
                'password' => bcrypt('123456'),
                'alamat'   => 'Pancing',
                'jenis_kelamin' => 'laki-laki',
                'no_hp'=>'082288778998',
            ],
            
            ];

            foreach($user_data as $key => $val){
                Account::create($val);
            }
    }
}
