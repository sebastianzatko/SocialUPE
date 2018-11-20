$(document).ready(function(){



    //Validaciones//
    $("#frmNuevoAdmin").submit(function(){
		event.preventDefault()
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
        var validacion = $("#frmNuevoAdmin").validate({

            rules:{
                lblNombreAdmin:{required:true, pattern:/^([A-Za-z]+)$/, minlength:4, maxlength:45},
                lblApellidoAdmin:{required:true, pattern:/^([a-zA-Z]{2,})$/,minlength:4,maxlength:45},
                lblEmailAdmin:{required:true, email:true,minlength:10,maxlength:200},
                lblNumDocAdmin:{required:true, number:true, minlength:7, maxlength:8},
                lblContraseñaAdmin:{ required:true,minlength:8,maxlength:120},

            },

            messages:{
                lblNombreAdmin:{required:" El nombre es obligatorio ",pattern:"El campo solo acepta letras",
                                minlength:"El nombre debe contener mas de 4 caracteres", maxlength:"El nombre debe contener menos de 45 caracteres"},
                lblApellidoAdmin:{required:" El Apellido es requisito obligatorio ", pattern:"Debe ser 1 palabra de mas de 2 letras",minlength:"El apellido debe tener mas de 4 caracteres",maxlength:"El apellido debe tener menos de 45 caracteres"},
                lblEmailAdmin:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com",minlength:"El email debe tener mas de 10 caracteres",maxlength:"El email debe tener menos de 200 caracteres"},
                lblNumDocAdmin:{required:" El Documento es requisito obligatorio ", number:"Solo se pueden ingresar numeros", minlength:"Debe tener mas de 7 numeros", maxlength:"Debe tener menos de 8 digitos"},
                lblContraseñaAdmin:{required:" La contraseña es requisito obligatorio ",minlength:"La contraseña debe tener mas de 8 caracteres",maxlength:"La contraseña debe tener menos de 120 caracteres"},
                
                
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

        //Validaciones//
    $("#frmNuevoProfesor").submit(function(){
        console.log("hola");
        event.preventDefault()
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
        var validacion=$("#frmNuevoProfesor").validate({
            
            rules:{
                lblNombreProf:{required:true, pattern:/^([A-Za-z]+)$/, minlength:4, maxlength:45},
                lblApellidoProf:{required:true, pattern:/^([a-zA-Z]{2,})$/,minlength:4,maxlength:45},
                lblEmailProf:{required:true, email:true,minlength:10,maxlength:200},
                lblNumDocProf:{required:true, number:true, minlength:7, maxlength:8},
                lblContraseñaProf:{ required:true,minlength:8,maxlength:120},

            },

            messages:{
                lblNombreProf:{required:" El nombre es obligatorio ",pattern:"El campo solo acepta letras",
                minlength:"El nombre debe contener mas de 4 caracteres", maxlength:"El nombre debe contener menos de 45 caracteres"},
                lblApellidoProf:{required:" El Apellido es requisito obligatorio ", pattern:"Debe ser 1 palabra de mas de 2 letras",minlength:"El apellido debe tener mas de 4 caracteres",maxlength:"El apellido debe tener menos de 45 caracteres"},
                lblEmailProf:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com",minlength:"El email debe tener mas de 10 caracteres",maxlength:"El email debe tener menos de 200 caracteres"},
                lblNumDocProf:{required:" El Documento es requisito obligatorio ", number:"Solo se pueden ingresar numeros", minlength:"Debe tener mas de 7 numeros", maxlength:"Debe tener menos de 8 digitos"},
                lblContraseñaProf:{required:" La contraseña es requisito obligatorio ",minlength:"La contraseña debe tener mas de 8 caracteres",maxlength:"La contraseña debe tener menos de 120 caracteres"},
                
                
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

  

