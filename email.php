<?php
		if($_POST["name"]==""||$_POST["last_name"]==""||$_POST["email"]==""||$_POST["sex"]==""||$_POST["date"]==""){

			echo "Lo sentimos, no llenaste toda la información";
		} else {
			//echo "hágale mijo";
			//Check if the "Sender's Email" input field is filled out
			$email=$_POST['email'];
			// Sanitize E-mail Address
			$email =filter_var($email, FILTER_SANITIZE_EMAIL);
			// Validate E-mail Address
			$email= filter_var($email, FILTER_VALIDATE_EMAIL);

			$name = $_POST['name'];
			$last_name = $_POST['last_name'];
			//$email = $_POST['email'];
			//$email =filter_var($email, FILTER_SANITIZE_EMAIL);
			$sex = $_POST['sex'];
			$date = $_POST['date'];

			if (!$email){
				echo "Invalid Sender's Email";
			}
			else{
				$subject = 'Nuevo registro Wowzer';
				$message = 'Hola Wowzer! '. $name . ' ' . $last_name . ' con el correo electrónico ' . $email . ', nacido en ' . $date . ' y de sexo <b>' .  $sex . '</b> desea inscribirse a tu lista de MailChimp';
				$headers = 'From:'. 'wowzers.store@gmail.com' . "rn"; // Sender's Email
				//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
				// Message lines should not exceed 70 characters (PHP rule), so wrap it
				$message = wordwrap($message, 70);
				// Send Mail By PHP Mail Function
				mail("brayanangarita11@gmail.com", $subject, $message, $headers);
				echo "Your mail has been sent successfuly ! Thank you for your feedback";
			}
		}
	
?>





<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//require 'vendor/phpmailer/phpmailer/src/Exception.php';
//require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//sendMail();

//function sendMail(){

	//if($_POST["name"]==""||$_POST["last_name"]==""||$_POST["email"]==""||$_POST["sex"]==""||$_POST["date"]==""){

		//echo "Lo sentimos, no llenaste toda la información";
	//} else {


		//$name = $_POST['name'];
		//$last_name = $_POST['last_name'];
		//$email = $_POST['email'];
		//$email =filter_var($email, FILTER_SANITIZE_EMAIL);
		//$sex = $_POST['sex'];
		//$date = $_POST['date'];

		//$mail = new PHPMailer(true);

		//try {
		    //Server settings
		    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		    //$mail->isSMTP();                                            // Send using SMTP
		    //$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		    //$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    //$mail->Username   = 'wowzers.store@gmail.com';                     // SMTP username
		    //$mail->Password   = 'tITUSAD19!#';                               // SMTP password
		   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    //$mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    //$mail->setFrom('wowzers.store@gmail.com', 'Wowzers');
		    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
		    //$mail->addAddress('brayanangarita11@gmail.com', 'Wowzers'); //info@wowzers.co               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    // Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    // Content
		    //$mail->isHTML(true);                                  // Set email format to HTML
		    //$mail->Subject = 'Registro de Wowzer';
		    // $mail->Body    = 'Hola Wowzer! '. $name . ' ' . $last_name .
		    // 				 ' con el correo electrónico ' . $email . ', nacido en ' . $date . ' y de sexo <b>' .  $sex . '</b> desea inscribirse a tu lista de MailChimp';

		    // $mail->AltBody = 'Hola Wowzer! '. $name . $last_name .
		    // 				 ' con el correo electrónico' . $email . ' nacido en ' . $date . ' y de sexo ' . $sex . ' desea inscribirse a tu lista de MailChimp';

		    // $mail->send();
		    //echo 'Gracias, ahora eres parte de nuestra lista';

		    ///header('Location: https://www.facebook.com/');


	// 	} catch (Exception $e) {
	// 	    echo "Lo sentimos, no hemos podido agregarte a la lista. Intenta nuevamente. Si sigues teniendo el mismo error por favor envíanos un mensaje al correo info@wowzers.co diciendo que el error que tienes es: {$mail->ErrorInfo}";
	// 	}

	// }



	// } else {
	// 	return;
	// }

//}
	// 	if (isset($_POST['name']) && 
	//echo $name;
	// 	(isset($_POST['last_name']) && 
	// 	(isset($_POST['email']) && 
	// 	(isset($_POST['sex']) && 
	// 	(isset($_POST['date'])){
	// 	echo 'No error';
	// 	} else {
	// 		echo 'Error';
	// 	}
	// }
?>