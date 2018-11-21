

$(".confirmacionusuario").click(function(){
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	var idusuario=$(this).attr("data-idusuario");
	$(this).prop('disabled', true);
	$.ajax({
		data:{ id_grupo: idgrupo,id_usuario:idusuario},
		url:"includes/php/processconfirmaracesoagrupo.php",
		type:"POST",
		success: function (data) {
					if(data=="Se ha solicitado el acceso al grupo"){
						$.notify(data, "success");
						$("."+idusuario).empty();
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





$(".denegarusuario").click(function(){
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	var idusuario=$(this).attr("data-iduser");
	$(this).prop('disabled', true);
	$.ajax({
		data:{ id_grupo: idgrupo,id_usuario:idusuario},
		url:"includes/php/processdenegaraccesoalgrupo.php",
		type:"POST",
		success: function (data) {
					if(data=="Se ha denegado el acceso al grupo"){
						$.notify(data, "success");
						$("."+idusuario).empty();
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