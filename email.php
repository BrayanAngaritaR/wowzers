<?php
	if($_POST["name"]==""||$_POST["last_name"]==""||$_POST["email"]==""||$_POST["sex"]==""||$_POST["date"]==""||$_POST["birth_day"]==""||$_POST["birth_month"]==""){
		echo "Lo sentimos, no llenaste toda la información";
	} else {
		$email=$_POST['email'];
		// Sanitize E-mail Address
		$email =filter_var($email, FILTER_SANITIZE_EMAIL);

		$name = $_POST['name'];
		$last_name = $_POST['last_name'];
		$sex = $_POST['sex'];
		$birth_day = $_POST['birth_day'];
		$birth_month = $_POST['birth_month'];
		$date = $_POST['date'];

		if (!$email){
			echo "Error al enviar el formulario";
		}
		else{

			$apiKey = '06ae50851fb548cf5a61f36f72db8c96-us4';
			$listId = 'c4e833fe19';

			$memberId = md5(strtolower($email));
			$dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
			$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

			//$apikey = '06ae50851fb548cf5a61f36f72db8c96';

           // $apiKey = '06ae50851fb548cf5a61f36f72db8c96-us4';
            $auth = base64_encode( 'user:'.$apiKey);
		   // $listId = 'c4e833fe19';

		    //$memberId = md5(strtolower($email));
		    //$dataCenter = '06ae50851fb548cf5a61f36f72db8c96-us4';//substr($apiKey,strpos($apiKey,'-')+1);
		    //$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

		    //https://usX.api.mailchimp.com/3.0/lists/{list_id}/members/{email_id}/notes/{id}

		    //$url = 'https://us4' . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

		    //var_dump($url);


            $data = array(
                'apikey'        => '06ae50851fb548cf5a61f36f72db8c96-us4',
                'email_address' => $email,
                'status'        => 'subscribed', // "subscribed","unsubscribed","cleaned","pending"
                'merge_fields'  => array(
                    'FNAME'     => $name,
		            'LNAME'     => $last_name,
		            'MMERGE4'     => $sex,
		            'MDAY'     => $birth_day,
		            'MMONTH'     => $birth_month,
		            'MYEAR'     => $date,
                )
            );

            $json_data = json_encode($data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://us4.api.mailchimp.com/3.0/lists/c4e833fe19/members/');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                                        'Authorization: Basic '.$auth));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);                                                                                                                  

            $result = curl_exec($ch);

            //var_dump($result);




			// $data = [
			//     'email'     => $email,
			//     'status'    => 'subscribed', // "subscribed","unsubscribed","cleaned","pending"
			//     'firstname' => $name,
			//     'lastname'  => $last_name,
			//     'sex'  => $sex,
			//     'birth_day'  => $birth_day,
			//     'birth_month'  => $birth_month,
			//     'date'  => $date,
			// ];

			// syncMailchimp($data);

			// function syncMailchimp($data) {
			//     $apiKey = '06ae50851fb548cf5a61f36f72db8c96-us4';
			//     $listId = 'c4e833fe19';

			//     $memberId = md5(strtolower($data['email']));
			//     $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
			//     $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

			//     $json = json_encode([
			//         'email_address' => $data['email'],
			//         'status'        => $data['status'], 
			//         'merge_fields'  => [
			//             'FNAME'     => $data['firstname'],
			//             'LNAME'     => $data['lastname'],
			//             'MMERGE4'     => $data['sex'],
			//             'MDAY'     => $data['birth_day'],
			//             'MMONTH'     => $data['birth_month'],
			//             'MYEAR'     => $data['date']
			//         ]
			//     ]);

			//     $ch = curl_init($url);

			//     curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
			//     curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
			//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			//     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

			//     $result = curl_exec($ch);
			//     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//     curl_close($ch);

			//     return $httpCode;



			//}



			//$subject = 'Nuevo registro Wowzer';

			//$headers = 'From:'. 'wowzers.store@gmail.com' ."\r\n".
						//'Reply-To: '.$email."\r\n" .
						//'X-Mailer: PHP/' . phpversion(); // Sender's Email

			//$headers .= "MIME-Version: 1.0\r\n";
			//$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

			
			//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender

			//$message = 'Hola Wowzer! '. $name . ' ' . $last_name . ' con el correo electrónico ' . $email . ', nacido el ' . $birth_day . ' de ' . $birth_month . ' del año '. $date . ' y de sexo <b>' .  $sex . '</b> desea inscribirse a tu lista de MailChimp';

			// Send Mail By PHP Mail Function
			//mail("brayanangarita11@gmail.com", $subject, $message, $headers);
			header('Location: wow.php');
			//echo "Gracias, ahora eres parte de nuestra lista";
		}
	}
?>
