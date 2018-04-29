$(document).ready(function() {

	$("#weatherSubmit").click(function(e) {
		e.preventDefault();
		var value = $("#city").val();

		var myurl= "http://api.openweathermap.org/data/2.5/weather?q=" + value + ",US&units=imperial" + "&APPID=2d4eec4e390847f60db2fbfa2318e1e9";
		$.ajax({
			url : myurl,
			dataType : "json",
			success : function(json) {
				console.log(json)
				var results = "";
				results += '<h2>Weather in ' + json.name + "</h2>";
				for (var i=0; i<json.weather.length; i++) {
					results += '<img src="http://openweathermap.org/img/w/' + json.weather[i].icon + '.png"/> ' + json.weather[i].description.charAt(0).toUpperCase() + json.weather[i].description.slice(1) + " ";
				}
				results += '<h4>Currently: ' + json.main.temp + " &deg;F</h4>"
				results += '<p>Low: ' + json.main.temp_min + ' &deg;F<br>High: ' + json.main.temp_max + ' &deg;F<br>Humidity: ' + json.main.humidity + '%';
				results += '<br>Wind Speeds up to ' + json.wind.speed + " mph"

				$("#weatherResults").html(results);
			}
		});
	});

});