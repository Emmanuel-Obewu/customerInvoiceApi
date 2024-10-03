<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index() {
        $student = Student::all();

        $data = [
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
    
    public function store(Request $request) {
         $validator = Validator::make($request->all(),

         [
            'name'=>'required',
            'email'=>'required | email',
         ]);

         if ($validator->fails()) {
            $data=[
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data, 422);
         } else {
            $student = new Student;

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;

            $student->save();

            $data = [
                'status' => 200,
                'message' => 'Data Uploaded Successfully!'
            ];

            return response()->json($data, 200);
         }
    }
}
