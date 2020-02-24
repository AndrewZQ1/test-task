$(document).ready(function() {
	if($('.status').hasClass('bg-dark')) {
		$('.btn-group .bg-dark').css('color', '#fff');
	}

	if($('.status').hasClass('bg-success')) {
		$('.btn-group .bg-success').css('color', '#fff');
	}

	if($('.status').hasClass('bg-primary')) {
		$('.btn-group .bg-primary').css('color', '#fff');
	}		


	$('#phone').mask("+375(99)999-99-99");

	tinymce.init({
		selector:'.tiny',
		plugins: 'table media preview print image',
	});


	$('button[data-name="close"]').click(function(e) {
		e.preventDefault();

		var dataId = $(this).data('id');
		var action = '/close/' + dataId;

		$('.close-offer').attr('action', action);
	});


	var garanty = $('.garanty>dd').text();
	var remont = $('.remont>dd').text();
	if(garanty == '' && remont == '')
	{
		$('.filed').addClass('hidden-field');
	}

	var text = $('.name-wrap').ready(function() {
		$(this).html();
	});
	console.log(text);
});