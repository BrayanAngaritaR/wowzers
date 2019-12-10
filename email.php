<?php
	if($_POST["name"]==""||$_POST["last_name"]==""||$_POST["email"]==""||$_POST["sex"]==""||$_POST["date"]==""){

		echo "Lo sentimos, no llenaste toda la información";
	} else {
		$email=$_POST['email'];
		// Sanitize E-mail Address
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);

		$name = $_POST['name'];
		$last_name = $_POST['last_name'];
		$sex = $_POST['sex'];
		$date = $_POST['date'];

		if (!$email){
			echo "Invalid Sender's Email";
		}
		else{
			$subject = 'Nuevo registro Wowzer';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			$headers = 'From:'. 'wowzers.store@gmail.com' ."\r\n".
						'Reply-To: '.$email."\r\n" .
						'X-Mailer: PHP/' . phpversion(); // Sender's Email
			//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender

			$message = '<html><body>';
			$message .= 'Hola Wowzer! '. $name . ' ' . $last_name . ' con el correo electrónico ' . $email . ', nacido en ' . $date . ' y de sexo <b>' .  $sex . '</b> desea inscribirse a tu lista de MailChimp';

			$message .= '</body></html>';

			// Send Mail By PHP Mail Function
			mail("brayanangarita11@gmail.com", $subject, $message, $headers);
			echo "Gracias, ahora eres parte de nuestra lista";
		}
	}
?>
