

$("#subirnuevoarchivo").submit(function(){
	event.preventDefault();
	console.log("entro aca");
	var $_GET=[];
	window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
	var idgrupo=$_GET['idgroup'];
	var validacion=true;
	var archivo=$("#file-upload")[0].files[0];
	
	var fd = new FormData();
	fd.append('archivo', archivo);
	fd.append('idgrupo', idgrupo);
	if(validacion){
		$.ajax({
			data:fd,
			url:this.action,
			type:"POST",
			processData: false,
			contentType: false,
			success: function (data) {
			if(data=="Archivo subido con exito"){
				$.notify(data, "success");
			}else{
				$.notify(data, "error");
				console.log(data);
			}
			}
		});
	}else{
		
	}
	
})