@extends('layouts.app')


@section('content')
    
<div class="wrapper pizza-details">

    <h1>Pizza : {{ $pizza->id }} | {{ $pizza->name }}</h1>
<form action="/pizzas/{{ $pizza->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete Pizza</button>
</form>

<form action="/pizzas/order-pizza" method="POST">
    @csrf
    <input type="hidden" name="pizza_id" value="{{$pizza->id}}"/>
    <button>Buy Pizza</button>
</form>


    <p class="type">Type - {{ $pizza->type }}</p>
    <p class="type">Base - {{ $pizza->base }}</p>
    <p class="type">Toppings: </p>
    <ul>
        @foreach ($pizza->toppings as $topping)
            <li>{{ $topping }}</li>
        @endforeach
    </ul>
    <a href="{{ route('pizzas.index') }}" class="back"> <- Back to All Pizzas</a>
</div>
@endsection