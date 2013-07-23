
<?php

if(isset($errno)) {
	echo "<p>DB Error:  ($errno) $errmsg</p>";
}

echo "<h3>" . $title . "</h3>";
echo "<table>";
echo "<tr><th>Name</th><th>Time</th><th>Avaiability</th></tr>";

foreach ($flights as $flight) {
	echo "<tr>";
	echo "<td>" . $flight->name . "</td>";
	echo "<td>" . $flight->time . "</td>";
	echo "<td>" . $flight->available . "</td>";
	echo "<td>" . anchor("validateinfo",'Pick Seats') . "</td>";
	echo "</tr>";
}
echo "</table>";
?>