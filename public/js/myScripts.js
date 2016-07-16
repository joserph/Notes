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
					ListNotes();
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
	// End Notes
	
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
			var panel = '';
				panel += '<div class="col-lg-3 col-md-6 white-panel">';
				panel += '<div class="panel panel-default ">';
				panel += '<div class="panel-heading">';
				panel += '<div class="row">';
				panel += '<div class="col-xs-12 text-center">';
				panel += '<h3>'+ value.nombre +'</h3>';
				panel += '</div>';
				panel += '</div>';
				panel += '</div>';
				panel += '<div class="panel-body">';
				panel += '<p>'+ value.contenido +'</p>';
				panel += '</div>';
				panel += '<div class="panel-footer">';
				panel += '<span class="pull-left">';
				panel += '<button value='+ value.id +' onclick="ShowNote(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></button>';
				panel += '</span>';
				panel += '<span class="pull-right">';
				panel += '<button value='+ value.id +' onclick="ShowNoteDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>';
				panel += '</span>';
				panel += '<div class="clearfix"></div>';
				panel += '</div>';
				panel += '</div>';
				panel += '</div>';

			divNotes.append(panel);	
		});
	});	
}
// End Notes

/*
 *	*************** EDIT ***************
 */
// Notes
function ShowNote(boton)
{
	var route = 'http://notes.dev/notes/'+ boton.value +'/edit';
	$.get(route, function(respuesta)
	{
		$('#nombreEdit').val(respuesta.nombre);
		$('#contenidoEdit').val(respuesta.contenido);
		$('#fechaEdit').val(respuesta.fecha);
		$('#id').val(respuesta.id);
	});
}
$('#edit-note').click(function()
{
	var id = $('#id').val();
	var nombre = $('#nombreEdit').val();
	var contenido = $('#contenidoEdit').val();
	var fecha = $('#fechaEdit').val();
	var updateUser = $('#updateUser').val();
	var route = 'http://notes.dev/notes/'+id+'';
	var token = $('#token').val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {nombre: nombre, contenido: contenido, fecha: fecha, update_user: updateUser},
		success: function(data)
		{
			if(data.success == false)
			{
				console.log("Error");
			}else{
				var successMessage = '';
				successMessage += '<div class="alert alert-warning">';
				successMessage += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				successMessage += '<p><i class="fa fa-check fa-fw"></i>' + data.message + '</p>';
				successMessage += '</div>';
				ListNotes();
				$('#myModal2').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	})
});
//End Notes

/*
 *	*************** DELETE ***************
 */
// Notes
function ShowNoteDelete(boton)
{
	var route = 'http://notes.dev/notes/'+ boton.value +'/edit';
	$.get(route, function(respuesta)
	{
		$('#nombreDelete').val(respuesta.nombre);
		$('#id').val(respuesta.id);
	});
}
$('#delete-note').click(function()
{
	var id = $('#id').val();	
	var route = 'http://notes.dev/notes/'+id+'';
	var token = $('#token').val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(data)
		{
			if(data.success == false)
			{
				console.log("Error");
			}else{
				var successMessage = '';
				successMessage += '<div class="alert alert-danger">';
				successMessage += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
				successMessage += '<p><i class="fa fa-check fa-fw"></i>' + data.message + '</p>';
				successMessage += '</div>';
				ListNotes();
				$('#myModal3').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	});
});
// End Notes
