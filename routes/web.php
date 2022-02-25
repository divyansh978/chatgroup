<?php

use App\Http\Controllers\Groupdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Chat;

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

Route::get('/session',function(){
    return session()->all();
});

Route::post('/getmessages',[Groupdata::class,'getchats']);

Route::post('/sendmessage',[Groupdata::class,'sendmessage']);