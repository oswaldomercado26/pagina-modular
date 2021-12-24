<?php
include("header.php");
if(isset($_POST[submit]))
{  
	$message = "<strong>Dear $_POST[name],</strong><br />
				<strong>Su ID de correo electrónico es :</strong> $_POST[email]<br />
				<strong>Mensaje :-</strong> $_POST[comment]
				";
	
	sendmail("yashikachinz1997@gmail.com","Correo de cita de mi doctor",$message);
	
}
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Contacto</li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h6>Nuestra direccion</h6>
    <p>
AgileMed ,  Blvd. Gral. Marcelino García Barragán<br />

<strong>tel</strong>:33 1378 5900<br />

<strong>Correo electronico</strong>: agilemed@gmail.com</p>

        <h6>Contáctenos ingresando la siguiente información</h6>
            <form action="" method="post">
          <p>
            <input type="text" name="name" id="name" value="" size="22" />
            <label for="name"><small>Nombre (required)</small></label>
          </p>
          <p>
            <input type="text" name="email" id="email" value="" size="22" />
            <label for="email"><small>Correo electronico (required)</small></label>
          </p>
          <p>
            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
            <label for="comment" style="display:none;"><small>Comentario (required)</small></label>
          </p>
          <p>
            <input name="submit" type="submit" id="submit" value="Submit Form"  />
            &nbsp;
            <input name="reset" type="reset" id="reset" tabindex="5" value="Reset Form" />
          </p>
        </form>

  </div>
  
</div>

    <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
function sendmail($toaddress,$subject,$message)
{
	require 'PHPMailer-master/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'mail.dentaldiary.in';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'sendmail@dentaldiary.in';                 // SMTP username
	$mail->Password = 'q1w2e3r4/';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	
	$mail->From = 'sendmail@dentaldiary.in';
	$mail->FromName = 'Web Mall';
	$mail->addAddress($toaddress, 'Joe User');     // Add a recipient
	$mail->addAddress($toaddress);               // Name is optional
	$mail->addReplyTo('aravinda@technopulse.in', 'Information');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');
	
	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $subject;
	
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo '<center><strong><font color=green>Mail sent.</font></strong></center>';
	}
}
?>