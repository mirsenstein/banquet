@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h2><center>Ресторанти</center></h2>

			@if(Session::has('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif

			<table class="table table-dark">
				<tr>
					<td>Ресторант</td>
					<td>Адрес</td>
					<td>Брой ястия</td>
					<td>Брой напитки</td>
					<td>Дата на запис</td>
					<td>Промени</td>
					<td>Изтрий</td>
				</tr>
				@forelse($restaurants as $restaurant)
					<tr>
						<td>
							<a href="{{ route('restaurants.show', $restaurant->id) }}" class="btn btn-outline-light">{{ $restaurant->name }}</a>
						</td>
						<td>{{ $restaurant->address }}</td>
						<td>{{ $restaurant->meals->count() }}</td>
						<td>{{ $restaurant->drinks->count() }}</td>
						<td>{{ $restaurant->created_at }}</td>
						<td>
							<a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-info" role="button">Промени</a>
						</td>
						<td>
							<form method="POST" action="{{ route('restaurants.destroy', $restaurant->id) }}" onsubmit="return ConfirmDelete('Изтривайки този ресторант, ще изтриете всички ястия и напитки към него! Искате ли да продължите?')">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger">Изтрий</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5"><center>Няма въведени ресторанти</center></td>
					</tr>	
				@endforelse
			</table>
			{{ $restaurants->links() }}
			<center><a href="{{ route('restaurants.create') }}" class="btn btn-success" role="button">Добави нов ресторант</a></center>
		</div>
	</div>
</div>

@endsection