
$("#formpublicacion").submit(function(){
	event.preventDefault();
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	var validacion=true;
	var publicacion=$. trim($("#publicacion").val());
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