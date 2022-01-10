<?php

namespace App\Jobs;

use App\Models\AbsenceCourse;
use App\Models\Dossier;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreAbsenceCourseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var Request $request */
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return AbsenceCourse
     */
    public function handle()
    {
        $request = $this->request;
        $dossier = Dossier::where('dossiers.employee_id','=', $request->input('employee_id'))
                                            ->where('dossiers.dossier_status_id', '=', 1)
                                            ->first();

        if(! $dossier){
            $dossier = new Dossier();
            $dossier->start_at = Carbon::parse($request->input('start_at'));
            $dossier->employee_id = $request->employee_id;
            $dossier->dossier_status_id = 1;
            $dossier->save();
        }

        $absenceCourse = new AbsenceCourse();
        $absenceCourse->start_at = Carbon::parse($request->input('start_at'));
        $absenceCourse->end_at = Carbon::parse($request->input('end_at'));
        $absenceCourse->absence_percentage = $request->input('absence_percentage');
        $absenceCourse->dossier_id = $dossier->id;
        $absenceCourse->type_id = $request->input('type_id');
        $absenceCourse->save();

        return $absenceCourse;
    }
}
