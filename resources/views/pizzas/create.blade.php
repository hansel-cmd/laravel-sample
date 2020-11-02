@extends('layouts.app')

@section('content')
    
<div class="wrapper create-pizza">
    <h1>Create a New Pizza</h1>
    <form action="/pizzas/create" method="post">
        @csrf
        <label for="name">Pizza Name:</label>
        <input type="text" name="name" id="name" />
        <label for="type">Choose pizza type:</label>
        <select name="type" id="type">
            <option value="margherita">Margherita</option>
            <option value="hawaiian">Hawaiian</option>
            <option value="volcano">Volcano</option>
            <option value="veg supreme">Veg Supreme</option>
            <option value="beef">Cheesy Garlic</option>
            <option value="peperoni">Peperoni</option>
        </select>

        <label for="base">Choose pizza type:</label>
        <select name="base" id="base">
            <option value="cheesy garlic">Cheesy Garlic</option>
            <option value="garlic crust">Garlic crust</option>
            <option value="cheese crust">Cheese crust</option>
            <option value="thin crust">Thin crust</option>
        </select>

        <label for="toppings">Toppings: </label><br />
        <input type="checkbox" name="toppings[]" value="mushroom" />Mushroom <br />
        <input type="checkbox" name="toppings[]" value="olive" />Olive <br />
        <input type="checkbox" name="toppings[]" value="cheese" />Cheese <br />
        <input type="checkbox" name="toppings[]" value="garlic" />Garlic <br />
        <input type="checkbox" name="toppings[]" value="pepper" />Pepper <br />

        <input type="submit" value="create pizza" />
    </form>
</div>
@endsection
