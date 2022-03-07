<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

    public function index() {
        return response([
            'employees' => Employee::all(),
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

        return response()->json([
            'message' => 'Successfully stored the details of ' . $employee->name
        ], 200);
    }

    public function show($id) {
        if (Employee::firstWhere('id', '=', $id)) {
            return response()->json([
                'employee' => Employee::firstWhere('id', $id),
                'message' => 'Success'
            ], 200);
        }

        return response()->json([
            'message' => 'record with an id = ' . $id . ' not found'
        ], 404);
    }

    public function update(Request $request, $id) {
        if (Employee::firstWhere('id', '=', $id)) {
            Employee::find($id)->update($request->all());
            return response()->json([
                'messsage' => 'record edited successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'record with an id = ' . $id . ' not found'
        ], 404);
    }

    public function destroy($id) {
        if (Employee::firstWhere('id', '=', $id)) {
            Employee::find($id)->delete();
            return response()->json([
                'message' => 'Employee with an id = ' . $id . ' deleted',
            ], 200);
        }
        return response()->json([
            'message' => 'employee with an id = ' . $id . ' does not exit'
        ], 404);
    }
}