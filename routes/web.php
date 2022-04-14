<?php

use App\Models\Adress;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});


//insert address in db
Route::get('/insert', function(){
$user= User::findOrFail(1);

$adress = new Adress(['name'=>'home #102 Azeem Colony Sakrand, Dist Shaheed Benazirabad']);

$user->adress()->save($adress);

});


//update address in db
Route::get('/update', function(){

    $adress = Adress::whereUserId(1)->first();
    $adress->name= "new adress updated";

    $adress->save();

});

//read address from db
Route::get('/read', function(){

    $user = User::find(1);

     return $user->adress->name;
    
});

Route::get('/delete', function(){

    $user = User::find(1);

    $user->adress()->delete();

    return "done";
});