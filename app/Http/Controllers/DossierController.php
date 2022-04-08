<?php

namespace App\Http\Controllers;

use App\Jobs\Dossiers\CreateRecentDossierJob;
use App\Jobs\Dossiers\LastViewedDossiersJob;
use App\Models\AbsenceCourse;
use App\Models\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $dossiers = Dossier::with(['dossierStatus', 'employee'])->get();

        return response()->json([
            'data' => $dossiers,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lastViewedDossiers(Request $request): \Illuminate\Http\JsonResponse
    {
        $dossiers = dispatch_sync(new LastViewedDossiersJob());
        ray($dossiers);
        return response()->json([
                'data' => $dossiers
            ]);
    }

    /**
     * @param Request       $request
     * @param AbsenceCourse $absenceCourse
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Dossier $dossier)
    {
        dispatch_sync(new CreateRecentDossierJob($dossier));
        $dossier['absence_courses'] = $dossier->absenceCourses;
        return response()->json([
            'data' => $dossier,
        ]);
    }

    /**
     * @param Request       $request
     * @param AbsenceCourse $absenceCourse
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Dossier $dossier)
    {
        $dossier->dossier_status_id = $request->input('dossier_status_id');
        $dossier->start_at = $request->input('start_at');
        $dossier->end_at = $request->input('end_at');
        $dossier->employee_id = $request->input('employee_id');
        $dossier->save();

        return response()->json([
            'data' => $dossier,
            'message' => 'Dossier is updated'
        ]);
    }

    /**
     * @param Request       $request
     * @param AbsenceCourse $absenceCourse
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Dossier $dossier)
    {
        $dossier->delete();
        return response()->json(['message' => 'Dossier has been deleted']);
    }
}
