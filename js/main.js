/*-----------------------------------------------------------
Show favorite link img on mouseover
-------------------------------------------------------------*/

$('.img_inner').mouseover(function(){
	$(this).children().eq(1).children().show();
});

/*-----------------------------------------------------------
Hide favorite link img on mouseout
-------------------------------------------------------------*/

$('.img_inner').mouseout(function(){
	$(this).children().eq(1).children().hide();
});

/*-----------------------------------------------------------
Toggle filter menu options show/hide
-------------------------------------------------------------*/

$('.category').click(function(){
	$(this).next().children().slideToggle();
});

/*-----------------------------------------------------------
Filter to only show faucets
-------------------------------------------------------------*/

$('#filter_product').next().children().eq(0).click(function(){
	$('figure#bowl').hide();
	$('figure#control').hide();
	$(this).children().show();
	$('.no_of_items').text(" ");
});

/*-----------------------------------------------------------
Reset faucet filter
-------------------------------------------------------------*/

$('#filter_product').next().children().eq(0).children().click(function(){
	reset();
	return false;
});

/*-----------------------------------------------------------
Filter to only show bowls
-------------------------------------------------------------*/

$('#filter_product').next().children().eq(1).click(function(){
	$('figure#spout').hide();
	$('figure#control').hide();
	$(this).children().show();
	$('.no_of_items').text(" ");
});

/*-----------------------------------------------------------
Reset bowl filter
-------------------------------------------------------------*/

$('#filter_product').next().children().eq(1).children().click(function(){
	reset();
	return false;
});


/*-----------------------------------------------------------
Filter to only show controls
-------------------------------------------------------------*/

$('#filter_product').next().children().eq(2).click(function(){
	$('figure#spout').hide();
	$('figure#bowl').hide();
	$(this).children().show();
	$('.no_of_items').text(" ");
});

/*-----------------------------------------------------------
Reset control filter
-------------------------------------------------------------*/

$('#filter_product').next().children().eq(2).children().click(function(e){
	reset();
	return false;
});

/*-----------------------------------------------------------
Reset function
-------------------------------------------------------------*/

function reset() {
	$('figure').show();
	$('figure').show();
    $('.category').next().children().children().hide();
};