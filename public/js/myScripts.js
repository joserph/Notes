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

	// Activities
	var formActivity = $('.add-activity');
	formActivity.on('submit', function()
	{
		$.ajax({
			type: formActivity.attr('method'),
			url: formActivity.attr('action'),
			data: formActivity.serialize(),
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
					$(formActivity)[0].reset();								
					$('#myModal').modal('hide');
					ListActivities();
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
	ListActivities();
	// End Activities

	// Water
	var formWater = $('.add-water');
	formWater.on('submit', function()
	{
		$.ajax({
			type: formWater.attr('method'),
			url: formWater.attr('action'),
			data: formWater.serialize(),
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
					$(formWater)[0].reset();								
					$('#myModal').modal('hide');
					ListWater();
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
	ListWater();
	// End Water
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
			var created_at = value.created_at;
			var creado = moment(created_at).locale('es').fromNow();
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
				panel += '<p class="text-justify">'+ value.contenido +'</p>';
				panel += '</div>';
				//panel += '<div class="panel-footer text-center CCD6D9">';
				panel += '<pre class="text-center"><i class="fa fa-clock-o fa-fw"></i> '+ creado +'</pre>';
				//panel += '</div>';
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

// Activities
function ListActivities()
{
	var divActivities = $('#listActivities');
	var route = 'http://notes.dev/activity';
	$('#listActivities').empty();
	$.get(route, function(respuesta)
	{
		$(respuesta).each(function(key, value)
		{
			var created_at = value.created_at;
			var creado = moment(created_at).locale('es').fromNow();
			var fecha = value.fecha;
			var dateActivity = moment(fecha).locale('es').format('L');
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
				panel += '<p class="text-justify">'+ value.contenido +'</p>';
				if(value.tipo == 'fija'){
					panel += '<span class="pull-left label label-success text-uppercase">'+ value.tipo +'</span>';
					panel += '<span class="pull-right label label-default"><i class="fa fa-calendar"></i> '+ dateActivity +'</span>';
				}else{
					panel += '<span class="pull-left label label-warning text-uppercase">'+ value.tipo +'</span>';
					panel += '<span class="pull-right label label-default"><i class="fa fa-calendar"></i> '+ dateActivity +'</span>';
				}
				panel += '</div>';
				panel += '<div class="panel-footer">';
				panel += '<span class="pull-left">';
				panel += '<button value='+ value.id +' onclick="ShowActivity(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></button>';
				panel += '</span>';
				panel += '<span class="pull-right">';
				panel += '<button value='+ value.id +' onclick="ShowActivityDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>';
				panel += '</span>';
				panel += '<div class="clearfix"></div>';
				panel += '</div>';
				panel += '</div>';
				panel += '</div>';

			divActivities.append(panel);	
		});
	});	
}
// End Activities

// Water
function ListWater()
{
	var divWater = $('#listWater');
	var route = 'http://notes.dev/water';
	$('#listWater').empty();
	$.get(route, function(respuesta)
	{
		$(respuesta).each(function(key, value)
		{
			var created_at = value.created_at;
			var creado = moment(created_at).locale('es').fromNow();
			var fecha = value.fecha;
			var dateActivity = moment(fecha).locale('es').format('L');
			var panel = '';
				panel += '<div class="col-lg-3 col-md-6 white-panel">';
				panel += '<div class="panel panel-default ">';
				panel += '<div class="panel-heading">';
				panel += '<div class="row">';
				panel += '<div class="col-xs-12 text-center">';
				panel += '<h3>'+ value.periodo +'</h3>';
				panel += '</div>';
				panel += '</div>';
				panel += '</div>';
				panel += '<div class="panel-body">'; 
				panel += '<p class="text-justify">'+ value.pagado_por +'</p>';
				if(value.estatus == 'pago'){
					panel += '<span class="pull-left label label-success text-uppercase">'+ value.estatus +'</span>';
					panel += '<span class="pull-right label label-default"><i class="fa fa-calendar"></i> '+ dateActivity +'</span>';
				}else{
					panel += '<span class="pull-left label label-warning text-uppercase">'+ value.estatus +'</span>';
					panel += '<span class="pull-right label label-default"><i class="fa fa-calendar"></i> '+ dateActivity +'</span>';
				}
				panel += '</div>';
				panel += '<div class="panel-footer">';
				panel += '<span class="pull-left">';
				panel += '<button value='+ value.id +' onclick="ShowActivity(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></button>';
				panel += '</span>';
				panel += '<span class="pull-right">';
				panel += '<button value='+ value.id +' onclick="ShowActivityDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>';
				panel += '</span>';
				panel += '<div class="clearfix"></div>';
				panel += '</div>';
				panel += '</div>';
				panel += '</div>';

			divWater.append(panel);	
		});
	});	
}
// End Water
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
		$('#id').val(respuesta.id);
	});
}
$('#edit-note').click(function()
{
	var id = $('#id').val();
	var nombre = $('#nombreEdit').val();
	var contenido = $('#contenidoEdit').val();
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
// Activities
function ShowActivity(boton)
{
	var route = 'http://notes.dev/activities/'+ boton.value +'/edit';
	$.get(route, function(respuesta)
	{
		$('#nombreEdit').val(respuesta.nombre);
		$('#contenidoEdit').val(respuesta.contenido);
		$('#tipoEdit').val(respuesta.tipo);
		$('#fechaEdit').val(respuesta.fecha);
		$('#id').val(respuesta.id);
	});
}
$('#edit-activity').click(function()
{
	var id = $('#id').val();
	var nombre = $('#nombreEdit').val();
	var contenido = $('#contenidoEdit').val();
	var tipo = $('#tipoEdit').val();
	var fecha = $('#fechaEdit').val();
	var updateUser = $('#updateUser').val();
	var route = 'http://notes.dev/activities/'+id+'';
	var token = $('#token').val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {nombre: nombre, contenido: contenido, tipo:tipo, fecha: fecha, update_user: updateUser},
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
				ListActivities();
				$('#myModal2').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	})
});
// End Activities

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
// Activities
function ShowActivityDelete(boton)
{
	var route = 'http://notes.dev/activities/'+ boton.value + '/edit';
	$.get(route, function(respuesta)
	{
		$('#nombreDelete').val(respuesta.nombre);
		$('#id').val(respuesta.id);
	});
}
$('#delete-activity').click(function()
{
	var id = $('#id').val();	
	var route = 'http://notes.dev/activities/'+id+'';
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
				ListActivities();
				$('#myModal3').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	});
});

