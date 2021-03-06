@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    	{{$error}}
    </div>
  @endforeach
@endif

@if(isset($success))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{$success}}
	</div>
@endif

@if(isset($error))
 	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    	{{$error}}
	</div>
@endif