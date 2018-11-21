

$("#newtoken").submit(function(){
	event.preventDefault();
	var idtipouser=$("#chosen").val();
	$.ajax({
		data:{usertype: idtipouser},
		url:this.action,
		type:"POST",
		success: function (data) {
			if(data=="Se ha creado token con exito"){
				$.notify(data, "success");
			}else{
				$.notify(data, "error");
				console.log(data);
			}
		}
	});
});