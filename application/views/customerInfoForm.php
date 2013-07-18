<!DOCTYPE html>
<html>
    <head>
        <title>Collect Customer Info</title>
        <!-- <link href="maincss.css" rel="stylesheet"> -->
        <!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="layoutjs.js" type="text/javascript"></script>
        <script src="canvasjs.js" type="text/javascript"></script> -->
        <script>
            function validateCreditCard(input) {
                var pattern = new RegExp("^[0-9]{16}$");
                if (input.value.trim().length !== 16 || pattern.test(input.value.trim()) === false) {
                    input.setCustomValidity("Enter a valid 16 digit credit card number.");
                }
                else {
                    input.setCustomValidity("");
                }
            }

            function validateExpirationDate(input) {
                var pattern = new RegExp("^[0-9]{2}\/[0-9]{2}$");
                var inputTrim = input.value.trim();
                var valid = false;
                var notExpired = false;
                var month = inputTrim.substring(0, 2);
                var year = inputTrim.substring(3, 5);
                var date = new Date();

                if (pattern.test(inputTrim) === true 
                        && parseInt(month) > 0 && parseInt(year) >= 0) {
                    valid = true;

                    if (parseInt((date.getFullYear() + "").substring(2, 4)) < parseInt(year)
                            || (parseInt((date.getFullYear() + "").substring(2, 4)) === parseInt(year)
                            && (parseInt(date.getMonth()) + 1) <= parseInt(month))) {
                        notExpired = true;
                    }
                }

                if (valid && notExpired) {
                    input.setCustomValidity("");
                }
                else if (valid && notExpired === false) {
                    input.setCustomValidity("Credit card is expired.");
                }
                else {
                    input.setCustomValidity("Enter a valid expiration date (MM/YY).");
                }
            }
        </script>
    </head>
    <body>
        <h1>Payment</h1> 
        <h4>All fields are required</h4>
        <?php
        //echo validation_errors();

        echo form_open('validateInfo/register');

        echo form_label('First name');
        echo "&nbsp";
        echo form_input('firstname', set_value('firstname'), 'required');
        echo form_error('firstname');

        echo '<br/>';
        echo '<br/>';

        echo form_label('Last name');
        echo "&nbsp";
        echo form_input('lastname', set_value('lastname'), 'required');
        echo form_error('lastname');

        echo '<br/>';
        echo '<br/>';

        echo form_label('Credit Card Number');
        echo "&nbsp";
        echo form_input('creditcard', set_value('creditcard'), 'required oninput="validateCreditCard(this);"');
        echo form_error('creditcard');

        echo '<br/>';
        echo '<br/>';

        echo form_label('Credit Card Expiration Date');
        echo "&nbsp";
        echo form_input('expirationdate', set_value('expirationdate'), 'required oninput="validateExpirationDate(this);"');
        echo form_error('expirationdate');

        echo '<br/>';
        echo '<br/>';

        echo form_submit('submit', 'Buy Ticket');
        ?>
    </body>
</html>

