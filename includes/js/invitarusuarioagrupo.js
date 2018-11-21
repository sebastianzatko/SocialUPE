

$("#emailuser").keyup(function(){
	var data=$(this).val();
	event.preventDefault();
	var results=$("#results");
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	$.ajax({
		data:{ email : data,id_grupo:idgrupo },
		url:"includes/php/suggestionusuario.php",
		type:"POST",
		success: function (data) {
			results.empty();
			datos=jQuery.parseJSON(data);
			console.log(datos);
			if(parseInt(datos.length)==0){
				
			}else{
				for(var x=0;x<datos.length;x++){
					results.empty();
					console.log(datos[x][4]);
					results.append("<li data-email='"+datos[x][4]+"' class='sugerenciadeusuario'><p class='resultadobusquedas'>"+datos[x][4]+"</p></li>");
					
				}
				$(".sugerenciadeusuario").click(function(){
					var mail=$(this).attr("data-email");
					$("#emailuser").val(mail);
				})
			}
		
			
		}
		
	});
	
});

$("#invitarnuevousuario").submit(function(){
	event.preventDefault();
	var email=$("#emailuser").val();
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	
	
	$.ajax({
		data:{ email : email,id_grupo:idgrupo },
		url:this.action,
		type:"POST",
		
		success: function (data) {
		if(data=="Se ha invitado al usuario"){
			$.notify(data, "success");
		}else{
			$.notify(data, "error");
			console.log(data);
		}
		}
	});
	
});


	
