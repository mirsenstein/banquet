<h1>Courses here</h1>
<h2>Courses List</h2>
<table border="1">
	<tr>
		<td>Item</td>
		<td>Date Created</td>
		<td>Edit Name</td>
		<td>Delete</td>
	</tr>
	@foreach($course_types as $course_types)
	<tr>
		<td>{{ $course_types->name }}</td>
		<td>{{ $course_types->created_at }}</td>
		<td>*</td>
		<td>*</td>
	</tr>
	@endforeach
</table>

---------//* btn Create New 
