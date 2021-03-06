/*
 * 	*************** ADD ***************
 */
$(document).ready(function()
{
	var formSso = $('.add-sso');
	formSso.on('submit', function()
	{
		$.ajax({
			type: formSso.attr('method'),
			url: formSso.attr('action'),
			data: formSso.serialize(),
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
					$(formSso)[0].reset();								
					$('#myModal').modal('hide');
					ListSso();
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
	ListSso();
});
/*
 *	*************** LIST ***************
 */
function ListSso()
{
	var divSso = $('#listSso');
	var spanTotal = $('#total');
	var route = 'http://notes.dev/security';
	$('#listSso').empty();
	$('#total').empty();
	$.get(route, function(respuesta)
	{
		var total = 0;
		$(respuesta).each(function(key, value)
		{
			var fecha_pago = value.fecha_pago;
			var pago = moment(fecha_pago).locale('es').endOf(fecha_pago).fromNow();
			var periodo = value.periodo;
			var mes = moment(periodo).locale('es').format('MMMM');
			// PARA DAR FORMATO A LA MONEDA
			var formatNumber = {
			 	separador: ".", // separador para los miles
			 	sepDecimal: ',', // separador para los decimales
			 	formatear:function (num)
			 	{
				 	num +='';
				 	var splitStr = num.split('.');
				 	var splitLeft = splitStr[0];
				 	var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
				 	var regx = /(\d+)(\d{3})/;
			 		while (regx.test(splitLeft))
			 		{
			 			splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
			 		}
			 		return this.simbol + splitLeft +splitRight;
			 	},
		 		new:function(num, simbol)
		 		{
		 			this.simbol = simbol ||'';
		 			return this.formatear(num);
		 		}
			}
			
			if(value.estatus == 'pago')
			{
				var panel = '';
				panel += '<li class="list-group-item panel-success list-group-item-success">';
				panel += '<span class="badge">';
				panel += 'Se pago '+ pago +' ';					
				panel += '</span>';
				panel += '<h4 class="text-uppercase">'+ mes +'</h4>';
				panel += '<hr />';
				panel += '<p>Pagado por <em><b>'+ value.pagado_por +'</b></em></p>';
				panel += '<p>Monto: <kbd>'+ formatNumber.new(value.monto) +'</kbd></p>';
				panel += '<button value='+ value.id +' onclick="ShowSso(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></button> ';
				panel += ' <button value='+ value.id +' onclick="ShowSsoDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>';		
				panel += '</li>';
				divSso.append(panel);
			}else if(value.estatus == 'vencido')
			{
				var panel = '';
				panel += '<li class="list-group-item panel-primary list-group-item-danger">';
				panel += '<span class="badge"> Se vencio '+ pago +'</span>';
				panel += '<h4 class="text-uppercase">'+ mes +'</h4>';
				panel += '<hr />';
				panel += '<button value='+ value.id +' onclick="ShowSso(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></button> ';
				panel += ' <button value='+ value.id +' onclick="ShowSsoDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>';		
				panel += '</li>';
				divSso.append(panel);
			}else{
				var panel = '';
				panel += '<li class="list-group-item panel-danger list-group-item-warning">';
				panel += '<span class="badge danger"> Vence '+ pago +'</span>';
				panel += '<h4 class="text-uppercase">'+ mes +'</h4>';
				panel += '<hr />';
				panel += '<button value='+ value.id +' onclick="ShowSso(this);" data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-pencil-square fa-fw"></i></button> ';
				panel += ' <button value='+ value.id +' onclick="ShowSsoDelete(this);" data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>';		
				panel += '</li>';
				divSso.append(panel);
			}	
			total = parseFloat(total) + parseFloat(value.monto);
			sumaTotal = formatNumber.new(total);			
		});
		spanTotal.append(sumaTotal);
	});	
}
/*
 *	*************** EDIT ***************
 */
function ShowSso(boton)
{
	var route = 'http://notes.dev/securities/'+ boton.value +'/edit';
	$.get(route, function(respuesta)
	{
		$('#periodoEdit').val(respuesta.periodo);
		$('#estatusEdit').val(respuesta.estatus);
		$('#pagadoPorEdit').val(respuesta.pagado_por);
		$('#montoEdit').val(respuesta.monto);
		$('#fechaPagoEdit').val(respuesta.fecha_pago);
		$('#id').val(respuesta.id);
	});
}
$('#edit-sso').click(function()
{
	var id = $('#id').val();
	var periodo = $('#periodoEdit').val();
	var estatus = $('#estatusEdit').val();
	var pagado_por = $('#pagadoPorEdit').val();
	var monto =	$('#montoEdit').val();
	var fecha_pago = $('#fechaPagoEdit').val();
	var updateUser = $('#updateUser').val();
	var route = 'http://notes.dev/securities/'+id+'';
	var token = $('#token').val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {periodo: periodo, estatus: estatus, pagado_por:pagado_por, monto: monto, fecha_pago: fecha_pago, update_user: updateUser},
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
				ListSso();
				$('#myModal2').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	})
});
/*
 *	*************** DELETE ***************
 */
function ShowSsoDelete(boton)
{
	var route = 'http://notes.dev/securities/'+ boton.value + '/edit';
	$.get(route, function(respuesta)
	{
		var periodo = respuesta.periodo;
		var mes = moment(periodo).locale('es').format('MMMM');
		$('#periodoDelete').val(mes);
		$('#id').val(respuesta.id);
	});
}
$('#delete-sso').click(function()
{
	var id = $('#id').val();	
	var route = 'http://notes.dev/securities/'+id+'';
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
				ListSso();
				$('#myModal3').modal('hide');
				$('.success').show().html(successMessage);
			}
		}
	});
});