

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
						$.ajax({
							data:{},
							url:"includes/php/obtenertokenshabilitados.php",
							type:"POST",
							success: function (data) {
								var datos=jQuery.parseJSON( data );
								$("#nuevalistadetokens").empty();
								for(var y=0;y<datos.length;y++){
									$("#nuevalistadetokens").append("<tr><td>"+datos[y][1]+"</td><td>"+datos[y][0]+"</td></tr>");
								};
							}
				
			});
			
		}
		else{
			$.notify(data, "error");
			console.log(data);
		}
	}
});
});