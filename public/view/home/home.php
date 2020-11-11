<?php include_once(ROOT."/components/header.php"); ?>

<!--banner-starts-->
<div class="bnr" id="home">
	<div  id="top" class="callbacks_container">
		<ul class="rslides" id="slider4">
			<li>
				<img src="/media/images/bnr-1.jpg" alt=""/>
			</li>
			<li>
				<img src="/media/images/bnr-2.jpg" alt=""/>
			</li>
			<li>
				<img src="/media/images/bnr-3.jpg" alt=""/>
			</li>
		</ul>
	</div>
	<div class="clearfix"> </div>
</div>
<!--banner-ends--> 
<!--Slider-Starts-Here-->
<script src="/media/js/responsiveslides.min.js"></script>
<script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			      	auto: true,
			      	pager: true,
			      	nav: true,
			      	speed: 500,
			      	namespace: "callbacks",
			      	before: function () {
			      		$('.events').append("<li>before event fired.</li>");
			      	},
			      	after: function () {
			      		$('.events').append("<li>after event fired.</li>");
			      	}
			      });

			  });
			</script>
			<!--End-slider-script-->

			<!--product-starts-->
			<div class="product"> 

				<div class="container">
					<h2 style="text-align: center;">New products</h2>
					<div class="product-top">
						<div class="product-one">

							<?php if($home_prod !== false) : ?>
								<?php foreach($home_prod as $home) : ?>
									<div class="col-md-3 product-left">
										<div class="product-main simpleCart_shelfItem">
											<a href="/single/<?=$home->id;?>" class="mask"><img class="img-responsive zoom-img" src="/media/images/<?=array_shift($home->img)?>" alt="" /></a>
											<div class="product-bottom">
												<h3><?=$home->title." ".$home->brand;?></h3>
												<p>Explore Now</p>
												<?php if(@!array_key_exists($home->id, $_SESSION['cart'])) : ?>
												<h4><a class="add_item" href="#" data-id="<?=$home->id;?>"><i></i></a>
														<span class=" item_price"><?=App\Models\DiscountPrice::getPrice($home->price, $home->discount);?></span>
												</h4>
											<?php else: ?>
												В корзине
												<?php endif; ?>
											</div>
											<?php if($home->discount > 0) : ?>
												<div class="srch">
													<span>-<?=$home->discount;?>%</span>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>




							<div class="clearfix"></div>
						</div>	




					</div>
				</div>
			</div>
			<!--product-end-->
			

			<?php include_once(ROOT."/components/footer.php"); ?>