<?php
Class Mail
{

public function Send($adress,$object,$message){
		require 'mailPHP/PHPMailerAutoload.php';

		$phpmail = new PHPMailer;

		$phpmail->SMTPDebug = 3;

		$phpmail->isSMTP();
		$phpmail->Host = 'smtp.gmail.com';
		$phpmail->SMTPAuth = true;
		$phpmail->Username = 'dotomatic.isep@gmail.com';
		$phpmail->Password = 'groupeappg1b';
		$phpmail->Port = 587;
		$phpmail->From = 'dotomatic.isep@gmail.com';
		$phpmail->FromName = 'Dotomatic Support';

		$phpmail->addAddress($adress);
		$phpmail->CharSet = 'UTF-8';
		$phpmail->Subject = $object;
		$phpmail->Body    = '';
		$phpmail->MsgHTML($message);
		//$phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
ob_start();
	if(!$phpmail->send()) {
		}
$contenu = ob_get_clean();

}

}
?>
