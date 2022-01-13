<?php

namespace App\Http\Controllers;

use App\Jobs\storeAbsenceCourseJob;
use App\Models\AbsenceCourse;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenceCourseController extends Controller
{

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $absenceCourses = AbsenceCourse::all();

        return response()->json([
            'data' => $absenceCourses,
        ]);
    }

    /**
     * @param Request $request
     * @param AbsenceCourse $absenceCourse
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, AbsenceCourse $absenceCourse)
    {
        return response()->json([
            'data' => $absenceCourse,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $absenceCourse = $this->dispatchNow(new storeAbsenceCourseJob($request));

        return response()->json([
            'data' => $absenceCourse,
            'message' => 'AbsenceCourse is added'
        ]);
    }


    /**
     * @param Request $request
     * @param AbsenceCourse $absenceCourse
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, AbsenceCourse $absenceCourse)
    {
        $absenceCourse->start_at = Carbon::parse($request->input('start_at'));
        $absenceCourse->end_at = Carbon::parse($request->input('end_at'));
        $absenceCourse->absence_percentage = $request->input('absence_percentage');
        $absenceCourse->dossier_id = $request->input('dossierId');
        $absenceCourse->type_id = $request->input('type_id');
        $absenceCourse->save();

        return response()->json([
            'data' => $absenceCourse,
            'message' => 'AbsenceCourse is updated'
        ]);
    }

    /**
     * @param Request $request
     * @param AbsenceCourse $absenceCourse
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, AbsenceCourse $absenceCourse)
    {
        $amountOfAbsenceLeft = $absenceCourse->dossier->absenceCourses->count();
        $absenceCourse->delete();

        if ($amountOfAbsenceLeft == 1) {
            $absenceCourse->dossier->delete();
        }
        return response()->json(['message' => 'Absence course has been deleted']);
    }
}
