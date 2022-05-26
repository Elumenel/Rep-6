$("#user").change(function () {
	let user = $(this).val();

	/* The FormData interface provides a way to easily construct a set of key/value pairs representing form fields and their values,
	which can then be easily sent using the fetch() or XMLHttpRequest.send() method */
	let datos = new FormData();
	datos.append("validarUser", user);

	$.ajax({
		url: "ajax/formularios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta) {
			if (respuesta) {
				$("#user").val("");
				document.getElementById('alert-user').style.visibility = 'visible';
				}
			},
		});
	});
