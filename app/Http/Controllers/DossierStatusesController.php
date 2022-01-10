<?php

namespace App\Http\Controllers;

use App\Models\AbsenceCourse;
use App\Models\AbsenceType;
use App\Models\DossierStatuses;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DossierStatusesController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $dossierStatuses = DossierStatuses::all();

        return response()->json([
            'data' => $dossierStatuses,
        ]);
    }
}
