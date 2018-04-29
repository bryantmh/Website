$(document).ready(function() {

	$("#stackSubmit").click(function(e) {
	e.preventDefault();
	var value = $("#question").val();

	var myurl= "https://api.stackexchange.com/2.2/search?order=desc&sort=activity&site=stackoverflow&intitle=" + value;
		$.ajax({
		    url : myurl,
		    dataType : "json",
		    success : function(json) {
		    	console.log(json.items)
		    	var results = "";
					results += "<h2>Search Results</h2>";
					for (var i=0; i<json.items.length; i++) {
					    results += '<a href="' + json.items[i].link + '""><b>' + json.items[i].title + '</b></a><br>';
					}
					$("#stackResults").html(results);
			}
		});
    });

});