//boton reactivar
$(".btn btn-primary").click(function(){
	$(this).prop('disabled', true);
	var idusuario=$(this).attr("data-iduser");
	$.ajax({
		data:{ id : idusuario},
		url:"includes/php/processreactivarusuario.php",
		type:"POST",
		success: function (data) {
					if(data=="Se ha modificado el usuario con exito"){
						$.notify(data, "success");
						$(this).removeClass("btn btn-primary");
						$(this).addClass("btn btn-danger");
					}else{
					    $.notify(data, "error");
					    console.log(data);
					}
				},
		error:function(){
			$.notify("Lo sentimos mucho, hubo un error de conexion con el servidor", "error");
		},
		complete:function (){
			$(this).prop('disabled', false);
		}
	});
});
//boton banear
$(".btn btn-danger").click(function(){
	$(this).prop('disabled', true);
	var idusuario=$(this).attr("data-iduser");
	$.ajax({
		data:{ id : idusuario},
		url:"includes/php/processbanearusuario.php",
		type:"POST",
		success: function (data) {
					if(data=="Se ha modificado el usuario con exito"){
						$.notify(data, "success");
						$(this).removeClass("btn btn-danger");
						$(this).addClass("btn btn-primary");
					}else{
					    $.notify(data, "error");
					    console.log(data);
					}
				},
		error:function(){
			$.notify("Lo sentimos mucho, hubo un error de conexion con el servidor", "error");
		},
		complete:function (){
			$(this).prop('disabled', false);
		}
	});
});
//paginacion
//$().click(function(){
	
//});