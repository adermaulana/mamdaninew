<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\PernyataanSeeder;

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
        $this->call(JurusanSeeder::class);
        $this->call(PernyataanSeeder::class);

        User::create([
            'name' => 'Lisa Efrianti',
            'email' => 'lisaefrianti@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
