<?php

namespace Database\Seeders;

use Faker\Provider\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_kontaks')->insert([
            'Nama' => Str::random(10),
            'Email' => Str::random(10).'@gmail.com',
            'Phone Number' => Str::random(12),
            'Addres' => Str::random(100)
        ]);
    }
}
