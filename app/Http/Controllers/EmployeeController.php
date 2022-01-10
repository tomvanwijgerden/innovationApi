<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $employees = Employee::all();

        return response()->json(['data' => $employees]);
    }

    /**
     * @param Request $request
     */
    public function show(Request $request, Employee $employee)
    {
        return response()->json(['data' => $employee]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }


    /**
     * @param Request $request
     */
    public function update(Request $request, Employee $employee)
    {

    }

    /**
     * @param Request $request
     */
    public function delete(Request $request, Employee $employee)
    {

    }



}
