<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PizzaController;
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

// if u wanna disable a registration form then,
// put the following in the routes: ['register' => false]
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// ->('name') is just an alias of your route

// ->middleware('auth') u can just go to the PizzaController and add a constructor and use middleware

Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');


Route::post('/pizzas/order-pizza', [PizzaController::class, 'orderPizza'])->name('pizzas.order-pizza');


Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
Route::post('/pizzas/create', [PizzaController::class, 'store'])->name('pizzas.create');


Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
