$(document).ready(function()
{
	/*
	 * 	*************** ADD ***************
	 */

	// Notes
	var formNote = $('.add-note');
	formNote.on('submit', function()
	{
		$.ajax({
			type: formNote.attr('method'),
			url: formNote.attr('action'),
			data: formNote.serialize(),
			success: function(data)
			{
				$('.error').html('');
				$('.success').hide().html('');
				if(data.success == false)
				{
					var errors = '';
						errors += '<div class="alert alert-warning">';
						errors += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						errors += '<h4><i class="fa fa-exclamation-triangle fa-fw"></i> Por favor corrige los siguentes errores:</h4>';
					for(datos in data.errors)
					{
						errors += '<li>' + data.errors[datos] + '</li>'
					}
						errors += '</div>';
					$('.error').html(errors);
				}else{
					var successMessage = '';
						successMessage += '<div class="alert alert-success">';
						successMessage += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						successMessage += '<p><i class="fa fa-check fa-fw"></i>' + data.message + '</p>';
						successMessage += '</div>';
					$(formNote)[0].reset();								
					$('#myModal').modal('hide');
					$('.success').show().html(successMessage);
				}
			},
			error: function(errors)
			{
				$('.error').html(errors);
			}
		});
		return false;
	});
	ListNotes();
	
});

/*
 *	*************** LIST ***************
 */

// Notes
function ListNotes()
{
	var divNotes = $('#listNotes');
	var route = 'http://notes.dev/note';
	$('#listNotes').empty();
	$.get(route, function(respuesta)
	{
		$(respuesta).each(function(key, value)
		{
			var panel = ''; //continuar con este método.

			//divNotes.append('<div class="col-lg-3 col-md-6"><div class="panel panel-default"><div class="panel-heading"><div class="row"><div class="col-xs-12 text-center"><h3>'+ value.nombre +'</h3></div></div></div><div class="panel-body"><p>'+ value.contenido +'</p></div><div class="panel-footer"><span class="pull-left"><a href="#" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></a>'+
																																																																																										//+'</span>'+
																																																																																										//+'<span class="pull-right">'+
																																																																																											//+'<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>'+
																																																																																										//+'</span>'+
																																																																																										//+'<div class="clearfix"></div>'+
																																																																																									//+'</div>'+
																																																																																								//+'</div>'+
																																																																																							//+'</div>')		
		});
	});	
}
