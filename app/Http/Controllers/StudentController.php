<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Track;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class StudentController extends Controller
{

    function __construct(){
        $this->middleware("auth")->only('store');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::paginate(3);
        return view('students.index', compact('students'));
//        return Student::all();
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
//    public function store(Request $request)

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
        $data['creator_id']= Auth::id();
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
//        return $student;
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
        # method 1 using if condition
//        if($student->creator_id == Auth::id()) {
//
//            $image_path = $student->image;
//            $data = request()->all();
//            if (request()->hasFile("image")) {
//                $image = request()->file("image");
//                $image_path = $image->store("images", 'students_images');
//
//            }
//            $data['image'] = $image_path;
//            $student->update($data);
//            return to_route('students.show', $student);
//        }
//        return to_route('students.index')->with('error', 'You cannot edit this student, you are not the owner');
    ##########################33 method 2 -
        # check if gate allow update or not ?
//        if (! Gate::allows('update-student', $student)) {
//            abort(403);
//        }


        ############33 method 3 ---> use policy ??
//        if (! Gate::allows('update', $student)) {
//            abort(403);
//        }

        ### method 4 using Policy

//        if($request->user()->cannot('update', $student)){
//            abort(403);
//        }

        ### method 5
         ### add policy to the UpdateStudentRequest

            $image_path = $student->image;
            $data = request()->all();
            if (request()->hasFile("image")) {
                $image = request()->file("image");
                $image_path = $image->store("images", 'students_images');

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
