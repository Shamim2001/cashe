<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'loan_amount'     => rand( 1000, 5000 ),
            'received_amount' => rand( 1000, 5000 ),
            'user_id'         => User::all()->random()->id,
        ];
    }
}
