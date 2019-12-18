    <div class="row justify-content-center">
            <form method="POST" action="{{ route('categories.store') }}">
				
				@include('categories.form')
				
				<input type="submit" name="submit" value="Създай" class="btn btn-success" class="form-control">
			</form>
    </div>
