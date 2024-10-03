<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index(){
        $teacher = Teacher::all();

        $data = [
            'status' => 200,
            'teacher' =>  $teacher
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),
        [
         'name' => 'required',
         'email' => 'required | email'
        ]);

        if($validator->fails()){
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data,422);
        } else {
            $teacher = new Teacher;

            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->class = $request->class;

            $teacher->save();

            $data = [
                'status' => 200,
                'message' => 'Data Uploaded successfully'
            ];

            return response()->json($data, 200);
        }
    }
}
