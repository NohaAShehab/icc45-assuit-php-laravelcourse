<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Validation\Rule;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        # validate request before creating object ??
        # create new validator object ??
        $std_validator  = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'grade'=>'required|numeric',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required'=>'Student name is required.',
            'email.required'=>'Student email is required.',
        ]);

        if($std_validator->fails()){
//            return "errors";
            return response()->json([
                "message"=>"errors with request parameters",
                "errors"=> $std_validator->errors()
            ], 400);
        }
        $image_path= null;
        if($request->hasFile('image')){
            $image = request()->file("image");
            $image_path=$image->store("images", 'students_images');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;
        //
//        return $request;
        $student = Student::create($request_data);
        return $student;
    }



    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //

        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {

//        return $request;
        $std_validator  = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                "required",
                "email",
                Rule::unique('students')->ignore($student),
            ],
            'grade'=>'required|numeric',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required'=>'Student name is required.',
            'email.required'=>'Student email is required.',
        ]);
        if($std_validator->fails()){
//            return "errors";
            return response()->json([
                "message"=>"errors with request parameters",
                "errors"=> $std_validator->errors()
            ], 400);
        }
        // save image
        $image_path= $student->image;
        if($request->hasFile('image')){
            $image = request()->file("image");
            $image_path=$image->store("images", 'students_images');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;

        // save object
        $student->update($request_data);
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
//        return "deleted";
        return response()->json(null, 204);
    }
}
