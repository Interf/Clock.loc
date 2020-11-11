jQuery(document).ready(function($) {
	

	$('.add_item').on('click', function(event) {
		event.preventDefault();
		
		let idProd = $(this).attr("data-id");
		let parentBlock = $(this).parent();
		let price = $(this).attr("price");
		let addProd = 1;



		$.ajax({
			url: '/cart/add/'+idProd,
			data: {},
		})
		.done(function(data) {
			$('.total').html(data);
			$('.simpleCart_empty').html("Have Goods");
			console.log(data);
			parentBlock.html("В корзине");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});



	let countCart = function() {
		if($('.cart-header').length < 1) {
			$('.ckeckout-top').html("<h2>Корзина пуста</h2>");
			$('.simpleCart_empty').html("Empty Cart");
		}
	}

	$('.close1').on('click', function(event) {
		event.preventDefault();
		

		let idProd = $(this).attr("data-id");
		let parentBlock = $(this).parent();
		let price = $(this).attr("price");


		$.ajax({
			url: '/cart/del/'+idProd,
			type: 'POST',
			dataType: 'text',
			data: {delProd: 1, price: price},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			$('.total_price').html(data['total_price']);
			$('.total').html(data['count_cart']);

			parentBlock.remove();
			countCart();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});





	$('.submit-btn').on('click', '.do_contact', function(event) {
		event.preventDefault();
		
		let name = $('.contact_form input[name=name]').val();
		let phone = $('.contact_form input[name=phone]').val();
		let email = $('.contact_form input[name=email]').val();
		let message = $('.contact_form textarea[name=message]').val();

		$.ajax({
			url: '/contact',
			type: 'POST',
			dataType: 'html',
			data: {do_mess: 1, name: name, phone: phone, email: email, message: message},
		})
		.done(function(data) {
			$('.error-message').html("");
			data = $.parseJSON(data);

			if(data == 1) {
				console.log("200ОК");
				window.location.reload();
			} else {
				$('.error-message').html(data);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});





	$('.order').on('click', function(event) {
		event.preventDefault();
		$('.order_form').toggle("fast");
	});



	$('.do_order').on('click', function(event) {
		event.preventDefault();
		
		let name = $('.order_form input[name=name]').val();
		let phone = $('.order_form input[name=phone]').val();
		let email = $('.order_form input[name=email]').val();

		$.ajax({
			url: '/cart',
			type: 'POST',
			dataType: 'html',
			data: {do_order: 1, name: name, phone: phone, email: email},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if(data == 1) {
				window.location.href = '/';
			} else {
				$('.error_order_message').html(data);
			}

			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});



});