<?php

namespace App\Jobs\Dossiers;

use App\Models\Dossier;
use Illuminate\Contracts\Queue\ShouldQueue;

class LastViewedDossiersJob implements ShouldQueue
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Dossier::select('dossiers.*', 'employees.*')
            ->join('recent_dossiers', 'dossiers.id','=','recent_dossiers.dossier_id')
            ->join('employees', 'employees.id', '=', 'dossiers.employee_id')
            ->where('recent_dossiers.user_id','=',auth()->user()->id)
            ->groupBy('dossiers.id')
            ->limit(10)
            ->get();
    }
}
