

$(".access").click(function(){
	var idgrupo=$(this).attr("data-idgrupo");
	$(this).prop('disabled', true);
	$.ajax({
		data:{ id_grupo: idgrupo},
		url:"includes/php/processnewsolicitudagrupo.php",
		type:"POST",
		success: function (data) {
					if(data=="Se ha solicitado el acceso al grupo"){
						$.notify(data, "success");
						$(this).empty();
						$(this).html("Esperando confirmacion");
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