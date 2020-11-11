<?php include_once(ROOT."/components/header.php"); ?>



<!--start-breadcrumbs-->
<div class="breadcrumbs">
	<div class="container">
		<div class="breadcrumbs-main">
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">New Products</li>
			</ol>
		</div>
	</div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt"> 
	<div class="container">
		<div class="prdt-top">
			<div class="col-md-9 prdt-left">
				<div class="product-one">
					<?php if($prod_arr !== false) : ?>
						<?php foreach($prod_arr as $prod) : ?>
							<div class="col-md-4 product-left p-left">
								<div class="product-main simpleCart_shelfItem">
									<a href="/single/<?=$prod->id;?>" class="mask"><img class="img-responsive zoom-img" src="/media/images/<?=array_shift($prod->img);?>" alt="" /></a>
									<div class="product-bottom">
										<h3><?=$prod->title." ".$prod->brand;?></h3>
										<p>Explore Now</p>
										<?php if(@!array_key_exists($prod->id, $_SESSION['cart'])) : ?>
										<h4><a class="add_item" href="#" data-id="<?=$prod->id;?>"><i></i></a>
											<span class=" item_price"><?=App\Models\DiscountPrice::getPrice($prod->price, $prod->discount);?></span>
										</h4>
										<?php else : ?>
											В корзине
										<?php endif; ?>
									</div>
									<?php if($prod->discount > 0) : ?>
										<div class="srch">
											<span>-<?=$prod->discount;?>%</span>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<div class="clearfix"></div>
				</div>	
				<?php include_once(ROOT.'/components/ProdPaginator.php'); ?>
			</div>	
			<?php include_once(ROOT.'/components/sidebar.php'); ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--product-end-->


<?php include_once(ROOT."/components/footer.php"); ?>