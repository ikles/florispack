$(function() {
	$('#simpleForm2_108').append('<a class="link-calc" href="/prajs-list/kalkulyator-raschjota-stoimosti"></a>');
	var he = $('html').outerHeight(true);
	$('.overlay22').css('height',he);


$('.form2').append('<span class="close">x<span>');



	$('.order1').click(function (event) {
		event.preventDefault();
		$('.overlay22, .form2').addClass('dblock');
	});

	$('.overlay22').click(function (event) {
		$(this).removeClass('dblock');
		$('.form2').removeClass('dblock');
	});

	$('.close').click(function (event) {
		$('.overlay22').removeClass('dblock');
		$('.form2').removeClass('dblock');
	});

});//ready