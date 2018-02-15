$(document).ready(function() {
	var date = new Date($('#date').val())
	var myurl= "https://api.nasa.gov/planetary/apod?api_key=3aXntJRSaHQW2gm4NDcoRTJda6rlBjX0xxHabdm3&date=" + date.toISOString().split('T')[0];
	$.ajax({
		    url : myurl,
		    dataType : "json",
		    success : function(json) {
				$('#infoBody').html(json.explanation);
		    	var date = $.format.date(new Date(json.date), 'MMMM d, yyyy');
		    	$('#infoHeader').html(json.title + "<br>" + date);
		    	if ("copyright" in json)
		    		$('#infoCopyright').html("Image Credits: " + json.copyright)
		    	else
    				$("#infoCopyright").html("Image Credits: Public Domain");
    			if (json.media_type == "video") {
    				$('#video').attr('src', json.url);
    				$('body').css('background-image', 'url("")');
    			}
    			else {
    				$('#video').attr('src', "");
					$('body').css('background-image', 'url("' + json.url + '")');
    			}
			}
		});

	$("#prev").click(function(e) {
	e.preventDefault();
	var date = new Date($('#date').val())
	date.setDate(date.getDate()-1);
	$('#date').val(date);
	var myurl= "https://api.nasa.gov/planetary/apod?api_key=3aXntJRSaHQW2gm4NDcoRTJda6rlBjX0xxHabdm3&date=" + date.toISOString().split('T')[0];
		$.ajax({
		    url : myurl,
		    dataType : "json",
		    success : function(json) {
		    	$('#infoBody').html(json.explanation);
		    	var date = $.format.date(new Date(json.date), 'MMMM d, yyyy');
		    	$('#infoHeader').html(json.title + "<br>" + date);
		    	if ("copyright" in json)
		    		$('#infoCopyright').html("Image Credits: " + json.copyright)
		    	else
    				$("#infoCopyright").html("Image Credits: Public Domain");
    			if (json.media_type == "video") {
    				$('#video').attr('src', json.url);
    				$('body').css('background-image', 'url("")');
    			}
    			else {
    				$('#video').attr('src', "");
					$('body').css('background-image', 'url("' + json.url + '")');
    			}
			}
		});
	
    });

    $("#next").click(function(e) {
	e.preventDefault();
	var date = new Date($('#date').val())
	date.setDate(date.getDate()+1);
	$('#date').val(date);
	var myurl= "https://api.nasa.gov/planetary/apod?api_key=3aXntJRSaHQW2gm4NDcoRTJda6rlBjX0xxHabdm3&date=" + date.toISOString().split('T')[0];
		$.ajax({
		    url : myurl,
		    dataType : "json",
		    success : function(json) {
		    	$('#infoBody').html(json.explanation);
		    	var date = $.format.date(new Date(json.date), 'MMMM d, yyyy');
		    	$('#infoHeader').html(json.title + "<br>" + date);
		    	if ("copyright" in json)
		    		$('#infoCopyright').html("Image Credits: " + json.copyright)
		    	else
    				$("#infoCopyright").html("Image Credits: Public Domain");
    			if (json.media_type == "video") {
    				$('#video').attr('src', json.url);
    				$('body').css('background-image', 'url("")');
    			}
    			else {
    				$('#video').attr('src', "");
					$('body').css('background-image', 'url("' + json.url + '")');
    			}
			}
		});
	
    });


});