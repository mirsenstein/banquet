@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h2><center>Напитки</center></h2>

			@if(Session::has('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif

			<table class="table table-dark">
				<tr>
					<td>Напитка</td>
					<td>Ресторант</td>
					<td>Цена</td>
					<td>Дата на запис</td>
					<td>Промени</td>
					<td>Изтрий</td>
				</tr>
				@forelse($drinks as $drink)
					<tr>
						<td>
							<a href="{{ route('drinks.show', $drink->id) }}" class="btn btn-outline-light">{{ $drink->name }}</a>
						</td>
						<td>{{ $drink->restaurant->name}}</td>
						<td>{{ $drink->price }}</td>
						<td>{{ $drink->created_at }}</td>
						<td>
							<a href="{{ route('drinks.edit', $drink->id) }}" class="btn btn-info" role="button">Промени</a>
						</td>
						<td>
							<form method="POST" action="{{ route('drinks.destroy', $drink->id) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger">Изтрий</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="7"><center>Няма въведени напитки</center></td>
					</tr>	
				@endforelse
			</table>
			{{ $drinks->links() }}
			<center><a href="{{ route('drinks.create') }}" class="btn btn-success" role="button">Добави нова напитка</a></center>
		</div>
	</div>
</div>
@endsection