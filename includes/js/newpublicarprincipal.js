
$("#formpublicacionprincipal").submit(function(){
	event.preventDefault();
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	var publicacion=$. trim($("#publicacionprincipal").val());

	jQuery.validator.setDefaults({
		debug:true,
		succes:"valid",
		errorElement:"div",
		validClass:"valid-tooltip",
		errorClass:"alert alert-danger font-weight-bold",
		highlight:function(element,errorClass,validClass){
			
			
		},
		unhighlight:function(element,errorClass,validClass){
			
			
		}
		
	});

	var validacion=$("#formpublicacionprincipal").validate({

		rules:{
			publicacion:{required:true, minlength:1,maxlength:200},


		},

		messages:{
			publicacion:{required:" La publicacion es requisito obligatorio ",minlength:"La publicacion no puede estar vacia",maxlength:"La publicacion debe tener menos de 200 caracteres"},

		},
	
	})


	if(validacion){
		$.ajax({
			data:{ publicacion : publicacion },
			url:this.action,
			type:"POST",
			
			success: function (data) {
			if(data=="Se ha publicado con exito"){
				$.notify(data, "success");
				$.ajax({
					data:{ },
					url:"includes/php/obtenerpublicacionesdeusuario.php",
					type:"POST",
					success: function (data) {
						console.log(data);
						var datos=$.parseJSON(data);
						
						console.log($(".publicacions").length);
						console.log(datos);
						if($(".publicacions").length){
							$(".publicacions").empty();
							for(var x=0;x<datos.length;x++){
								console.log(datos[x][10]);
								$(".publicacions").append("<div class='row hija'><div class='card'><div class='card-header'><img src='files/images/logo.png' class='img-thumbnail rounded img-fluid img-circle profilepic'/>Universidad de Ezeiza<span class='unhiglight pull-right'>"+datos[x][2]+"</span></div><div class='card-body'><p class='card-text'>"+datos[x][1]+"</p></div><ul class='list-group list-group-flush comentarios'>"+datos[x][10]+"<li class='list-group-item'><form class='comentarito' action='includes/php/processcomentar.php' method='POST'><textarea cols='64' data-idpublicacion='"+datos[x][0]+"' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea><div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div></form></li></ul></div></div>");
							}
						}
					}
				});
			}else{
				$.notify(data, "error");
				console.log(data);
			}
			}
		});
	}else{
		
	}
});