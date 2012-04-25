$(function() {
	
	$.getJSON("/dashboard/ajaxGet", function(data) {
		var text = "<ol id='ta'>";
		for (x in data) {
			
			var todo = data[x];
			text += '<li>' + todo.todos + ' <a href="#" rel="' + todo.ID + '" class="delete">delete</a></li>';
		}
		text += "</ol>"; 
	
		$("#ajaxData").html(text);
		
		$('.delete').live('click', function(e) {
			deleteItem = $(this);
			var id = $(this).attr('rel');
			
			$.post('/dashboard/ajaxDelete/' + id , function(callback) {
				
				$('#ajaData').append('<div id="delete">' + callback + '<div>');
				deleteItem.parent().remove();
			});

			
			e.preventDefault();
		});
	});
	
	$("#xhrSave").submit(function() {
		
		var data = $(this).serialize();
		
		$.post('/dashboard/ajaxAdd', data, function(callback) {
				
			$("#ta").append('<li>' + callback.text + '<a href="#" rel="' + callback.id + '" class="delete">X</a></li>');
		}, 'json');
		
		return false;
	});
	
});