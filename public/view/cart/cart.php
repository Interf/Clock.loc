<?php include_once(ROOT."/components/header.php"); ?>



<!--start-ckeckout-->
<div class="ckeckout">
	<div class="container">
		<div class="ckeck-top heading">
			<h2>CHECKOUT</h2>
		</div>
		<?php if($cart_arr !== false && $cart_arr !== null) : ?>
			<div class="ckeckout-top">
				<div class="cart-items">
					<h3>My Shopping Bag (Total price: $ <span class="total_price"><?=$_SESSION['total_price'];?></span>)</h3>
					<div class="in-check" >
						<ul class="unit">
							<li><span>Item</span></li>
							<li><span>Product Name</span></li>		
							<li><span>Unit Price</span></li>
							<li><span>Delivery Details</span></li>
							<li> </li>
							<div class="clearfix"> </div>
						</ul>
						<?php foreach($cart_arr as $cart) : ?>
							<ul class="cart-header">
								<div class="close1" data-id="<?=$cart->id;?>" price="<?=$cart->price;?>"> </div>
								<li class="ring-in"><a href="/single/<?=$cart->id;?>" ><img src="/media/images/<?=array_shift($cart->img)?>" class="img-responsive" alt=""></a>
								</li>
								<li><span class="name"><?=$cart->title." ".$cart->brand;?></span></li>
								<li><span class="cost">$ <?=$cart->price;?></span></li>
								<li><span>Free</span>
									<p>Delivered in 2-3 business days</p></li>
									<div class="clearfix"> </div>
								</ul>
							<?php endforeach; ?>
						</div>
					</div>

					<button type="button" class="order">Оформить заказ</button>
					<div class="order_form_container">
						<div class="error_order_message"></div>
						<form class="order_form" action="/cart" method="POST">
							<input type="text" placeholder="Name" name="name">
							<input type="text" placeholder="Phone" name="phone">
							<input type="text"  placeholder="Email" name="email">
							<div class="submit-btn">
								<input type="submit" value="SUBMIT" class="do_order">
							</div>
						</form>
					</div>


				</div>
				

				<style>
				.order_form_container {
					margin-top: 25px;
					width: 100%;
				}

				.order_form input{
					width: 100%;
					padding: 15px 10px;
					margin-bottom: 5px;
				}
			</style>

			



		<?php else : ?>
			<h2>Корзина пуста</h2>
		<?php endif; ?>
	</div>
</div>
<!--end-ckeckout-->









<?php include_once(ROOT."/components/footer.php"); ?>