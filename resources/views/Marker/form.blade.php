<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account</title>
	@include('layouts._metaCSS')

</head>
<body>
	
	 <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{url('images/arlogo.jpg')}}" alt="IMG">
				</div>
					
				<form action="{{ url('admin/marker') }}" method="post" enctype="multipart/form-data" files ="true" class="login100-form validate-form">
					<span class="login100-form-title">
						Create Marker
					</span>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="wrap-input100 validate-input">
						<label>Marker Name</label>
						<input name="marker_name" class="form-control" type="text" />
					</div>
					<div class="form-group">
						<label>Select image to upload:</label>
						<input type="file" name="file" id="fileToUpload" class="form-control" />
					</div>
					<input type="submit" value="Save" name="submit"  class="btn btn-primary float-right" />
				</form>

				<div class="text-center p-t-136">
						<a class="txt3" href="{{url('/')}}">
							Account Information
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
						<br>
						<a class="txt3" href="{{ route('logout') }}">
							Logout, Goodbye!
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
				
					</div>
			</div>
		</div>
	</div>
	
	@include('layouts._js')


</body>
</html>
