<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\V1\StaffController;
use App\Http\Controllers\APIs\V1\StaffTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('hospital')->group(function()
{

    //Staff Types Routes
    Route::apiResource('staff_types', StaffTypeController::class);

    //Staff routes
    Route::apiResource('staff', StaffController::class);

});

Route::post('/setup', function(Request $request)
{
    $fields = $request->validate( [
        'name' => 'required',
        'email' => 'email|required|unique:users',
        'password' => 'required|confirmed',
    ]);


    $credentials = [
        'email' => $request->email,
        'password' =>  $request->password,
    ];

    if(!Auth::attempt($credentials))
    {

        $user = new User();
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();

        if(Auth::attempt($credentials))
        {
            $user = User::find(Auth::user()->id);

            $adminToken = $user->createToken('admin-token', ['create', 'delete', 'update']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $basicToken = $user->createToken('basic-token' , ['none']);

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken,
            ];

        }


    }
});


