<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/gh/aframevr/aframe@1c2407b26c61958baa93967b5412487cd94b290b/dist/aframe-master.min.js"></script>
<!-- include aframe-ar.js -->
<script src="js/aframe-ar.js"></script>

<body style='margin : 0px; overflow: hidden; font-family: Monospace;'><div style='position: fixed; top: 10px; width:100%; text-align: center; z-index: 1;'>

</div>
	<a-scene embedded arjs='sourceType: webcam; detectionMode: mono_and_matrix; matrixCodeType: 3x3;'>
		<!-- handle unknown marker -->
		<!-- <a-marker type='unknown'>
			<a-box depth="1" height="1" width="1" position='0 0.5 0' material='opacity: 0.5; side:double; color:blue;'></a-box>
		</a-marker> -->

		<!-- handle hiro marker -->
		@foreach($markers as $marker)
		@if($marker->marker_name =='Hiro')
		<a-marker preset='hiro'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
   				<a-animation attribute="rotation"
               		dur="10000"
               		fill="forwards"
               		to="0 360 0"
			   		repeat="indefinite">
				</a-animation>
   			</a-image>
			
		</a-marker>
		@endif


		
		@if($marker->marker_name =='Kanji')
		<!-- handle kanji marker -->
		<a-marker preset='kanji'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
   				<a-animation attribute="rotation"
               		dur="10000"
               		fill="forwards"
               		to="0 360 0"
					   repeat="indefinite">
				</a-animation>
   			</a-image>
		</a-marker>
		@endif

		@if($marker->marker_name =='A')
		<a-marker preset='custom' type='pattern' url='https://raw.githubusercontent.com/suman1713/capstone-assets/master/pattern-letterA.patt'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
   				<a-animation attribute="rotation"
					dur="10000"
					fill="forwards"
					to="0 360 0"
					repeat="indefinite">
				</a-animation>
   			</a-image>
		</a-marker>
		@endif

		@if($marker->marker_name =='B')
		<a-marker preset='custom' type='pattern' url='https://raw.githubusercontent.com/suman1713/capstone-assets/master/pattern-letterB.patt'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
   				<a-animation attribute="rotation"
					dur="10000"
					fill="forwards"
					to="0 360 0"
					repeat="indefinite">
				</a-animation>
   			</a-image>
		</a-marker>
		@endif

		@if($marker->marker_name =='C')
		<a-marker preset='custom' type='pattern' url='https://raw.githubusercontent.com/suman1713/capstone-assets/master/pattern-letterC.patt'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
   				<a-animation attribute="rotation"
					dur="10000"
					fill="forwards"
					to="0 360 0"
					repeat="indefinite">
				</a-animation>
   			</a-image>
		</a-marker>
		@endif

		@if($marker->marker_name =='D')
		<a-marker preset='custom' type='pattern' url='https://raw.githubusercontent.com/suman1713/capstone-assets/master/pattern-letterD.patt'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
				<a-animation attribute="rotation"
					dur="10000"
					fill="forwards"
					to="0 360 0"
					repeat="indefinite">
				</a-animation>
   			</a-image>
		</a-marker>
		@endif

		@if($marker->marker_name =='F')
		<a-marker preset='custom' type='pattern' url='https://raw.githubusercontent.com/suman1713/capstone-assets/master/pattern-letterF.patt'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
				<a-animation attribute="rotation"
						dur="10000"
						fill="forwards"
						to="0 360 0"
						repeat="indefinite">
				</a-animation>
			</a-image>
		</a-marker>
		@endif

		@if($marker->marker_name =='G')
		<a-marker preset='custom' type='pattern' url='https://raw.githubusercontent.com/suman1713/capstone-assets/master/pattern-letterG.patt'>
			<a-image crossorigin="anonymous" position="0 0.5 0" src="{{$marker->image_name}}" width="4"  height="2">
				<a-animation attribute="rotation"
						dur="10000"
						fill="forwards"
						to="0 360 0"
						repeat="indefinite">
				</a-animation>
   			</a-image>
		</a-marker>
		@endif
		@endforeach

		<!-- add a simple camera -->
		<a-entity camera></a-entity>
	</a-scene>
</body>
</html>
