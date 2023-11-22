<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => '鈴木 一郎',
                'name_kana' => 'スズキ イチロウ',
                'age' => 30,
                'tel_m_1' => '070',
                'tel_m_2' => '1111',
                'tel_m_3' => '2222',
                'email' => 'a@tes.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => '佐藤 太郎',
                'name_kana' => 'サトウ タロウ',
                'age' => 30,
                'tel_m_1' => '080',
                'tel_m_2' => '3333',
                'tel_m_3' => '4444',
                'email' => 'b@tes.com',
                'password' => Hash::make('password'),
                ]
        );
    }
}
