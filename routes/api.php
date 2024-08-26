<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# any route in this file have the prefix api in url

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/test", function (){
    return "test";
});

use App\Http\Controllers\Api\StudentController;

Route::apiResource("/student", StudentController::class);


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

# generate token for authenticated users
Route::post('/sanctum/token', function (Request $request) {


    $std_validator  = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    if($std_validator->fails()){
        return response()->json([
            "errors" => $std_validator->errors()
        ], 400);
    }
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
//        throw ValidationException::withMessages([
//            'email' => ['The provided credentials are incorrect.'],
//        ]);
        return response()->json([
            'email' => ['The provided credentials are incorrect.'],
        ], 401);
    }
        # one token for user at ---> remove previous tokens

    # check maximum 3 tokens?
//    return $user->tokens()->count();
    if($user->tokens()->count()>3){
        return response()->json([
            "error"=>"You have exceeded the number of alllowed logged in accounts,
            please logout from one of them and try again."
        ]);
    }
    return $user->createToken($request->device_name)->plainTextToken;
//    return  $user;
});

// to send token with request --> you send it in request header
    // Authorization :: ==> Bearer 1|JEBSrdrsmHrUiSVsmkq7UbVR4Y065pBkaoLJW2DJafed5ce8
Route::get("/home", function(){
    return response()->json([
        "message"=>"welcome to home page",
        "user"=>Auth::user()
    ]);
})->middleware('auth:sanctum');
//    ->middleware('auth:sanctum');



Route::post("/logout", function(){
    $user = Auth::user();
    if($user){
        # remove token ??
        # remove current
//        $user->currentAccessToken()->delete();

        # remove all  tokens
        $user->tokens()->delete();

        return response()->json([
            "message"=>"Logged out"
        ]);
    }

})->middleware('auth:sanctum');
