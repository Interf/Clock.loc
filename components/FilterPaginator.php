<div class="paginator">
	<?php for($i = 1; $i <= $max_page; $i++) :?>
		

		<?php unset($_GET['page']); ?>
		<a href="?<?= http_build_query(array_merge(['page' => $i], $_GET)); ?>"><?=$i?></a>
		
	<?php endfor; ?>
</div>