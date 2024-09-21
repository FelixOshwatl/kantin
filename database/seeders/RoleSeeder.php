<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_data = [
            [
                'nama' => 'kasir'
            ],
            [
                'nama' => 'dapur'
            ],
            [
                'nama' => 'manager'
            ],

        ];

        foreach($user_data as $key => $val){
            Role::create($val);
        }

    }
}
