$(document).ready(function(){


    //Validaciones//
    $("#btnCrearGrupo").submit(function(){
	
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
        $("#frmCrearGrupo").validate({

            rules:{
                nombreGrupo:{required:true, pattern:/^([a-zA-Z]{4,})+\s+([a-zA-Z]{4,})|([a-zA-Z]{4,})+\s+([a-zA-Z]{4,})+\s+([a-zA-Z]{4,})$/, minlength:5, maxlength:30},
                carrera:{required:false}

            },

            messages:{
                nombreGrupo:{required:" El nombre del grupo es obligatorio ",pattern:"El campo solo acepta letras y numeros",
                minlength:"El nombre debe contener mas de 5 caracteres", maxlength:"El nombre debe contener menos de 30 caracteres"}
                
                
            },

            
            

        
        })
   




    })

  

})