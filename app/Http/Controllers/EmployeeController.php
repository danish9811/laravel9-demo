<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

    public function index() {
        try {
            $response = json_decode(Employee::all(), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $exception) {
            return response()->json([
                'exceptionCode' => (int)$exception->getCode(),
                'message' => 'Error Fetching Employee Recoords',
                'description' => $exception->getMessage()
            ], 422);
        }

        return response($response);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:30|min:4',
            'age' => 'required|max:30',
            'job' => 'required|max:30',
            'salary' => 'required|max:30'
        ]);

        $employee = Employee::create($data);
        return response()->json($employee);
    }

    public function show($id) {
        if (Employee::firstWhere('id', '=', $id)) {
            return response()->json(Employee::firstWhere('id', $id));
        }

        return response()->json([
            'message' => 'Record with an id=' . $id . ' does not exist'
        ], 404);
    }

    public function update(Request $request, $id) {
        if (Employee::firstWhere('id', '=', $id)) {
            Employee::where('id', $id)->update($request->all());

            return response()->json([
                'messsage' => 'record edited successfully',
            ]);
        }

        return response()->json([
            'message' => 'record with an id = ' . $id . ' not found'
        ], 404);
    }

    public function destroy($id) {
        if (Employee::firstWhere('id', '=', $id)) {
            Employee::destroy($id);
            return response()->json([
                'message' => 'Employee with an id=' . $id . ' deleted',
            ]);
        }

        return response()->json([
            'message' => 'Employee with an id=' . $id . ' does not exit'
        ], 404);
    }
}