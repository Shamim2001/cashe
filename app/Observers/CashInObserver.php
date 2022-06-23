<?php

namespace App\Observers;

use App\Models\CashIn;

class CashInObserver
{
    /**
     * Handle the CashIn "created" event.
     *
     * @param  \App\Models\CashIn  $cashIn
     * @return void
     */
    public function created(CashIn $cashIn)
    {
        //
    }

    /**
     * Handle the CashIn "updated" event.
     *
     * @param  \App\Models\CashIn  $cashIn
     * @return void
     */
    public function updated(CashIn $cashIn)
    {
        //
    }

    /**
     * Handle the CashIn "deleted" event.
     *
     * @param  \App\Models\CashIn  $cashIn
     * @return void
     */
    public function deleted(CashIn $cashIn)
    {
        //
    }

    /**
     * Handle the CashIn "restored" event.
     *
     * @param  \App\Models\CashIn  $cashIn
     * @return void
     */
    public function restored(CashIn $cashIn)
    {
        //
    }

    /**
     * Handle the CashIn "force deleted" event.
     *
     * @param  \App\Models\CashIn  $cashIn
     * @return void
     */
    public function forceDeleted(CashIn $cashIn)
    {
        //
    }
}
