@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
           		{{ method_field('PUT')}}
           		
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
				
              <input type="submit" name="submit" value="Промени" class="btn btn-success" class="form-control">
            </form>
        </div>
    </div>
</div>
@endsection
