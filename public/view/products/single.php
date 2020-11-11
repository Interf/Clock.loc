<?php include_once(ROOT."/components/header.php"); ?>




<?php if($one_prod !== false) : ?>
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
					<div class="sngl-top">
						<div class="col-md-5 single-top-left">	
							<div class="flexslider">
								<ul class="slides">
									<?php foreach($one_prod->img as $img) : ?>
										<li data-thumb="/media/images/<?=$img?>">
											<div class="thumb-image"> <img src="/media/images/<?=$img?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<!-- FlexSlider -->
							<script src="/media/js/imagezoom.js"></script>
							<script defer src="/media/js/jquery.flexslider.js"></script>
							<link rel="stylesheet" href="/media/css/flexslider.css" type="text/css" media="screen" />

							<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
							$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
							});
						});
					</script>
				</div>	
				<div class="col-md-7 single-top-right">
					<div class="single-para simpleCart_shelfItem">
						<h2><?=$one_prod->title." ".$one_prod->brand;?></h2>

						<h5 class="item_price">$ <?=App\Models\DiscountPrice::getPrice($one_prod->price, $one_prod->discount);?></h5>
						<?php if($one_prod->discount > 0) :?>
							(-<?=$one_prod->discount;?>%)
						<?php endif; ?>
						<p><?=$one_prod->description;?></p>
						<ul class="tag-men">
							<li><span>TAG</span>
								<span class="women1">: <?=$one_prod->category?></span></li>
							</ul>
							<span class="btn-add">
								<?php if(@!array_key_exists($one_prod->id, $_SESSION['cart'])) : ?>
									<a href="#" class="add-cart add_item" data-id="<?=$one_prod->id;?>">ADD TO CART</a>
								<?php else : ?>
									В корзине
								<?php endif; ?>
							</span>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>


			</div>
			<?php include_once(ROOT.'/components/sidebar.php'); ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--end-single-->

<?php endif; ?>



<?php include_once(ROOT."/components/footer.php"); ?>