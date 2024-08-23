<?php

# defualt entry point for routes in your web application

use Illuminate\Support\Facades\Route;

# get represent get method  --> /
Route::get('/',
    function () {
        return view('welcome');
    }  //  this function represent controller

);


Route::get('/assuit', function(){
    return "Hello from assuit";
});


Route::get("/iti", function (){
    return "<h1 style='color:red; text-align:center'>Welcome To ITI </h1>";
});


Route::get("/users", function(){
    $users = [
        ["id"=>1, "name"=>"Mohamed", "email"=> "Mohamed@gmail.com", "image"=>"pic1.png"],
        ["id"=>2, "name"=>"Ibrahim", "email"=> "Mohamed@gmail.com", "image"=>"pic2.png"]
        , ["id"=>3, "name"=>"Mona", "email"=> "Mohamed@gmail.com", "image"=>"pic3.png"],
        ["id"=>4, "name"=>"Doaa", "email"=> "Mohamed@gmail.com", "image"=>"pic4.png"],
        ["id"=>5, "name"=>"Arwa", "email"=> "Mohamed@gmail.com", "image"=>"pic5.png"]
    ];

    return $users;
});


# route with varaible mandatory part

Route::get("/std/{name}", function($name){
    return "<h1>Welcome student {$name}</h1>";
});



Route::get("/users/{id}", function ($id){
    var_dump($id);
    dump($id);
    $users = [
        ["id"=>1, "name"=>"Mohamed", "email"=> "Mohamed@gmail.com", "image"=>"pic1.png"],
        ["id"=>2, "name"=>"Ibrahim", "email"=> "Mohamed@gmail.com", "image"=>"pic2.png"]
        , ["id"=>3, "name"=>"Mona", "email"=> "Mohamed@gmail.com", "image"=>"pic3.png"],
        ["id"=>4, "name"=>"Doaa", "email"=> "Mohamed@gmail.com", "image"=>"pic4.png"],
        ["id"=>5, "name"=>"Arwa", "email"=> "Mohamed@gmail.com", "image"=>"pic5.png"]
    ];

    foreach($users as $user){
        if($user['id']==$id){
            return $user;
        }

    }
    return "<h1 style='color:red'>User not found </h1>";

});

# restrict url to a specific pattern

Route::get("/user/{id}", function ($id){
    var_dump($id);
    dump($id);
    $users = [
        ["id"=>1, "name"=>"Mohamed", "email"=> "Mohamed@gmail.com", "image"=>"pic1.png"],
        ["id"=>2, "name"=>"Ibrahim", "email"=> "Mohamed@gmail.com", "image"=>"pic2.png"]
        , ["id"=>3, "name"=>"Mona", "email"=> "Mohamed@gmail.com", "image"=>"pic3.png"],
        ["id"=>4, "name"=>"Doaa", "email"=> "Mohamed@gmail.com", "image"=>"pic4.png"],
        ["id"=>5, "name"=>"Arwa", "email"=> "Mohamed@gmail.com", "image"=>"pic5.png"]
    ];

    foreach($users as $user){
        if($user['id']==$id){
            return $user;
        }

    }
    return "<h1 style='color:red'>User not found </h1>";

})->where('id', '[0-9]+');;




# route with optional parameter

Route::get("/profile/{user?}", function($user='unknown'){
    return "<h1 style='color:green'>Hi {$user} </h1>";
});



# I need to return with views
Route::get("/home", function(){
    return view('home');
});


Route::get("/home/users", function(){
    $users = [
        ["id"=>1, "name"=>"Mohamed", "email"=> "Mohamed@gmail.com", "image"=>"pic1.png"],
        ["id"=>2, "name"=>"Ibrahim", "email"=> "Mohamed@gmail.com", "image"=>"pic2.png"]
        , ["id"=>3, "name"=>"Mona", "email"=> "Mohamed@gmail.com", "image"=>"pic3.png"],
        ["id"=>4, "name"=>"Doaa", "email"=> "Mohamed@gmail.com", "image"=>"pic4.png"],
        ["id"=>5, "name"=>"Arwa", "email"=> "Mohamed@gmail.com", "image"=>"pic5.png"]
    ];

    # you can send values to the view from the controller function
    // return view("users", ["users"=>$users]);
    return view("allusers", ["users"=>$users, "name"=> "Noha Shehab"]);

})->name("users.home");

Route::get("/home/users/{id}", function($id){
    $users = [
        ["id"=>1, "name"=>"Mohamed", "email"=> "Mohamed@gmail.com", "image"=>"pic1.png"],
        ["id"=>2, "name"=>"Ibrahim", "email"=> "Mohamed@gmail.com", "image"=>"pic2.png"]
        , ["id"=>3, "name"=>"Mona", "email"=> "Mohamed@gmail.com", "image"=>"pic3.png"],
        ["id"=>4, "name"=>"Doaa", "email"=> "Mohamed@gmail.com", "image"=>"pic4.png"],
        ["id"=>5, "name"=>"Arwa", "email"=> "Mohamed@gmail.com", "image"=>"pic5.png"]
    ];

    foreach($users as $user){
        if ($user['id']==$id){
            return view("showuser", ["user"=>$user]);
        }
    }

    return view('notfound');
})->name("users.show");





use App\Http\Controllers\OldStudentController;
# use index function in Student Controller
//Route::get("/students",[OldStudentController::class,"index"] )
//    ->name("students.index");
//
//Route::get("/students/{id}", [OldStudentController::class, "show"])
//->name("students.show")->where('id', '[0-9]+');
//
//Route::get('/students/create',[OldStudentController::class, 'create'])
//    ->name('students.create');
//Route::post("/students", [OldStudentController::class, 'store'])
//    ->name('students.store');
//
//Route::get('/students/{id}/delete',
//    [OldStudentController::class, 'destroy'])->name('students.destroy');
//
//Route::get("/students/{id}/edit",[
//    OldStudentController::class, 'edit'])->name('students.edit');


use App\Http\Controllers\StudentController;
Route::resource('students', StudentController::class);

use App\Http\Controllers\TrackController;
Route::resource('tracks', TrackController::class);






















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
