<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $employers = Employer::all();

        return response()->json(['data' => $employers]);
    }

    /**
     * @param Request $request
     * @param Employer $employer
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Employer $employer)
    {
        return response()->json(['data' => $employer]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $employer = new Employer();
        $employer->name = $request->input('name');
        $employer->street = $request->input('street');
        $employer->save();
        return response()->json([
            'data' => $employer,
            'message' => $employer->name . ' has been stored'
        ]);
    }


    /**
     * @param Request $request
     * @param Employer $employer
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Employer $employer)
    {
        $employer->name = $request->input('name');
        $employer->street = $request->input('street');
        $employer->save();

        return response()->json([
            'data' => $employer,
            'message' => $employer->name . ' has been updated'
        ]);
    }

    /**
     * @param Request $request
     * @param Employer $employer
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Employer $employer)
    {
        $employeeOnEmployer = Employee::where('employer_id', '=', $employer->id)->count();
        $employerName = $employer->name;
        if ($employeeOnEmployer == 0) {
            $employer->delete();

            return response()->json([
                'message' => $employerName . ' has been deleted'
            ]);
        } else {
            return response()->json([
                'message' => ' Cant delete ' . $employerName . ' because of linked employees.'
            ], 404);
        }

    }


}
