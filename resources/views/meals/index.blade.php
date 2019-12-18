@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h2><center>Ястия</center></h2>

			@if(Session::has('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif

			<table class="table table-dark">
				<tr>
					<td>Ястие</td>
					<td>Ресторант</td>
					<td>Категория</td>
					<td>Цена</td>
					<td>Дата на запис</td>
					<td>Промени</td>
					<td>Изтрий</td>
				</tr>
				@forelse($meals as $meal)
					<tr>
						<td>
							<a href="{{ route('meals.show', $meal->id) }}" class="btn btn-outline-light">{{ $meal->name }}</a>
						</td>
						<td>{{ $meal->restaurant->name}}</td>
						<td>{{ $meal->category->name }}</td>
						<td>{{ $meal->price }}</td>
						<td>{{ $meal->created_at }}</td>
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
						<td colspan="7"><center>Няма въведени ястия</center></td>
					</tr>	
				@endforelse
			</table>
			{{ $meals->links() }}
			<center><a href="{{ route('meals.create') }}" class="btn btn-success" role="button">Добави ново ястие</a></center>
		</div>
	</div>
</div>
@endsection