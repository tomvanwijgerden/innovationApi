<?php

namespace App\Jobs\Dossiers;

use App\Models\Dossier;
use App\Models\RecentDossier;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateRecentDossierJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dossier;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Dossier $dossier)
    {
        $this->dossier = $dossier;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dossier = $this->dossier;
        $recentDossier = new RecentDossier();
        $recentDossier->dossier()->associate($dossier);
        $recentDossier->user()->associate(auth()->user());
        $recentDossier->last_seen = Carbon::now();
        $recentDossier->save();
    }
}
