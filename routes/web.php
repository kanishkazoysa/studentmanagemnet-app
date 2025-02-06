<?php

use Illuminate\Support\Facades\Route;

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