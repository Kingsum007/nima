<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Time;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Noor Ahmad Fazli',
            'email' => 'dean@nima.edu',
            'role' => 'dean',
            'nima_id' => '0001',
            'created_at' => \Carbon\Carbon::createFromDate(now())->toDateTimeString(),
             'password' => Hash::make('12341234'),
        ]);
    }
}
