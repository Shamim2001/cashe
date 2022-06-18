<?php

namespace Database\Seeders;

use App\Models\CashIn;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::create( [
            'name'       => 'Shamim Ahmed',
            'fatherName' => 'x',
            'email'      => 'a@ida.com',
            'password'   => bcrypt( '123' ),
            'nid'        => '34434678',
            'phone'      => '01234678',
            'address'    => 'Lorem ipsum dolor sit amet.',
            'status'     => 'active',
            'role'       => 'admin',
        ] );

        //    User::factory(20)->create();
        CashIn::factory( 50 )->create();
        //    Loan::factory(20)->create();
    }
}
