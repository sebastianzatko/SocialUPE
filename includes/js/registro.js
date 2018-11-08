$(document).ready(function(){

    //Metodos validaciones//

   // $.validator.addMethod("Nombre", function(value, element){
     //   return this.opcional(element) || /^([a-zA-Z]{2,})$/.text(value);
   // });


    //Validaciones//
    $("#registrar").click(function(){
	
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
        $("#Registro").validate({

            rules:{
                Nombre:{required:true, pattern:/^([a-zA-Z]{2,})$/},
                Apellido:{required:true, pattern:/^([a-zA-Z]{2,})$/},
                email:{required:true, email:true},
                NumeroDocumento:{required:true, number:true, minlength:7, maxlength:8},
                contraseña:{ required:true},

            },

            messages:{
                Nombre:{required:" El nombre es requisito obligatorio ", pattern:"Debe ser 1 palabra de mas de 2 letras"},
                Apellido:{required:" El Apellido es requisito obligatorio ", pattern:"Debe ser 1 palabra de mas de 2 letras"},
                email:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com"},
                NumeroDocumento:{required:" El Documento es requisito obligatorio ", number:"Solo se pueden ingresar numeros", minlength:"Debe tener mas de 7 numeros", maxlength:"Debe tener menos de 8 digitos"},
                contraseña:{required:" La contraseña es requisito obligatorio "},
            },

            
            

        
        })
   




    })

  

})
