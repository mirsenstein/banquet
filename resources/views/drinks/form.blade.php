<div class="form-group">
	<label for="name">Име на напитката</label>
	<input type="text" name="name" placeholder="Име" class="form-control" value="{{ $drink->name ?? old('name') }}" autocomplete="off">
	@if($errors->has('name'))
		<div class="text-danger">
			{{ $errors->first('name') }}
		</div>
	@endif
</div>

<div class="form-group">
	<label for="restaurant_id">Ресторант</label>
	<select name="restaurant_id" id="restaurant_id" class="form-control">
		@if($drink->id)
			<option value="{{ $drink->restaurant->id }}" selected>{{ $drink->restaurant->name }}</option>
			@foreach($restaurants as $restaurant)
				<option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
			@endforeach
		@else
			@foreach($restaurants as $restaurant)
				<option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
			@endforeach
		@endif
	</select>		
	@if($errors->has('restaurant'))
		<div class="text-danger">
			{{ $errors->first('restaurant') }}
		</div>
	@endif
</div>

<div class="form-group">
	<label for="name">Цена</label>
	<input type="number" name="price" placeholder="Цена в лв." class="form-control" value="{{ $drink->name ?? old('name') }}" autocomplete="off">
	@if($errors->has('price'))
		<div class="text-danger">
			{{ $errors->first('price') }}
		</div>
	@endif
</div>

@csrf