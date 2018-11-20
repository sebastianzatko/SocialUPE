

$(".comentarito").submit(function(){
	event.preventDefault();
	var idpublicacion=$(this).find("textarea").attr("data-idpublicacion");
	var comentario=$(this).find("textarea").val();
	var validacion=true;
	console.log(comentario);
	console.log(idpublicacion);
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
	
