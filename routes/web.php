<?php
use App\Events\OrderStatusUpdated;

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

class Order{

     public $id;

     public function __construct($id){
         $this->id =$id;
     }
}

Route::get('/', function () {



    // event(new Order)
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/update', function(){

//     OrderStatusUpdated::dispatch(new order(5));
// });
Route::get('/tasks', function () {
    return Task::latest()->pluck('body');
});

Route::post('/tasks', function(){
 return Task::forceCreate(request(['body']));
});




