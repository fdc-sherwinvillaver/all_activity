$(document).ready(function(){
	var offset = 10;
	var oldoffset = 5;
	$(window).scroll(function() {
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
	       	loadDatas();
	       	oldoffset = offset;
	       	offset = offset + 5;
	   }
	});

	function loadDatas(){
		$.ajax({
			type: "POST",
			url: "images/infiniteScroll",
			data:{offset : offset, oldoffset : oldoffset ,limit: 5 },
			beforeSend: function() {
		        $('#loader').fadeIn('slow');
		    },
		    success: function(data) {
		    	var json = JSON.parse(data);
		        var table = "";
		        for(var i = 1; i < json.length; i++){
		        	table += "<div style='border:1px solid; height:200px;'>" + json[i].User.first_name + " " + json[i].User.middle_name + " " + json[i].User.last_name + "</div>";
		        }
		        $('.append').append(table);
		    },
		    error: function(xhr) { // if error occured
		    },
		    complete: function() {
		    	$('#loader').fadeOut('slow');
		    }
		});
	}
});