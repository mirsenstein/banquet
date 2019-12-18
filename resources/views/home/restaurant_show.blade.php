@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="mb-2">
    		<h3>{{ $restaurant->name }}, {{ $restaurant->address }}</h3>
    	</div>
        <div class="col-md-12">
			<table class="table table-dark">
				<tr>
					<td>Тип</td>
					<td>Ястие</td>
					<td>Цена</td>
				</tr>
				@forelse($meals as $meal)
				<tr>
					<td>
						{{ $meal->category->name }}
					</td>
					<td>{{ $meal->name }}</td>
					<td>{{ $meal->price }}</td>
				</tr>
				@empty
					<tr>
						<td colspan="5"><center>Няма въведени ястия</center></td>
					</tr>	
				@endforelse
			</table>
			@if($meals->count())
				<center><a href="{{ route('home.menu_input', $restaurant->id) }}" class="btn btn-info" role="button">Изберете меню от този ресторант</a></center>
			@endif

		</div>
	</div>
</div>
@endsection