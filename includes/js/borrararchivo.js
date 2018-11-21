
$(".borrararchivo").click(function(){
	var idarchivo=$(this).attr("data-idarchivo");
	var ruta=$(this).attr("data-ruta");
	$(this).prop('disabled', true);
	$.ajax({
		data:{ idarchivo: idarchivo,ruta:ruta},
		url:"includes/php/processborrararchivo.php",
		type:"POST",
		success: function (data) {
					if(data=="Archivo eliminado con exito"){
						$.notify(data, "success");
						$(".file-"+idarchivo).empty();
					}else{
					    $.notify(data, "error");
					    console.log(data);
						$(this).prop('disabled', false);
					}
				},
		error:function(){
			$.notify("Lo sentimos mucho, hubo un error de conexion con el servidor", "error");
			$(this).prop('disabled', false);
		},
		complete:function (){
			
		}
	});
});