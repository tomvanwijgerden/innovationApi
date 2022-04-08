<?php

namespace App\Observers;

use App\Models\Dossier;
use App\Models\RecentDossier;

class DossierObserver
{
    /**
     * Handle the Dossier "created" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function created(Dossier $dossier)
    {
        //
    }

    /**
     * Handle the Dossier "updated" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function updated(Dossier $dossier)
    {
        //
    }

    /**
     * Handle the Dossier "deleted" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function deleted(Dossier $dossier)
    {
        RecentDossier::where('dossier_id' ,'=', $dossier->id)->delete();
    }

    /**
     * Handle the Dossier "restored" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function restored(Dossier $dossier)
    {
        //
    }

    /**
     * Handle the Dossier "force deleted" event.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return void
     */
    public function forceDeleted(Dossier $dossier)
    {
        //
    }
}
