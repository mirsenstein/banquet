@extends('layouts.app')

@section('content')

<table class="table table-dark">
	<th>
		<td colspan="2">{{ $restaurant->name }}, {{ $restaurant->address }}</td>
		<td colspan="2">
			<a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-info" role="button">Редактирай инфо на ресторант</a>
		</td>
	</th>
	<tr>
		<td>Ястие</td>
		<td>Тип</td>
		<td>Цена</td>
		<td>Промени</td>
		<td>Изтрий</td>
	</tr>
	@foreach($meals as $meal)
	<tr>
		<td>{{ $meal->name }}</td>
		<td>
			{{ $course_type = DB::table('course_types')->where('id', $meal->course_type_id)->value('name') }}
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
	@endforeach
</table>

<center><a href="{{ route('create_with_resto', $restaurant->id) }}" class="btn btn-info" role="button">Добави ново ястие към този ресторант</a></center>

@endsection