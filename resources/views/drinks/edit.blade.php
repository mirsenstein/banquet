@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('drinks.update', $meal->id) }}">
           		{{ method_field('PUT')}}
           		
				      @include('drinks.form')
				
				      <input type="submit" name="submit" value="Промени" class="btn btn-success" class="form-control">
            </form>
        </div>
    </div>
</div>
@endsection
