
$("#formpublicacion").submit(function(){
	event.preventDefault();
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	var publicacion=$. trim($("#publicacion").val());

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

	var validacion=$("#formpublicacion").validate({

		rules:{
			contenido:{required:true, minlength:1,maxlength:200},


		},

		messages:{
			comentario:{required:" La publicacion es requisito obligatorio ",minlength:"La publicacion no puede estar vacia",maxlength:"La publicacion debe tener menos de 200 caracteres"},

		},
	
	})


	if(validacion){
		$.ajax({
			data:{ publicacion : publicacion,id_grupo:idgrupo },
			url:this.action,
			type:"POST",
			
			success: function (data) {
			if(data=="Se ha publicado con exito"){
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