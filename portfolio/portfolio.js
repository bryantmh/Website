function testFunction() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     jQuery("#add").html(this.responseText);
    }
  };
  xhttp.open("GET", "Lorem Ipsum.php", true);
  xhttp.send();
}