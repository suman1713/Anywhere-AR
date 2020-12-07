<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Scene  | Anywhere AR</title>
	@include('layouts._metaCSS')

</head>
<body>
	{{-- @include('layouts._preloader') --}}
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="col-md-5">
					<div class="login100-pic js-tilt" data-tilt>
						<a href="{{url('/')}}">
						<img src="{{url('images/arlogo.jpg')}}" alt="IMG" style="width: 100%">
						</a>
					</div>
					<div class="text-center pt-50">
						<br>
						<a class="txt3" href="{{ url('/logout') }}">
							Logout, Goodbye!
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<div class="col-md-7">
					<form action="{{ url('admin/scene_detail/update',array($scene->id)) }}" method="post" enctype="multipart/form-data" class="validate-form" id="myform">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<span class="login100-form-title">
							Edit Scene
						</span>
	
						<div class="wrap-input100 validate-input" >
								<div class="form-group">
									<label>Scene Name</label>
									<input name="scene_name" class="form-control" type="text" placeholder="Scene Name" value="{{$scene->scene_name}}" required/>
								</div>
								<div id="markerFile" class="clearfix">
									@foreach($markers as $marker)
									<div id="marker0" class="part">
										<div class="form-group" >
											<label for="marker">Marker</label>
											<select class="form-control" id='markerId0'name="marker_token[]" required>
												<option>Select Marker</option>	
												@foreach($selected as $item)	
												@if ($marker->marker_id == $item->id)
												  <option value="{{$item->id}}"
														{{'selected'}}
													>{{$item->marker_name}}</option>
													@endif
												@endforeach	
											  </select>
										</div>
										<div class="form-group" >
											<label for ='file'>File</label>
											<input type='file' name='file[]' id='file0'class='form-control' accept="image/*" />
											<img src="{{$marker->image_name}}" width="100px"/>
										</div>
										<a href="{{url('admin/marker/delete',$marker->id)}}" class="cross">X</a>
									</div>
									@endforeach
									
								</div>
								<a id="btn1" class="btn add"><i class="fa fa-plus mr-10" aria-hidden="true"></i> Add Marker</a>
															
							  <input type="submit" value="Save" name="submit" class="btn save float-right" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@include('layouts._js')
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@include('layouts._itemJs', ['items' => $items])

<script>
	$( "#myform" ).validate({
  rules: {
    scene_name: {
      required: true
    }
  },
  messages: {
	scene_name: {
	        required: "Please enter Scene Name"
	    }
	},
  submitHandler: function() { $('#myform').submit(); }
});
</script>