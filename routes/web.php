<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newpage', function () {
    return view('newpage');
});

Route::get('/newpage2', function (Illuminate\Http\Request $request) {
    $inputText = $request->query('inputText');
    return view('newpage2', ['inputText' => $inputText]);
});

Route::get('/api/greet', function () {
    return response()->json(['message' => "hello world"]);
});

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return 'Database connection is successful!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');