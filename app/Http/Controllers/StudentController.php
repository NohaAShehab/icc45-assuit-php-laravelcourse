<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Track;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
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
//        $students  = Student::
        $students = Student::paginate(3);
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
    public function store(StoreStudentRequest $request)
    {

        #laravel share validation errors via sessions
        #laravel automatically start session between their pages
        $image_path = '';
        $data = request()->all();

        ### create new validation rule

        if(request()->hasFile("image")){
            $image = request()->file("image");
            $image_path=$image->store("images", 'students_images');

        }
        $data['image'] = $image_path;
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
    public function update(UpdateStudentRequest $request, Student $student)
    {

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
//        dd($student);

        $student->delete();
        return to_route('students.index')->with('success', 'Student deleted successfully');


    }
}
