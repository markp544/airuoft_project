<!DOCTYPE html>
<html>
<head>
<title>Main Page</title>
</head>
<body>
	<h1>Welcome to AirUofT</h1>
	<br/>
	<h4>Please fill out the info. below: </h4>
	<form action="">
		<select name="campus">
			<option value="stg">St.George</option>
			<option value="utm">UTM</option>
		</select>
		<!-- Hard coding dates for now. Worry about view later. -->
		<select name="date">
			<option value="July29">July 29th</option>
			<option value="July30">July 30th</option>
			<option value="July31">July 31st</option>
		</select>
		<br/><br/>
		<input type="submit" value="submit">
	</form>
	<?php echo '<h1>PHP test</h1>';?>
</body>
</html>

