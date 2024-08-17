<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
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
       

        return view("students.index", ["students"=>$this->students]);
    
    }

    function show($id)
    {
        foreach($this->students as $student){
            if ($student['id']==$id){
                return view("students.show", ["student"=>$student]);
            }
        }
    
        return view('notfound');

    }


}
