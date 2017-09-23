function testFunction() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     // document.getElementById("add").innerHTML = this.responseText;
     jQuery("#add").html(this.responseText);
    }
  };
  xhttp.open("GET", "untitled.txt", true);
  xhttp.send();
}

jQuery('#studentService').click(function(e) {
	e.preventDefault();
	jQuery('#studentServiceText').fadeToggle(100);
});