<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Models\Property;

Route::get('/', function () {
    return view('layouts.app');
});
