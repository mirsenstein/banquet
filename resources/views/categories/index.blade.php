@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h2><center>Категории</center></h2>

			@if(Session::has('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif
			
			<table class="table table-dark">
				<tr>
					<td>Категория</td>
					<td>Брой ястия</td>
					<td>Дата на запис</td>
					<td>Промени</td>
					<td>Изтрий</td>
				</tr>
				@forelse($categories as $category)
					<tr>
						<td>
							<a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-light">{{ $category->name }}</a>
						</td>
						<td>{{ $category->meals->count() }}</td>
						<td>{{ $category->created_at }}</td>
						<td>
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info" role="button">Промени</a>
						</td>
						<td>
							<form method="POST" action="{{ route('categories.destroy', $category->id) }}" onsubmit="return ConfirmDelete('Изтривайки тази категория, ще изтриете всички ястия към нея! Искате ли да продължите?')">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger">Изтрий</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5"><center>Няма въведени категории</center></td>
					</tr>	
				@endforelse
			</table>
			{{ $categories->links() }}
		</div>
		<div>
			<form method="POST" action="{{ route('categories.store') }}">
				<div class="form-group">
					<label for="name">Име на категорията</label>
					<input type="text" name="name" placeholder="Име" class="form-control" value="{{ old('name') }}" autocomplete="off">
					@if($errors->has('name'))
						<div class="text-danger">
							{{ $errors->first('name') }}
						</div>
					@endif
				</div>

				@csrf
				<input type="submit" name="submit" value="Създай" class="btn btn-success">
			</form>	
		</div>

	</div>
</div>
@endsection