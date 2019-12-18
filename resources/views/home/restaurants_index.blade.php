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
				</tr>
				@forelse($restaurants as $restaurant)
					<tr>
						<td>
							<a href="{{ route('home.restos.show', $restaurant->id) }}" class="btn btn-outline-light">{{ $restaurant->name }}</a>
						</td>
						<td>{{ $restaurant->address }}</td>
						<td>{{ $restaurant->meals->count() }}</td>
						<td>{{ $restaurant->drinks->count() }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="5"><center>Няма въведени ресторанти</center></td>
					</tr>	
				@endforelse
			</table>
			{{ $restaurants->links() }}
		</div>
	</div>
</div>

@endsection