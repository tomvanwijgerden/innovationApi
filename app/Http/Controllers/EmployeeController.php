<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $employees = Employee::with(['dossiers.absenceCourses'])
                             ->get();

        return response()->json(['data' => $employees]);
    }

    /**
     * @param Request  $request
     * @param Employee $employee
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Employee $employee)
    {
        $employeeData = Employee::with(['dossiers.absenceCourses'])
                                ->where('employees.id', '=', $employee->id)
                                ->get();

        return response()->json(['data' => $employeeData]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->employer_id = $request->input('employer_id');
        $employee->save();

        return response()->json([
            'data'    => $employee,
            'message' => $employee->name . 'Has been created',
        ]);
    }


    /**
     * @param Request  $request
     * @param Employee $employee
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name = $request->input('name');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->employer_id = $request->input('employer_id');
        $employee->save();

        return response()->json([
            'data'    => $employee,
            'message' => $employee->name . 'Has been updated',
        ]);
    }

    /**
     * @param Request  $request
     * @param Employee $employee
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, Employee $employee)
    {
        $employeeName = $employee->name;

        $employee->delete();

        return response()->json([
            'message' => $employeeName . ' has been deleted',
        ]);
    }


}
