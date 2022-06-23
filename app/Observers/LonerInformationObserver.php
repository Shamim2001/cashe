<?php

namespace App\Observers;

use App\Models\LonerInformation;

class LonerInformationObserver
{
    /**
     * Handle the LonerInformation "created" event.
     *
     * @param  \App\Models\LonerInformation  $lonerInformation
     * @return void
     */
    public function created(LonerInformation $lonerInformation)
    {
        //
    }

    /**
     * Handle the LonerInformation "updated" event.
     *
     * @param  \App\Models\LonerInformation  $lonerInformation
     * @return void
     */
    public function updated(LonerInformation $lonerInformation)
    {
        //
    }

    /**
     * Handle the LonerInformation "deleted" event.
     *
     * @param  \App\Models\LonerInformation  $lonerInformation
     * @return void
     */
    public function deleted(LonerInformation $lonerInformation)
    {
        //
    }

    /**
     * Handle the LonerInformation "restored" event.
     *
     * @param  \App\Models\LonerInformation  $lonerInformation
     * @return void
     */
    public function restored(LonerInformation $lonerInformation)
    {
        //
    }

    /**
     * Handle the LonerInformation "force deleted" event.
     *
     * @param  \App\Models\LonerInformation  $lonerInformation
     * @return void
     */
    public function forceDeleted(LonerInformation $lonerInformation)
    {
        //
    }
}
