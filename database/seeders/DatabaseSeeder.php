<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KontakSeeder::class);
        // \App\Models\ModelUser::factory(10)->create();

        // \App\Models\ModelUser::factory()->create([
        //     'name' => 'Test ModelUser',
        //     'email' => 'test@example.com',
        // ]);
    }
}
