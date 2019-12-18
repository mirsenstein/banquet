@extends('layouts.app')


@section('content')

<h3>Хайде да ви видим колко хора сте и какви парички имате!</h3>
<form method="POST" action="{{ route('home.create_menu') }}">
	{{ csrf_field() }}
	<div>
		<label>Избирай тука какви неща ще ядете и пиете. Това са опциите, които предлага ресторант {{ $restaurant->name }} :</label>
		<select name="category[]" id="category"  multiple="" style="width: 300px"> 
		    @foreach ($categories as $category)
		        <option value="{{ $category->id }}">
		            {{ $category->name }}
		        </option>
		    @endforeach
		</select>
	</div>

	<div>
		<label>Какви пари каза, че имате?</label>
		<input type="number" name="budget" placeholder="Бюджет">
	</div>

	<div>
		<label>И това за колко човека?</label>
		<input type="number" name="people" placeholder="Брой хора">
	</div>

	<input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">


	<input type="submit" name="submit" value="Епа, аре да видиме" class="btn btn-success">
</form>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#category').select2({
	    	  closeOnSelect: false
	    });

	    $('#restaurant_id').select2();
	    
	});
</script>
@endsection