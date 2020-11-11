<?php
$menu = App\Models\getMenu::getMenu();
?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Luxury Watches A Ecommerce Category Flat Bootstrap Resposive Website Template | Home :: w3layouts</title>
	<link href="/media/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
	<script src="/media/js/jquery-1.11.0.min.js"></script>
	<!--Custom-Theme-files-->
	<!--theme-style-->
	<link href="/media/css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--start-menu-->
	<script src="/media/js/simpleCart.min.js"> </script>
	<link href="/media/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="/media/js/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
	<!--dropdown-->
	<script src="/media/js/jquery.easydropdown.js"></script>			
	<script src="/media/js/script.js"></script>
	<script src="/media/js/myScript.js"></script>
</head>
<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left" style="width: 100%;">
					<div class="cart box_1">
						<a href="/cart/">
							<div class="total">
								<?=App\Models\Cart::countCart();?>
							</div>
							<img src="/media/images/cart-1.png" alt="" />
						</a>
						<?php if(App\Models\Cart::countCart() == 0) :?>
							<p><a class="simpleCart_empty">Empty Cart</a></p>
						<?php else : ?>
							<p><a class="simpleCart_empty">Have Goods</a></p>
						<?php endif; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="/"><h1>Luxury Watches</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
					<div class="top-nav">
						<?php if($menu !== false)  :?>
							<ul class="memenu skyblue">
								<?php foreach($menu as $menu) : ?>
									<li class="grid"><a href="<?=$menu->url;?>"><?=$menu->title;?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="clearfix"> </div>
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->