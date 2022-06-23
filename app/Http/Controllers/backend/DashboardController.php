<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\CashIn;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    public function index() {
        return view( 'backend.dashboard.index' )->with( [
            'user'     => Auth::user(),
            'users'    => User::all(),
            'loans'    => Loan::all()->sum( 'loan_amount' ),
            'deposite' => CashIn::all()->sum( 'amount' ),
            'activity_logs' => Activity::latest()->get(),
        ] );
    }
}
