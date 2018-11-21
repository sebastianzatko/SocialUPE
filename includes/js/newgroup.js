$(document).ready(function(){


    //Validaciones//
    $("#frmCrearGrupo").submit(function(){
		event.preventDefault();
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
        var validacion=$("#frmCrearGrupo").validate({

            rules:{
                nombreGrupo:{required:true, pattern:/^([a-zA-Z]{4,})+\s+([a-zA-Z]{4,})|([a-zA-Z]{4,})+\s+([a-zA-Z]{4,})+\s+([a-zA-Z]{4,})$/, minlength:5, maxlength:30},
                carrera:{required:true}

            },

            messages:{
                nombreGrupo:{required:" El nombre del grupo es obligatorio ",pattern:"El campo solo acepta letras y numeros",
                minlength:"El nombre debe contener mas de 5 caracteres", maxlength:"El nombre debe contener menos de 30 caracteres"}
                
                
            },

            
            

        
        })
		if(validacion){
			//enviarajax
			var formData = new FormData($(this)[0]);
			$.ajax({
				data:formData,
				url:this.action,
				type:"POST",
				processData: false,
				contentType: false,
				success: function (data) {
					if(data=="Se ha creado un grupo correctamente"){
						$.notify(data, "success");
						$.ajax({
							data:{},
							url:"includes/php/obtenergruposdeusuario.php",
							type:"POST",
							success: function (data) {
								var datos=jQuery.parseJSON( data );
								$(".gruposdeusuario").empty();
								for(var y=0;y<datos.length;y++){
									if(datos[y][2]=="1"){
										$(".gruposdeusuario").append("<li class='list-group-item'><a href='grupo.php?idgroup="+datos[y][0]+"' class='card-link'>"+datos[y][1]+"</a></li>");
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
			//lo mandas al carajo
		}




    })

  

})