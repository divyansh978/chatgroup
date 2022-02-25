<?php

use App\Http\Controllers\Groupdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/',[Groupdata::class,'checkname']);

Route::get('/', function () {
    return view('home');
});

Route::match(['get','post'],'/group/{gname}',function(Request $req, $gname){

    return (new Groupdata())->Checkgroup($req,$gname);
    
});

Route::post('/getmessages',[Groupdata::class,'getchats']);

Route::post('/sendmessage',[Groupdata::class,'sendmessage']);