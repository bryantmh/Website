$(document).ready(function() {
	var date = new Date($('#date').val())
	var myurl= "https://api.nasa.gov/planetary/apod?api_key=3aXntJRSaHQW2gm4NDcoRTJda6rlBjX0xxHabdm3&date=" + date.toISOString().split('T')[0];
	$.ajax({
		    url : myurl,
		    dataType : "json",
		    success : function(json) {
				$('body').css('background-image', 'url("' + json.url + '")');
			}
		});
	// $("#weatherSubmit").click(function(e) {
	// e.preventDefault();
	// var value = $("#city").val();

	// var myurl= "https://api.arcsecond.io/exoplanets/";
	// 	$.ajax({
	// 	    url : myurl,
	// 	    dataType : "json",
	// 	    success : function(json) {
	// 	    	console.log(json)
	// 	    	var results = "";
	// 				for (var i=0; i<json.length; i++) {
	// 					results += '<h2>Name ' + json[i].name + "</h2>";
	// 				    results += '<p>Star Name: ' + json[i].parent_star_name + '<br>Detection Method: ' + json[i].detection_method;// + '<br>Orbital Period: ' + json[i].orbital_period.value + ' ' + json[i].orbital_period.unit + ",/";
	// 				}
	// 				$("#weatherResults").html(results);
	// 		}
	// 	});
	
 //    });

    //https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY

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
		    	console.log(json)
		    	var results = "";
					results += json.date + "<br>";
					results += json.title
					// for (var i=0; i<json.items.length; i++) {
					//     results += '<a href="' + json.items[i].link + '""><b>' + json.items[i].title + '</b></a><br>';
					// }
					$("#weatherResults").html(results);
				$('body').css('background-image', 'url("' + json.url + '")');
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
		    	console.log(json)
		    	var results = "";
					results += json.date + "<br>";
					results += json.title
					// for (var i=0; i<json.items.length; i++) {
					//     results += '<a href="' + json.items[i].link + '""><b>' + json.items[i].title + '</b></a><br>';
					// }
					$("#weatherResults").html(results);
				$('body').css('background-image', 'url("' + json.url + '")');
			}
		});
	
    });


});