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
                email:{required:true, email:true},
                password:{required:true},

            },

            messages:{
                email:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com"},
                password:{required:"La contraseña es requisito obligatorio"},
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