<?php

return array(

	"cart/add/([0-9]+)" => "cart/add/$1",
	"cart/del/([0-9]+)" => "cart/del/$1",
	"cart" => "Cart/index",


	"contact" => "Contact/index",

	"filter" => "filter/index",

	"single/([0-9]+)" => "prod/single/$1",
	"catalog/([a-z0-9]+)" => "prod/index/$1",

	"" => "Home/index"

);