@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('drinks.store') }}">
				
				@include('drinks.form')
				
				<input type="submit" name="submit" value="Създай" class="btn btn-success" class="form-control">
			</form>
        </div>
    </div>
</div>
@endsection
