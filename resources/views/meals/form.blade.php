<div class="form-group">
	<label for="name">Име на ястието</label>
	<input type="text" name="name" placeholder="Име" class="form-control" value="{{ $meal->name ?? old('name') }}" autocomplete="off">
	@if($errors->has('name'))
		<div class="text-danger">
			{{ $errors->first('name') }}
		</div>
	@endif
</div>

<div class="form-group">
	<label for="category_id">Категория</label>
	<select name="category_id" id="category_id" class="form-control">
		@if($meal->id)
			<option value="{{ $meal->category->id }}" selected>{{ $meal->category->name }}</option>
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		@else
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		@endif
	</select>		
	@if($errors->has('category'))
		<div class="text-danger">
			{{ $errors->first('category') }}
		</div>
	@endif
</div>

<div class="form-group">
	<label for="restaurant_id">Ресторант</label>
	<select name="restaurant_id" id="restaurant_id" class="form-control">
		@if($meal->id)
			<option value="{{ $meal->restaurant->id }}" selected>{{ $meal->restaurant->name }}</option>
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
	<input type="" name="price" placeholder="Цена в лв." step="0.01" min="0" class="form-control" value="{{ $meal->price ?? old('price') }}" autocomplete="off">
	@if($errors->has('price'))
		<div class="text-danger">
			{{ $errors->first('price') }}
		</div>
	@endif
</div>
<input type="hidden" name="source" value="{{$source}}">
@csrf