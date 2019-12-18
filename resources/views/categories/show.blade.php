@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="mb-2">
    		<h3>{{ $category->name }}</h3>
			<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-dark" role="button">Редактирай името на тази категория</a>
    	</div>
        <div class="col-md-12">
			<table class="table table-dark">
				<tr>
					<td>Ястие</td>
					<td>Ресторант</td>
					<td>Цена</td>
					<td>Промени</td>
					<td>Изтрий</td>
				</tr>
				@forelse($meals as $meal)
				<tr>
					<td>{{ $meal->name }}</td>
					<td>
						{{ $meal->restaurant->name }}
					</td>
					<td>{{ $meal->price }}</td>
					<td>
						<a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-info" role="button">Промени</a>
					</td>
					<td>
						<form method="POST" action="{{ route('meals.destroy', $meal->id) }}">
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
			<center><a href="{{ route('meals.category', $category->id) }}" class="btn btn-info" role="button">Добави ново ястие към тази категория</a></center>
		</div>
	</div>
</div>
@endsection