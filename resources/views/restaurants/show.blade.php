@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="mb-2">
    		<h3>{{ $restaurant->name }}, {{ $restaurant->address }}</h3>
			<a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-outline-dark" role="button">Редактирай инфо на ресторант</a>
    	</div>
        <div class="col-md-12">
			<table class="table table-dark">
				<tr>
					<td>Ястие</td>
					<td>Тип</td>
					<td>Цена</td>
					<td>Промени</td>
					<td>Изтрий</td>
				</tr>
				@forelse($meals as $meal)
				<tr>
					<td>{{ $meal->name }}</td>
					<td>
						{{ $meal->category->name }}
					</td>
					<td>{{ $meal->price }}</td>
					<td>
						<a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-info" role="button">Промени</a>
					</td>
					<td>
						<form method="POST" action="{{ route('meals.destroy', $meal->id, $flag=1) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-danger">Изтрий</button>
						</form>
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="5"><center>Няма въведени ястия</center></td>
					</tr>	
				@endforelse
			</table>
			<center><a href="{{ route('meals.resto', $restaurant->id) }}" class="btn btn-info" role="button">Добави ново ястие към този ресторант</a></center>
		</div>
	</div>
</div>
@endsection