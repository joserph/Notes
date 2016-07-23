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
	var divCategory = $('#listCategories');
	var route = 'http://notes.dev/category';
	$('#listCategories').empty();
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

			divCategory.append(panel);	
		});
	});	
}