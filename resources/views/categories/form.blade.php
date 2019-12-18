<div class="form-group">
	<label for="name">Име на категорията</label>
	<input type="text" name="name" placeholder="Име" class="form-control" value="{{ $category->name ?? old('name') }}" autocomplete="off">
	@if($errors->has('name'))
		<div class="text-danger">
			{{ $errors->first('name') }}
		</div>
	@endif
</div>

@csrf