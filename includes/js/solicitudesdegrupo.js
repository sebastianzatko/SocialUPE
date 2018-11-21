

$(document).ready(function(){
	$.ajax({
		data:{},
		url:"includes/php/obtenersolicitudesdegrupo.php",
		type:"POST",
		success: function (data) {
			
					console.log(data);
					var datos=jQuery.parseJSON(data);
					if(parseInt(datos.length)!=0){
						for(var x=0;x<datos.length;x++){
							console.log(datos[x]);
							$("#solicitudesagrupos").append("<div class='list-group-item "+datos[x][0]+"'><div class='row'>"+datos[x][2]+"</div><p class='unhiglight pull-right'>"+datos[x][3]+"</p><div class='row' id=''><b>"+datos[x][1]+"</b></div><button type='button' data-grupo='"+datos[x][0]+"' class='btn btn-primary confirmargrupo'><i class='far fa-thumbs-up'></i> Aceptar</button><button data-grupo='"+datos[x][0]+"' type='button' class='btn btn-danger pull-right denegargrupo'><i class='fas fa-ban'></i> Rechazar</button></div>");
						}
							$(".confirmargrupo").click(function(){
									var idgrupo=$(this).attr("data-grupo");
									$(this).prop('disabled', true);
									$.ajax({
										data:{ id_grupo: idgrupo},
										url:"includes/php/processaceptarsolicitudgrupo.php",
										type:"POST",
										success: function (data) {
													if(data=="Se ha solicitado el acceso al grupo"){
														$.notify(data, "success");
														$("."+idgrupo).empty();
														$.ajax({
															data:{},
															url:"includes/php/obtenergruposdeusuario.php",
															type:"POST",
															success: function (data) {
																var datos=jQuery.parseJSON( data );
																if($(".gruposdeusuario").length ){
																	$(".gruposdeusuario").empty();
																	for(var y=0;y<datos.length;y++){
																		if(datos[y][2]=="1"){
																			$(".gruposdeusuario").append("<li class='list-group-item'><a href='grupo.php?idgroup="+datos[y][0]+"' class='card-link'>"+datos[y][1]+"</a></li>");
																		}
																	}
																}
															}
														});
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
								
								$(".denegargrupo").click(function(){
									var idgrupo=$(this).attr("data-grupo");
									$(this).prop('disabled', true);
									$.ajax({
										data:{ id_grupo: idgrupo,},
										url:"includes/php/processdenegarsolicitudgrupo.php",
										type:"POST",
										success: function (data) {
													if(data=="Se ha denegado el acceso al grupo"){
														$.notify(data, "success");
														$("."+idgrupo).empty();
														$.ajax({
															data:{},
															url:"includes/php/obtenergruposdeusuario.php",
															type:"POST",
															success: function (data) {
																var datos=jQuery.parseJSON( data );
																if($(".gruposdeusuario").length ){
																	$(".gruposdeusuario").empty();
																	for(var y=0;y<datos.length;y++){
																		if(datos[y][2]=="1"){
																			$(".gruposdeusuario").append("<li class='list-group-item'><a href='grupo.php?idgroup="+datos[y][0]+"' class='card-link'>"+datos[y][1]+"</a></li>");
																		}
																	}
																}
															}
														});
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

					}else{
						$("#solicitudesagrupos").append("<div class='list-group-item><div class='row'><h5><b>No tienes solicitudes pendientes</b></h5></div></div>");
					}
				},
		error:function(){
			$.notify("Lo sentimos mucho, hubo un error de conexion con el servidor", "error");
		},
		complete:function (){
			
		}
	});
});

