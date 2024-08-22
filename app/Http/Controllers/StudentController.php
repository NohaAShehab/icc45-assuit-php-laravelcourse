<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students  = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tracks = Track::all();
        return view('students.create', compact('tracks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        #customize error message
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|unique:students",
            "grade" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048"
        ],[
            "name.required" => "There is no student without name",
            "email.required" => "There is no student without email",
            "email.unique" => "There is already a student with this email",
            "grade.required" => "There is no student without grade",
            "image.required" => "There is no student without image",

        ]);
        #laravel share validation errors via sessions
        #laravel automatically start session between their pages

        //
//        dd($request);
        $image_path = '';
        $data = request()->all();
        if(request()->hasFile("image")){
            $image = request()->file("image");
            $image_path=$image->store("images", 'students_images');

        }
        $data['image'] = $image_path;
//        dd($data);
        $student = Student::create($data); # accept data as associative array
        return to_route('students.show', $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        $tracks = Track::all();
        return view('students.edit', compact('student', 'tracks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $validated = $request->validate([
            "name" => "required",
            "grade" => "required",
            "email"=>["required", Rule::unique("students")->ignore($student)],
//            "image" => "required|image|mimes:jpeg,png,jpg|max:2048"
        ],[
            "name.required" => "There is no student without name",
            "email.required" => "There is no student without email",
//            "email.unique" => "There is already a student with this email",
            "grade.required" => "There is no student without grade",

        ]);
        $image_path = $student->image;
        $data = request()->all();
        if(request()->hasFile("image")){
            $image = request()->file("image");
            $image_path=$image->store("images", 'students_images');

        }
        $data['image'] = $image_path;
        $student->update($data);
        return to_route('students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        dd($student);

        $student->delete();
        return to_route('students.index');
    }
}
