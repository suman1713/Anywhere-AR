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
				<div class="col-md-4 v-center">
					{{-- login100-pic --}}
					<div class="js-tilt" data-tilt>
						<a href="{{url('/')}}">
						<img src="{{url('images/arlogo.jpg')}}" alt="IMG" style="width: 100%">
						</a>
					</div>
				</div>

				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/hiro.png')}}" download=""><img src="{{url('images/markers/hiro.png')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/kanji.png')}}" download=""><img src="{{url('images/markers/kanji.png')}}" class="img-100" /></a>
						</div>
		
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/a.jpg')}}" download=""><img src="{{url('images/markers/a.jpg')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/b.jpg')}}" download=""><img src="{{url('images/markers/b.jpg')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/c.jpg')}}" download=""><img src="{{url('images/markers/c.jpg')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/d.jpg')}}" download=""><img src="{{url('images/markers/d.jpg')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/f.jpg')}}" download=""><img src="{{url('images/markers/f.jpg')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/g.jpg')}}" download=""><img src="{{url('images/markers/g.jpg')}}" class="img-100" /></a>
						</div>
						<div class="col-md-4 mb-2">
							<a href="{{url('images/markers/m.jpg')}}" download=""><img src="{{url('images/markers/m.jpg')}}" class="img-100" /></a>
						</div>

					</div>
				</div>
					
				
				<div class="text-center pt-50">
						{{-- <a class="txt3" href="{{url('/')}}">
							Account Information
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
						<br> --}}
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
