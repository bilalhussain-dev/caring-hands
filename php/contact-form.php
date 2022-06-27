<?php
// Information to be modified
$to_email = "admin@caringhandsforafrica.org"; // email address to which the form data will be sent
$subject = "Contact Request"; // subject of the email that is sent
$thanks_page = "index.html"; // path to the thank you page following successful form submission
$contact_page = "index.html"; // path to the HTML contact page where the form appears


$nam = strip_tags($_POST["contact_name"]);
$ema = strip_tags($_POST["contact_email"]);
$pho = strip_tags($_POST["contact_phone"]);
$sub = strip_tags($_POST["contact_subject"]);
$com = strip_tags($_POST["contact_message"]);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: <' .$ema. '>' . "\r\n";
$headers .= "Reply-To: ".$ema."\r\n";

$email_body = 
	"<p><strong>From: </strong>" . $nam . "</p><br />
	<p><strong>Email: </strong>" . $ema . "</p><br />	
	<p><strong>Phone: </strong>" . $pho . "</p><br />
	<p><strong>Subject: </strong>" . $sub . "</p><br />	
	<p><strong>Message: </strong>" . $com."</p>";
	

// Assuming there's no error, send the email and redirect to Thank You page
	
if( mail($to_email, $sub, $email_body, $headers) ) {
	$msg_array = array( 'status' => 'true', 'data' => '<i class="glyphicon glyphicon-ok"></i> Thank you ' .$nam. '. Your Email was successfully sent!' );
   //	echo json_encode($msg_array);
	?>
	<script type="text/javascript">alert("Thank you <?php echo $nam;?>. Your Email was successfully sent!");window.location.href = 'https://www.caringhandsforafrica.org/contact-us.html';</script>
	<?php 
	exit;
	
} else {	
	$msg_array = array( 'status' => 'true', 'data' => '<i class="glyphicon glyphicon-remove"></i> Sorry ' .$nam. '. Your Email was not sent. Resubmit form again Please..' );
   	//echo json_encode($msg_array);	
   	?>
   	<script type="text/javascript">alert("Sorry <?php echo $nam;?>. Your Email was not sent. Resubmit form again Please.");window.location.href = 'https://www.caringhandsforafrica.org/contact-us.html';</script>
   	<?php 
   	exit;
}