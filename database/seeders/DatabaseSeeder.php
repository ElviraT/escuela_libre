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
        $this->call(UsersSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(PrefixSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(Priority::class);
        $this->call(StatusTickets::class);
        $this->call(GenderSeeder::class);
        $this->call(MaritalSeeder::class);
        $this->call(RelationshipSeeder::class);
        $this->call(Day::class);
        $this->call(ColorSeeder::class);
        $this->call(MethodPaymentsSeeder::class);
    }
}
