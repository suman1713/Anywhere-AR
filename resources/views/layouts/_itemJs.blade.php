<script>
	var formFieldId=0;
	var items = [];
	@foreach($items as $marker)
	var itemObj = {};
	itemObj["id"] = "{{$marker->id}}";
	itemObj["marker_name"] = "{{$marker->marker_name}}";
	items.push(itemObj);
	@endforeach	
	$("#btn1").click(function(e){
		e.preventDefault()
        formFieldId += 1
		var optionData="";
		$.each(items, function( key, data ) { optionData+="<option value='"+data.id+"'>"+data.marker_name+"</option>";});
  		$("#markerFile").append("<div class='clearfix part' id='marker"+ formFieldId +"'>\
								<div class='form-group' >\
									<label>Marker</label>\
										<select class='form-control markers' id='marker"+ formFieldId +"' name='marker_token[]'>\
											<option>Select Marker</option>\
											"+optionData+"</select>\
								</div>\
								<div class='form-group' >\
									<input type='file' name='file[]' id='file"+ formFieldId +"'class='form-control' accept='image/*' />\
								</div>\
								<a id='remove' class='cross' >X</a>\
							</div>");

		
});

$(document).on('click','#remove',function(e){
	var $this = $(this).parent().find('select').find(':selected');
	items.push({id: $this.val(), marker_name: $this.html()});
	$(this).parent().remove();
});

$(document).on('change','.markers',function() {
	var index = $(this).index('.markers');
	var $this = $(this);
	items = items.filter(function( obj ) {
    	return obj.id !== $this.val();
	});	
	$(".markers").each(function() {
		$(".markers:not(:eq("+index+")) option[value!="+$this.val()+"]").show();
    	$(".markers:not(:eq("+index+")) option[value="+$this.val()+"]").hide();
	});
});
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>