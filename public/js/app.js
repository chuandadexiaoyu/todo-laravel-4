/**
 * Load todos from database to html
 */
function loadTodos()
{
	$('#todo-list').html('<li>Loading</li>');
	$.getJSON('/todo', function (data){
		$('#todo-list').html('');

		$.each(data, function(key, todo) {
			var checked = '';
			if (todo.checked == 1) checked = 'checked';
			$('#todo-list').append('<li data-todo-id="'+todo.id+'"><a href="#" class="delete"></a><span class="checkbox '+checked+'"></span><div contenteditable="true">'+todo.title+'</div></li>');
		});
	});
}

/**
 * Create a new todo
 */
function createTodo()
{
	$.get('/todo/create', function ( data ) {
			if (data.success)
			{
				$('#todo-list').append('<li data-todo-id="'+data.id+'"><a href="#" class="delete"></a><span class="checkbox"></span><div contenteditable="true"> </div></li>');
			}
			console.log(data);
		});
}

$(document).ready(function(){

	loadTodos();

	$('.alert .close').click(function(){$(this).parent().slideUp(200)})

	$('[data-delete-show]').click(function(e){
		$('#todo-list .delete').fadeToggle(300);
	});

	$('[data-section='+$('[data-section-toggle].current').attr('data-section-toggle')+']').fadeIn(1000);
	$('[data-section-toggle]').click(function(e){
		//if(this).is('.current') return false;
		$('[data-section-toggle]').removeClass('current')
		$(this).addClass('current');
		$('[data-section]').slideUp(200);
		$('[data-section='+$(this).attr('data-section-toggle')+']').stop(true,false).slideToggle(200);
	});


	/**
	 * Save todo Event
	 */
	$('#todo-list').on('keypress', 'div', function(e){
		var el = $(this);
		if ((e.keyCode || e.which) == 13 && !event.shiftKey)
		{
			e.preventDefault();
			$(this).blur();
			$.ajax({
					url: '/todo/'+$(this).parent().attr('data-todo-id'),
					type: 'PUT',
					data: { title: $(this).html() }
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
	 * Check / Uncheck todo Event
	 */
	$('#todo-list').on('click', '.checkbox', function(){
		var el = $(this);
		var isChecked = 0;
		if (! $(el).is('.checked')) isChecked = 1; // inverse

		$.ajax({
				url: '/todo/'+$(el).parent().attr('data-todo-id'),
				data: { checked: isChecked },
				type: 'PUT'
				}).done(function ( data ) {
					if (data.success)
					{
						if (data.checked == 1) $(el).addClass('checked');
						else $(el).removeClass('checked');
					}
					console.log(data);
				});
	});

	/**
	 * Delete todo Event
	 */
	$('#todo-list').on('click', '.delete', function(){
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

});