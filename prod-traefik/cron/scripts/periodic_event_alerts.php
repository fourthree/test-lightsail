#!/usr/bin/env php
<?php 
require_once('class.phpmailer.php');
		include("class.smtp.php");			// optional, gets called from within class.phpmailer.php if not already loaded
	$errorLogger= "<b>Problemi riscontrati nei servizi</b><br><br>";
	$messaggio='';
	echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
	require_once('vittorioChecks.php');

		
		/*if (isset ($_POST["name"]))
		{
            
            $nome            = @$_REQUEST['name'];
            $email            = @$_REQUEST['email'];       
            $oggetto            = @$_REQUEST['subject'];
            $message           = @$_REQUEST['message'];*/
     
			$mail             = new PHPMailer();
			
			//VOLENDO CON UN REQUIRE QUA BISOGNA METtERE L'HTML DELLA MAIL CON POST
			$body=  <<<EOT


<h4>{$message}</h4>




   
EOT;
			//$body             = file_get_contents('contents.html');
			//$body             = eregi_replace("[\]",'',$body);
            //GMAIL CONFIGURAZIONE PER PHP MAILER
          
			ini_set( 'display_errors', 1 );
			error_reporting( E_ALL );
			$from = "emailtest@YOURDOMAIN";
			$to = "pcremascoliweb@gmail.com";
			$subject = "mail da script quotidiano";
			$message = $errorLogger."<br>".$messaggio; 
			$headers = "From:" . $from;
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($to,$subject,$message, $headers);
			echo "Test email sent";

            //ARUBA CONFIGURAZIONE 
            $mail->SMTPAuth   = true;                  // Abilitiamo l'autenticazione SMTP              
            $mail->IsSMTP(); // telling the class to use SMTP                    
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->IsHTML(true);          
			
            //$mail->Host = "smtps.aruba.it";
			$mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 or 465 or 25
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Username   = "pwebanalysis@gmail.com"; // SMTP account username
			$mail->Password   = "4343pa43";        // SMTP account password

			$mail->SetFrom("Amministrazione", "Amministrazione");
			$mail->AddReplyTo("noreply", "noreply");
			$mail->Subject    = "mail da script quotidiano";
			//$mail->SetFrom($email, $nome);
			//$mail->AddReplyTo($email, $nome);
			//$mail->Subject    = $oggetto;
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test			
			$mail->MsgHTML(	$errorLogger."<br>".$messaggio);
			//$address = "massenzana.paolo@gmail.com";      //indirizzo a cui deve andare la mail
			$address = "marcobert37@gmail.com";      //indirizzo a cui deve andare la mail
			$address2 = "massenzana.paolo@gmail.com";
			//$address = "p.pasini@davittorio.com";      //indirizzo a cui deve andare la mail finale
			$mail->AddAddress($address);
			$mail->AddAddress($address2);
			// if(!$mail->Send()) {
			  //qua ci va una variabile per gestire l'errore in pagina e non degli echo che finiscono in cima fuori template
			   // $risultato =  "Mailer Error: " . $mail->ErrorInfo;
			// } else {
			  // $risultato =  "Message sent!";
			// }
		

file_put_contents("/tmp/puppa", "puppa");
