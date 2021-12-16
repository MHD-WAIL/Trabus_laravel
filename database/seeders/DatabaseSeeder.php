<?php

namespace Database\Seeders;
use App\Models\{
    BlueCard,
    Card,
    ElectronicCard,
    IstanbulCard,

};
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
        // \App\Models\User::factory(10)->create();
        Card::factory(20)->create();
        IstanbulCard::factory(20)->create();
        BlueCard::factory(20)->create();
        ElectronicCard::factory(20)->create();
    }
}
