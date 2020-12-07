<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Scene  | Anywhere AR</title>
	@include('layouts._metaCSS')
  <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="padding: 80px 80px 80px 5px">
				<div class="col-md-4 v-center">
					<div class=" js-tilt" data-tilt>
						<a href="{{url('/')}}">
              <img src="{{url('images/arlogo.jpg')}}" alt="IMG" style="width: 100%">
            </a>
					</div>
					{{-- <div class="text-center p-t-136">
						<br>
						<a class="txt3" href="{{ url('/logout') }}">
							Logout, Goodbye!
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						</a>
					</div> --}}
				</div>

				<div class="col-md-8">
          <video id="webcam-preview" class="br-15"></video>
				</div>
						
			</div>
		</div>
	</div>
  @include('layouts._js')
  <script>
    const codeReader = new ZXing.BrowserQRCodeReader();
    const baseUrl = window.location.href;
    codeReader.decodeFromVideoDevice(null, 'webcam-preview', (result, err) => {
      if (result) {
        // properly decoded qr code
        console.log('Found QR code!', result)
        window.open(result.text)
      }
  
      if (err) {
            if (err instanceof ZXing.NotFoundException) {
          console.log('No QR code found.')
        }
  
        if (err instanceof ZXing.ChecksumException) {
          console.log('A code was found, but it\'s read value was not valid.')
        }
  
        if (err instanceof ZXing.FormatException) {
          console.log('A code was found, but it was in a invalid format.')
        }
      }
    });
  </script>
</body>
</html>

