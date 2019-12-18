@extends('layouts.app')


@section('content')

<h3>{{ $restaurant->name }}</h3>
<ul>
	@foreach($current_meals as $meal)
		<li>{{ $meal->category->name }} - {{ $meal->name }} - {{ $meal->price }}лв.</li>
	@endforeach
</ul>

<p>Цена на човек - {{ $current_menu_price }}лв.</p>
<p>Обща цена - {{ $total }}лв.</p>

<button onclick="location.reload(true)">Дай друго</button>



@endsection