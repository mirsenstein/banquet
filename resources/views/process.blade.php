<h1> Form </h1>
{!! Form::open(['url' => 'foo/bar']) !!}
	Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']);
{!! Form::close() !!}
