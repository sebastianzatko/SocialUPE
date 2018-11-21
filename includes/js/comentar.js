

$(".comentarito").submit(function(){
	event.preventDefault();
	var idpublicacion=$(this).find("textarea").attr("data-idpublicacion");
	var comentario=$(this).find("textarea").val();
	
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

	var validacion=$(".comentarito").validate({

		rules:{
			contenido:{required:true, minlength:1,maxlength:200},


		},

		messages:{
			comentario:{required:" El comentario es requisito obligatorio ",minlength:"El comentario no puede estar vacio",maxlength:"El comentario debe tener menos de 200 caracteres"},

		},
	
	})


	if(validacion){
		$.ajax({
			data:{ comentario :comentario, id_publicacion:idpublicacion },
			url:this.action,
			type:"POST",
			
			success: function (data) {
			if(data=="Comentario realizado con exito"){
				$.notify(data, "success");
			}else{
				$.notify(data, "error");
				console.log(data);
			}
			}
		});
	}else{
		
	}
});
	
