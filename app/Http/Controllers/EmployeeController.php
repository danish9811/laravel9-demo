<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

    public function index() {
        $employees = Employee::all();
        return response([
            'employees' => EmployeeResource::collection($employees),
            'message' => 'Successful'
        ], 200);
    }


    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:30',
            'age' => 'required|max:30',
            'job' => 'required|max:30',
            'salary' => 'required|max:30'
        ]);

        $employee = Employee::create($data);

        return response([
            'employee' => new EmployeeResource($employee),
            'message' => 'Success'
        ], 200);
    }


    public function show(Employee $employee) {
        if ($employee->exists) {
            return response([
                'employee' => new EmployeeResource($employee),
                'message' => 'Success'
            ], 200);
        }

        return response([
            'message' => 'employee does not exist',
        ], 404);
    }


    public function update(Request $request, Employee $employee) {
        $employee->update($request->all());
        return response([
            'employee' => new EmployeeResource($employee),
            'message' => 'Successfully updated record'
        ], 200);
    }


    public function destroy(Employee $employee) {
        $employee->delete();
        return response([
            'message' => 'Employee ' . $employee->name . ' deleted'
        ]);
    }
}