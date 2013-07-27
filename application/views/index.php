<!DOCTYPE html>
<html>
<head>
<title>Main Page</title>
<script>
function create_dates() {
	var d = new Date();
	var preSelect = document.getElementById("0");
	d.setDate(d.getDate() + 1);
	preSelect.innerHTML = d.toDateString();
	//Dynamically creates dates for the next 2 weeks and makes them into elements.
	for (i = 0; i < 13; i++) {
		d.setDate(d.getDate() + 1);
		var opt = document.createElement("option");
		var node = document.createTextNode(d.toDateString());
		var sel = document.getElementById("dates");
		opt.appendChild(node);
		sel.appendChild(opt);
	}
}

</script>
</head>
<body onload="create_dates()">
	<h1>Welcome to AirUofT</h1>
	<br/>
	<h4>Please fill out the info. below: </h4>
	<?php echo form_open('flights/index');?>
	<!--<form action="flights_view.php" method="get">-->
		<select name="campus">
			<option value="1" selected>St.George</option>
			<option value="2">UTM</option>
		</select>
		<select id="dates" name="date">
			<option id="0" selected></option>
		</select>
		<br/><br/>
		<input type="submit" name="submit" value="submit">
	<?php echo form_close();?>
	<!-- </form> -->
</body>
</html>

