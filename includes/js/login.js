$(document).ready(function(){
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

    //Validaciones//
    $("#frmLogin").submit(function(){
		event.preventDefault();
        
        var validacion=$("#frmLogin").validate({

            rules:{
                email:{required:true, email:true,minlength:10,maxlength:200},
                password:{required:true,minlength:8,maxlength:120},


            },

            messages:{
                email:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com",minlength:"El email debe tener mas de 10 caracteres",maxlength:"El email debe tener menos de 200 caracteres"},
                password:{required:"La contraseña es requisito obligatorio",minlength:"La contraseña debe tener mas de 8 caracteres",maxlength:"La contraseña debe tener menos de 120 caracteres"},
               
            },

            
            

        
        })
		
		if(validacion){
			var formData = new FormData($(this)[0]);
			$.ajax({
				data:formData,
				url:this.action,
				type:"POST",
				processData: false,
				contentType: false,
				
				success: function (data) {
					if(data=="Ha ingresado correctamente"){
						$.notify(data, "success");
						window.location.href = 'home.php';
					}else{
					    $.notify(data, "error");
					    console.log(data);
					}
				}
				
			});
		}
   




    })

  

})