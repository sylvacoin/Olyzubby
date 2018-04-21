<?php 
define('WEBMASTER_EMAIL', 'olyzubbyskitchen2011@gmail.com');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_GET['action'] )  ){
	$action = stripslashes($_GET['action']);
	$headers  = "MIME-Version: 1.0\r\n";
	  $headers .= "Content-type: text/html; charset=utf-8\r\n";
	  // Additional headers
	  // This might look redundant but some services REALLY favor it being there.
	  $headers .= "To: Olyzubby <'.WEBMASTER_EMAIL.'>\r\n";
	  
	  
	if ( $action == 'order-takeout' ) {
		$name = stripslashes( $_POST['name'] );
		$email = stripslashes( $_POST['email'] );
		$headers .= "From: $name <$email>\r\n";
		$message = stripslashes( $_POST['message'] );
		
		$mail = mail( WEBMASTER_EMAIL, 'Olyzubby: Take Out Order', $message, 
				$headers
				."X-Mailer: PHP/". phpversion());
		if ( $mail ) {
			echo 'OK';
		}
	}

	if ( $action == 'reservations') {
		$name = stripslashes( $_POST['name'] );
		$email = stripslashes( $_POST['email'] );
		$date = stripslashes( $_POST['date'] );
		$time = stripslashes( $_POST['time'] );
		$headers .= "From: $name <$email>\r\n";
		$noGuests = stripslashes( $_POST['guests'] );
		$message = stripslashes( $_POST['message'] );
		$message .= "\r\n\r\n Reservation Details. \r\n".
					"Number of guests: ".$noGuests."\r\n".
					"Date: ".$date." \r\nTime: ".$time;
					
		$mail = mail( WEBMASTER_EMAIL, 'Olyzubby: Reservation Booking', $message, 
				$headers
				."X-Mailer: PHP/". phpversion());
		if ( $mail ) {
			echo 'OK';
		}
	}

	if ( $action == 'services') {
		
		$name = stripslashes( $_POST['name'] );
		
		$email = stripslashes( $_POST['email'] );
		$headers .= "From: $name <$email>\r\n";
		$service_type = stripslashes( $_POST['service_type'] );
		$message = stripslashes( $_POST['message'] );
		
		$message .= "\r\n\r\n Service Details. \r\n".
					"Service type: ".$service_type."\r\n".
					"Customer Name: ".$name;
					
		$mail = mail( WEBMASTER_EMAIL, 'Olyzubby: Service Request', $message, 
				$headers
				."X-Mailer: PHP/". phpversion());
		if ( $mail ) {
			echo 'OK';
		}
	}

	if ( $action == 'contact' ) {
		$name = stripslashes( $_POST['name'] );
		
		$email = stripslashes( $_POST['email'] );
		
		$headers .= "From: $name <$email>\r\n";
		$message = stripslashes( $_POST['message'] );
		
		$mail = mail( WEBMASTER_EMAIL, 'Olyzubby: Customer Message', $message, 
				$headers
				."X-Mailer: PHP/". phpversion());
		if ( $mail ) {
			echo 'OK';
		}
	}


}