<?php

namespace Database\Seeders;

use App\Models\CashIn;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       User::create([
           'name'   => 'Shamim Ahmed',
           'email'  => 'a@ida.com',
           'password'   => bcrypt('123'),
           'role' => 'admin'
       ]);

    //    User::factory(20)->create();
       CashIn::factory(50)->create();
    //    Loan::factory(20)->create();
    }
}
