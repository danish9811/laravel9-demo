<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller {

    public function getAllStudents() {
        // return Student::all();
        // return Student::get(['fullName', 'fatherName']);
        // if the browser does not have the json prettify extension, use this instead
        // return response(Student::get(['fullName', 'fatherName'])->toJson(128), 200);
        // return response(Student::get(['fullName', 'fatherName'])->toJson(JSON_PRETTY_PRINT), 200);
        // return response(Student::get(['fullName', 'fatherName']), 200);
        return response(Student::all(), 200);
    }
    
    // find(id) of findOrFail(id), watch   the docs
    // https://stackoverflow.com/questions/33027047/what-is-the-difference-between-find-findorfail-first-firstorfail-get
    public function getStudent($id) {
        // return Student::findOrFail($id);
        // return Student::find($id);
        // return response(Student::find($id), 200);

        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get();
            return response($student, 200);
        }

        return response([
            'message' => 'Record Not Found'
        ], 404);

    }

    public function createStudent(Request $request) {
        $student = new Student();
        $student->fullName = $request->fullName;
        $student->fatherName = $request->fatherName;
        $student->save();

        return response()->json([
            'message' => 'New student record created successfully'
        ], 200);

    }

    public function updateRecord(Request $request, $id) {

        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $oldName = $student->fullName;
            $student->fullName = is_null($request->fullName) ? $student->fullName : $request->fullName;
            $student->fatherName = is_null($request->fatherName) ? $student->fatherName : $request->fatherName;
            $student->save();

            return response()->json([
                // 'message' => 'Record with an id = ' .  $id . ' is updated Successfully'
                // 'message' => 'Record with name ' . $student->fullName . ' is updated with ' . $request->fullName,
                'message' => 'Record Updated Successfully from ' . $oldName . ' with ' . $request->fullName
            ], 200);
        }

        return response()->json([
            // 'message' => 'Record Against [id => ' . $id . '] does not Exist'
            'message' => 'Record with an id = ' . $id . ' not Found'
        ], 404);

    }

    public function deleteRecord($id) {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                'message' => 'record with an id ' . $id . ' deleted successfully'
            ], 202);
        }

        return response()->json([
            'message' => 'record with an id=' . $id . ' does not exist'
        ], 404);

    }

    // write your private functions to practice the outputs, how response works

}
