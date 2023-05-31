<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Database\Seeders\PernyataanSeeder;
use Database\Seeders\JurusanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PernyataanSeeder::class);
        $this->call(JurusanSeeder::class);

        User::create([
            'name' => 'Lisa Efrianti',
            'email' => 'lisaefrianti@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
