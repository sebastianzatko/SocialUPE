$(document).ready(function(){


    //Validaciones//
    $("#logear").click(function(){
	
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
        $("#frmLogin").validate({

            rules:{
                email:{required:true, email:true},
                password:{required:true},

            },

            messages:{
                email:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com"},
                password:{required:"La contraseña es requisito obligatorio"},
            },

            
            

        
        })
   




    })

  

})