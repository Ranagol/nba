<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Report;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function(User $user) {//all()uzmi svakog usera. Each je kao foreach.
            $user->reports()->saveMany(factory(Report::class, 5)->make());  
        });
      
    }
}
