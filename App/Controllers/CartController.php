<?php

class CartController
{
	public function actionIndex()
	{
		if(isset($_POST['do_order'])) {

			$name = trim(htmlspecialchars($_POST['name']));
			$phone = trim(htmlspecialchars($_POST['phone']));
			$email = trim(htmlspecialchars($_POST['email']));

			if(empty($name) || empty($phone) || empty($email)) {
				$errors[] = "Заполните все поля";
			}

			if(empty($errors)) {
				$total_price = App\Models\Cart::getTotalPrice();
				$id_prod_list = implode(",", array_keys($_SESSION['cart']));
				$msg = "$id_prod_list\nИтоговая сумма: $total_price";

				$to      = 'int@int.int';
				$subject = 'ORDER';
				$message = "Name: $name\nPhone: $phone\nId товаров: $msg";
				$headers = "From: $email" . "\r\n" .
				"Reply-To: $email" . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);
				echo 1;
				unset($_SESSION['cart']);
			} else {
				echo json_encode($errors);
			}

			exit();
		}


		if(!empty($_SESSION['cart'])) {
			$cart_arr = App\Models\Cart::getCart();
		} else {
			$cart_arr = false;
		}


		include_once(ROOT.'/public/view/cart/cart.php');
		return true;
	}

	public function actionAdd($id_prod)
	{
		App\Models\Cart::addProdInCart($id_prod);

		echo App\Models\Cart::countCart();

		return true;
	}

	public function actionDel($id_prod)
	{
		if(isset($_POST['delProd'])) {
			App\Models\Cart::delFromCart($id_prod);

			$result["total_price"] = $_SESSION['total_price'] -= $_POST['price'];
			$result["count_cart"] = count($_SESSION['cart']);

			echo json_encode($result);
		}

		return true;
	}

}