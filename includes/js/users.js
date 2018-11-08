$(document).ready(function(){


    //Validaciones//
    $("#btnAgregarAdmin").click(function(){
	
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
        $("#frmNuevoAdmin").validate({

            rules:{
                lblNombreAdmin:{required:true, pattern:/^([A-Za-z]+)$/, minlength:2, maxlength:15},
                lblEmailAdmin:{required:true, email:true},
                lblContraseñaAdmin:{required:true},

            },

            messages:{
                lblNombreAdmin:{required:" El nombre es obligatorio ",pattern:"El campo solo acepta letras",
                                minlength:"El nombre debe contener mas de 2 caracteres", maxlength:"El nombre debe contener menos de 15 caracteres"},
                lblEmailAdmin:{required:"El email es obligatorio", email:"El email debe tener el siguiente formato algo@ejemplo.com ",},
                lblContraseñaAdmin:{required:"La contraseña es obligatoria"},
                
                
            },
        })
            
            

        
        })

        //Validaciones//
    $("#btnAgregarProf").click(function(){
	
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
        $("#frmNuevoProfesor").validate({

            rules:{
                lblNombreProf:{required:true, pattern:/^([A-Za-z]+)$/, minlength:2, maxlength:15},
                lblEmailProf:{required:true, email:true},
                lblContraseñaProf:{required:true},
                imagen:{required:false},

            },

            messages:{
                lblNombreProf:{required:" El nombre es obligatorio ",pattern:"El campo solo acepta letras",
                                minlength:"El nombre debe contener mas de 2 caracteres", maxlength:"El nombre debe contener menos de 15 caracteres"},
                lblEmailProf:{required:"El email es obligatorio", email:"El email debe tener el siguiente formato algo@ejemplo.com ",},
                lblContraseñaProf:{required:"La contraseña es obligatoria"},
                
                
            },
        })
            
            

        
        })
   




    })

  

