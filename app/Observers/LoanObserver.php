<?php

namespace App\Observers;

use App\Events\ActivityEvent;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class LoanObserver
{
    /**
     * Handle the Loan "created" event.
     *
     * @param  \App\Models\Loan  $loan
     * @return void
     */
    public function created(Loan $loan)
    {
        ActivityEvent::dispatch( 'New Loan Created for '. Auth::user()->name, 'Loan', Auth::id() );
    }

    /**
     * Handle the Loan "updated" event.
     *
     * @param  \App\Models\Loan  $loan
     * @return void
     */
    public function updated(Loan $loan)
    {
        ActivityEvent::dispatch( 'Loan Updated for ' . Auth::user()->name, 'Loan', Auth::id() );
    }

    /**
     * Handle the Loan "deleted" event.
     *
     * @param  \App\Models\Loan  $loan
     * @return void
     */
    public function deleted(Loan $loan)
    {
        ActivityEvent::dispatch( 'Loan Deleted for ' . Auth::user()->name, 'Loan', Auth::id() );
    }

    /**
     * Handle the Loan "restored" event.
     *
     * @param  \App\Models\Loan  $loan
     * @return void
     */
    public function restored(Loan $loan)
    {
        //
    }

    /**
     * Handle the Loan "force deleted" event.
     *
     * @param  \App\Models\Loan  $loan
     * @return void
     */
    public function forceDeleted(Loan $loan)
    {
        //
    }
}
