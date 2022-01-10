<?php

namespace App\Http\Controllers;

use App\Models\AbsenceCourse;
use App\Models\AbsenceType;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenceTypeController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $absenceCourses = AbsenceType::all();

        return response()->json([
            'data' => $absenceCourses,
        ]);
    }
}
