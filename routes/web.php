<?php

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
use Illuminate\Support\Facades\DB;
use App\Petition;

Route::get('/', function () {
    return view('welcome');
});

//contoh membuat Route
//hello adalah url nya
Route::get('hello',function (){
    return 'HEllo World';
});


Route::get('hello/{nama}',function ($nama){
    return 'HEllo '.$nama;
});

Route :: get('home', function (){
    $title = 'this is sparta';
    $body  = array('edwina','Annisa','Faisal','septian','isa');
    return view('home',compact('title','body'));
});

/*
Route::get('petitions/{id}',function ($id){
    //mendefinisikan data kita dari database
  //  $petitions = DB::table('petitions')->get();

   // $petitions = Petition::all();
    //cara mencari berdasar kan id
    //$petitions  = Petition::find($id);
    $petitions  = Petition::where('id',$id)->first();
    return $petitions;
});
*/


Route ::get('petitions','PetitionController@indeks');/*
memangil ke controler petition controller dimana memiliki fungsi indeks*/
Route ::get('petitions/create','PetitionController@create');
Route ::get('petitions/{show}','PetitionController@show');
Route ::post('petitions','PetitionController@store');
Route ::get('petitions/{id}/edit','PetitionController@edit');
Route ::put('petitions/{id}','PetitionController@update');
Route ::delete('petitions/{id}','PetitionController@destroy');

Route ::get('test', function (){
    return view('layout/app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

