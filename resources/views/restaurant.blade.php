<h1>Restaurant here</h1>
<h2>Restaurants List</h2>
<table border="1">
	<tr>
		<td>Restaurant Name</td>
		<td>Date Created</td>
		<td>Edit Name</td>
		<td>Delete</td>
	</tr>
	@foreach($restaurants as $restaurants)
	<tr>
		<td>{{ $restaurants->name }}</td>
		<td>{{ $restaurants->created_at }}</td>
		<td>*</td>
		<td>*</td>
	</tr>
	@endforeach
</table>

---------//* btn Create New 
