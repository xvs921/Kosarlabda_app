function nyitas(id) {
	torol_url = "";
	torol_url += "?input_id=" + id;

	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
			  this.responseText;
			  list();
    	}
  	};
  	xhttp.open("GET", "csomagnyit.php" + torol_url, true);
  	xhttp.send();
}