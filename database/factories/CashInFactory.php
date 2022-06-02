<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CashIn>
 */
class CashInFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $type = ['bkash', 'card', 'bank'];
        return [
            'amount'         => rand( 1000, 10000 ),
            'transaction_id' => 'TX2357'. rand( 8758, 875897 ),
            'user_id'        => User::all()->random()->id,
            'type'           => $type[rand( 0, 2 )],
        ];

    }

}
