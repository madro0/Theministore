function lista_productos(valor){
	$.ajax({
		url:'../jquery/productos_buscar.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][7]+"</td></tr>";
		}
		$("#lista").html(html);
	});
}