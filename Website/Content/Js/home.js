$(document).ready(function(){
	$('.btnNextStep').click(function(){
		var currentInput = $('input.current, select.current');
		var currentLabel = $('label.label[for="' + currentInput.attr('id') + '"]');
		var currentBtn = $(this);

		var nextInput = currentBtn.siblings('input.hidden, select.hidden').first();
		var nextLabel = $('label.label[for="' + nextInput.attr('id') + '"]');
		var nextBtn = $(this).siblings('.btnNextStep, .btnField[type="submit"]').first();

		if(nextLabel.text().indexOf('{0}') >= 0){
			nextLabel.text(nextLabel.text().replace('{0}', $('input[id="childfirstnameField"]').val()));
		}
		if(nextLabel.text().indexOf('{1}') >= 0){
			var text = '';
			if(currentInput.val() === '0')
				text += 'Un grand garçon donc';
			else
				text += 'Une grande fille donc';

			nextLabel.text(nextLabel.text().replace('{1}', text));
		}
		currentInput.fadeOut('slow', function(){
			$(this).removeClass('current');
			nextInput.fadeIn('slow', function(){
				$(this).addClass('current').removeClass('hidden');
				$(this).css('display', 'block');
			});
		});
		currentLabel.fadeOut('slow', function(){
			nextLabel.fadeIn('slow', function(){
				$(this).css('display', 'block');
			});
		});
		currentBtn.fadeOut('slow', function(){
			$(this).removeClass('btnNextStep');

			nextBtn.css({
				'display':'block',
				'opacity':0
			});
			nextBtn.fadeIn('slow', function(){
				$(this).css({
					'display': 'block',
					'opacity': 1,
				});
			});
		});
	});
});