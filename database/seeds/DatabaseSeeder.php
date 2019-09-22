<?php

use App\BoardGameProvider;
use App\CustLibs\BoardGameProviders\BoardGameProviderFact;
use App\User;
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
        $providers = (new BoardGameProviderFact())->get_providers();
        foreach ($providers as $provider)
            BoardGameProvider::create( $provider );

        User::create([
            "id" => 1,
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => "$2y$10\$Tn06qwOwsgDFIMKF1TGWgOQmkoFruJq/TzyrM8L2LJePjrX1LrptW"
        ]);
    }
}
