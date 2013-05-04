

$(document).ready(function(){

	$('[data-delete-show]').click(function(e){
		$('#todo-list .delete').fadeToggle(300);
	});

	$('[data-section=todo]').fadeIn(1000);
	$('[data-section-toggle]').click(function(e){
		$('[data-section='+$(this).attr('data-section-toggle')+']').slideToggle(200);
	});


	/**
	 * Save todo Event
	 */
	$('#todo-list div').keypress(function(e){
		var el = $(this);
		if ((e.keyCode || e.which) == 13 && !event.shiftKey)
		{
			e.preventDefault();
			$(this).blur();
			$.ajax({
					url: '/todo/'+$(this).parent().attr('data-todo-id'),
					type: 'PUT'
					}).done(function ( data ) {
						if (data.success)
						{
							$(el).parent().css({color:'#8EDF8E'});
							setTimeout(function(){
								$(el).parent().css({color:'inherit'});
							}, 600)
						}
						console.log(data);
					});
		}
	});

	/**
	 * Delete todo Event
	 */
	$('#todo-list .delete').click(function(){
		$.ajax({
				url: '/todo/'+$(this).parent().attr('data-todo-id'),
				type: 'DELETE'
				}).done(function ( data ) {
					if (data.success)
					{
						$('#todo-list li[data-todo-id='+data.id+']').fadeOut(300);
					}
					console.log(data);
				});
	});

	/**
	 * Check / Uncheck todo Event
	 */
	$('#todo-list .checkbox').click(function(){
		var el = $(this);
		var isChecked = 0;
		if (! $(this).is('.checked')) isChecked = 1; // inverse

		$.ajax({
				url: '/todo/'+$(el).parent().attr('data-todo-id'),
				data: { checked: isChecked },
				type: 'DELETE'
				}).done(function ( data ) {
					if (data.success)
					{
						if (data.checked == 1) $(el).addClass('checked');
						else $(el).removeClass('checked');
					}
					console.log(data);
				});
	});

});