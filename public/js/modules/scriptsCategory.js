/*
 * 	*************** ADD ***************
 */
$(document).ready(function()
{
	var formCategory = $('.add-category');
	formCategory.on('submit', function()
	{
		$.ajax({
			type: formCategory.attr('method'),
			url: formCategory.attr('action'),
			data: formCategory.serialize(),
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
					$(formCategory)[0].reset();								
					$('#myModal').modal('hide');
					ListCategories();
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
	ListCategories();
});
/*
 *	*************** LIST ***************
 */
function ListCategories()
{
	var divCategory = $('#tr-categories');
	var route = 'http://notes.dev/category';
	$('#tr-categories').empty();
	$.get(route, function(respuesta)
	{
		$(respuesta).each(function(key, value)
		{
			var panel = '';
			 
				panel += '<tr>';
				panel += '<td class="text-center">'+ value.nombre +'</td>';
				panel += '<td class="text-center">';
				panel += '<button value='+ value.id +' onclick="ShowCategory(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning">';
				panel += '<i class="fa fa-pencil-square fa-fw"></i>';
				panel += '</button> ';
				panel += ' <button value='+ value.id +' onclick="ShowCategoryDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger">';
				panel += '<i class="fa fa-trash fa-fw"></i>';
				panel += '</button>';
				panel += '</td>';
				panel += '</tr>';

			divCategory.append(panel);	
		});
	});	
}
/*
 *	*************** EDIT ***************
 */
function ShowCategory(boton)
{
	var route = 'http://notes.dev/categories/'+ boton.value +'/edit';
	$.get(route, function(respuesta)
	{
		$('#nombreEdit').val(respuesta.nombre);
		$('#id').val(respuesta.id);
	});
}
$('#edit-category').click(function()
{
	var id = $('#id').val();
	var nombre = $('#nombreEdit').val();
	var updateUser = $('#updateUser').val();
	var route = 'http://notes.dev/categories/'+id+'';
	var token = $('#token').val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {nombre: nombre, update_user: updateUser},
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
				ListCategories();
				$('#myModal2').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	})
});
/*
 *	*************** DELETE ***************
 */
function ShowCategoryDelete(boton)
{
	var route = 'http://notes.dev/categories/'+ boton.value + '/edit';
	$.get(route, function(respuesta)
	{
		$('#nombreDelete').val(respuesta.nombre);
		$('#id').val(respuesta.id);
	});
}
$('#delete-category').click(function()
{
	var id = $('#id').val();	
	var route = 'http://notes.dev/categories/'+id+'';
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
				ListCategories();
				$('#myModal3').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	});
});

