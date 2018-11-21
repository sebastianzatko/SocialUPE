$(document).ready(function(){

    //Metodos validaciones//

   // $.validator.addMethod("Nombre", function(value, element){
     //   return this.opcional(element) || /^([a-zA-Z]{2,})$/.text(value);
   // });


    //Validaciones//
    $("#Registro").submit(function(){
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
        var validacion=$("#Registro").validate({

            rules:{
                Nombre:{required:true, pattern:/^([a-zA-Z]{2,})$/,minlength:4,maxlength:45},
                Apellido:{required:true, pattern:/^([a-zA-Z]{2,})$/,minlength:4,maxlength:45},
                email:{required:true, email:true,minlength:10,maxlength:200},
                NumeroDocumento:{required:true, number:true, minlength:7, maxlength:8},
                contrasena:{ required:true,minlength:8,maxlength:120},

            },

            messages:{
                Nombre:{required:" El nombre es requisito obligatorio ", pattern:"Debe ser 1 palabra de mas de 2 letras",minlength:"El nombre debe tener mas de 4 caracteres",maxlength:"El nombre debe tener menos de 45 caracteres"},
                Apellido:{required:" El Apellido es requisito obligatorio ", pattern:"Debe ser 1 palabra de mas de 2 letras",minlength:"El apellido debe tener mas de 4 caracteres",maxlength:"El apellido debe tener menos de 45 caracteres"},
                email:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com",minlength:"El email debe tener mas de 10 caracteres",maxlength:"El email debe tener menos de 200 caracteres"},
                NumeroDocumento:{required:" El Documento es requisito obligatorio ", number:"Solo se pueden ingresar numeros", minlength:"Debe tener mas de 7 numeros", maxlength:"Debe tener menos de 8 digitos"},
                contrasena:{required:" La contraseña es requisito obligatorio ",minlength:"La contraseña debe tener mas de 8 caracteres",maxlength:"La contraseña debe tener menos de 120 caracteres"},
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
					if(data=="Se ha registrado correctamente"){
						$.notify(data, "success");
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
