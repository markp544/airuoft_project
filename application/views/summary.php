<h3>Purchase Summary</h3> 
<?php
    if (isset($errno) || isset($dberror)) {
        echo "<p>DB ERROR</p>";
        if (isset($errno)) {
            echo "<p>Error $errno, $errmsg</p>";
        }
    }
    else {
        if (isset($firstname) && isset($lastname) && isset($creditcard) && isset($expirationdate)) {
            echo "<h4>First Name: " . $firstname . "</h4>";
            echo "<h4>Last Name: " . $firstname . "</h4>";
            echo "<h4>Credit card number : " . $creditcard . "</h4>";
            echo "<h4>Credit card expiration date: " . $expirationdate . "</h4>";
        }  
}


?>

<button type="button" onclick="window.print();" >Print Page</button>
