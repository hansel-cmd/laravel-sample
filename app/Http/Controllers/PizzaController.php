<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    // get request of index url
    public function index () {

        
        // order by clause : should specify the get()
        $pizzas = Pizza::orderBy('name')->get();
        
        // where clause :
        $pizzas = Pizza::where('type', 'hawaiian')->get();
        
        // get the latest base on created_at attribute
        $pizzas = Pizza::latest()->get();
        
        // $pizzas are Objects
        $pizzas = Pizza::all();
        
        
        return view('pizzas.index', [
            'pizzas' => $pizzas,
            'name' => request('name'), // query parameter (in the url)
            'age' => request('age') // query parameter (in the url)
        ]);
    }

    // get request of show url
    public function show ($id) {
        //we use $id to query one single item from the db and display its details in the single-item view

        $pizza = Pizza::findOrFail($id);

        return view('pizzas.show', [
            'pizza' => $pizza
        ]);
    }

    // get request of create url
    public function create () {
        return view('pizzas.create');
    }

    // post request of create url
    public function store() {
        $name = request('name');
        $type = request('type');
        $base = request('base');
        $toppings = request('toppings');

        $pizza = new Pizza([
            'name' => $name,
            'type' => $type,
            'base' => $base,
            'toppings' => $toppings
        ]);
        $pizza->save();

        return redirect('/pizzas')->with('msg', 'Pizza Added!');
    }

    // post request of order-pizza url
    public function orderPizza () {

        return request('pizza_id');
        // return view('pizzas.order-pizza');
    }

    public function destroy($id) {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        
        return redirect('/pizzas');
    }    

}
