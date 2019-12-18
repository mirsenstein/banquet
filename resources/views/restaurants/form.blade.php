<div class="form-group">
	<label for="name">Име на ресторанта</label>
	<input type="text" name="name" placeholder="Име" class="form-control" value="{{ $restaurant->name ?? old('name') }}" autocomplete="off">
	@if($errors->has('name'))
		<div class="text-danger">
			{{ $errors->first('name') }}
		</div>
	@endif
</div>

<div class="form-group">
	<label for="address">Адрес на ресторанта</label>
	<input type="text" name="address" placeholder="Адрес" class="form-control" value="{{ $restaurant->address ?? old('address')}}" autocomplete="off">
	@if($errors->has('address'))
		<div class="text-danger">
			{{ $errors->first('address') }}
		</div>
	@endif
</div>

@csrf