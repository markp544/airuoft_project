<html>
<head>
<title>Testing</title>
</head>
<body>
<h1>Testing</h1>
</body>
</html>
<?php

if(isset($errno)) {
	echo "<p>DB Error:  ($errno) $errmsg</p>";
}

echo "<h3>Flights</h3>";
echo "<table>";
echo "<tr><th>Name</th><th>Time</th><th>Avaiability</th></tr>";

foreach ($flights as $flight) {
	echo "<tr>";
	echo "<td>" . $flight->name . "</td>";
	echo "<td>" . $flight->time . "</td>";
	echo "<td>" . $flight->available . "</td>";
	echo "</tr>";
}

echo "</table>";
?>