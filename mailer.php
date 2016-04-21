<?php

$dom = new DOMDocument();
$dom->loadHTMLfile('index.html');

/* Set e-mail recipient */
$myemail = "wesley_lanmon@baylor.edu";

$temp = $dom->getElementById("temp");
$hum = $dom->getElementById("hum");
$acc = $dom->getElementById("acc");
$gyro = $dom->getElementById("gyro");

/* Check all form inputs using check_input function */

$email = check_input($_POST['email']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message = "

Temperature:	$temp
Humidity:		$hum
Accelerometer:	$acc
Gyroscope:		$gyro

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
//header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>
