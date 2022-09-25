<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //メインとなるDatabaseSeeder(ここ)にTweetsSeederを呼び出す
    public function run()
    {
      $this->call([
        UsersSeeder::class,
        TweetsSeeder::class
      ]);
    }
}
