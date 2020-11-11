<div class="paginator">
	<?php 
	$pagin_url = $_SERVER['REQUEST_URI'];
	$pagin_url = explode('?', $pagin_url);
	$pagin_url = rtrim($pagin_url[0], "/");
	?>
	<?php for($i = 1; $i <= $max_page; $i++) :?>
		<a href="<?=$pagin_url?>/?page=<?=$i?>"><?=$i?></a>
	<?php endfor; ?>
</div>