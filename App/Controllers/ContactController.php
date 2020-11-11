<?php

class ContactController
{
	public function actionIndex()
	{
		if(isset($_POST['do_mess'])) {
			$name = trim(htmlspecialchars($_POST['name']));
			$phone = trim(htmlspecialchars($_POST['phone']));
			$email = trim(htmlspecialchars($_POST['email']));
			$msg = trim(htmlspecialchars($_POST['message']));

			if(mb_strlen($name) < 3 || mb_strlen($phone) < 3 || mb_strlen($email) < 3 || mb_strlen($msg) < 3) {
				$errors[] = "Заполните все поля.";
			}

			if(empty($errors)) {
				$to      = 'int@int.int';
				$subject = 'Message from contact';
				$message = "Name: $name\nPhone: $phone\nMessage: $msg";
				$headers = "From: $email" . "\r\n" .
				"Reply-To: $email" . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);
				$_SESSION['test'] = "Сообщение доставлено";
				echo 1;
			} else {
				echo json_encode($errors);
			}


			exit();
		}


		include_once(ROOT.'/public/view/contact/contact.php');
		return true;
	}
}