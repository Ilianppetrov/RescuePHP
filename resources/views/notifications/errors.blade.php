@if (count($errors) > 0)
<div class="col-md-8 col-md-offset-2">	
<div class="alert alert-danger">
	<ul class="errors">
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
</div>
@endif