<?php
$cat_arr = App\Models\Sidebar::getCategory();
$brand_arr = App\Models\Sidebar::getBrand();
?>

<div class="col-md-3 prdt-right">
	<div class="w_sidebar">
		<form action="/filter/" method="GET">
			<section  class="sky-form" name="category[]">
				<h4>Catogories</h4>
				<div class="row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="radio" name="category" value="all" <?php echo @$_GET['category'] == 'all' ? "checked":"" ?>><i></i>All Accessories</label>
						<?php foreach($cat_arr as $cat) :?>	
							<label class="checkbox">
								<input type="radio" name="category" value="<?=$cat['category']?>" 
								<?php echo @$_GET['category'] == $cat['category'] ? 'checked' : ""?>><i></i><?=$cat["category"]?>
							</label>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<section  class="sky-form">
				<h4>Brand</h4>
				<div class="row1 row2 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="radio" name="brand" value="any" <?php echo @$_GET['brand'] == "any" ? "checked":"" ?> ><i></i>Any brand</label>
						<?php foreach($brand_arr as $brand) : ?>
							<label class="checkbox">
								<input type="radio" name="brand" value="<?=$brand['brand']?>" 
								<?php echo @$_GET['brand'] == $brand["brand"] ? "checked":"" ?> ><i></i><?=$brand["brand"];?>
							</label>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<button type="submit" name="do_find" value="do_find">Find</button>
		</form>
	</div>
</div>