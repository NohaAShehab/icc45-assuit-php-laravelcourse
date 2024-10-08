<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class OldStudentController extends Controller
{
    //  define controller functions I need
    private  $students = [
        ["id"=>1, "name"=>"Mohamed", "email"=> "Mohamed@gmail.com", "image"=>"pic1.png"],
        ["id"=>2, "name"=>"Ibrahim", "email"=> "ibrahim@gmail.com", "image"=>"pic2.png"]
        , ["id"=>3, "name"=>"Mona", "email"=> "mona@gmail.com", "image"=>"pic3.png"],
        ["id"=>4, "name"=>"Doaa", "email"=> "Mohamed@gmail.com", "image"=>"pic4.png"],
        ["id"=>5, "name"=>"Arwa", "email"=> "Mohamed@gmail.com", "image"=>"pic5.png"]
    ];

    function  index (){


//        return view("students.index", ["students"=>$this->students]);
        # get data from db
        #1- use query builder
//        $students = DB::table("students")->get();
//        dump($students);
//        return $students;
        // use orm --> model
        $students = Student::all(); # select * from students;
        # return with model objects
//        dd($students); # print variable and stop execution
        return view("students.index", ["students"=>$students]);


    }

    function show($id)
    {
//        foreach($this->students as $student){
//            if ($student['id']==$id){
//                return view("students.show", ["student"=>$student]);
//            }
//        }
//
//        return view('notfound');
        # get one object
        # select * from students where id=id;
        $student = Student::find($id);
        if($student == null){
             abort(404);
        }
        return view("students.show", ["student"=>$student]);


    }

    function create(){
        return view("students.create");
    }

    function store(){
        $image_path = '';
//        dd($_POST); # print object then stop the execution
        $data = request()->all();
//        request()->validate([]);
//        dd($data);
        if(request()->hasFile("image")){
            #move uploaded file to the storage path I have created
            $image = request()->file("image");
            $image_path=$image->store("images", 'students_images');

        }
        #use model to create new object
        $student = new Student();
        $student->name =$data['name'];
        $student->email = $data['email'];
        $student->grade = $data['grade'];
        $student->image= $image_path;
        $student->gender= $data['gender'];
        # to save object to the db
        $student->save();
//        return 'saved';
        # return to route --> students.index
        return  to_route("students.index");
    }

    function destroy($id){
        $student = Student::find($id);
        if($student == null){
            abort(404);
        }
        $student->delete();
        return  to_route("students.index");

    }


    function edit($id){
//        $student = Student::find($id);
        $student=Student::findorfail($id);
        # use one function to check if object exists --> continue in the function --> otherwise fail

        return view("students.edit", ["student"=>$student]);

    }
}
