function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagenPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function readURLIncidencia(input) {
    //var input = $('#fileImagen');
    //alert("aca");
    if (input.files && input.files[0]) {
        $('.galeria_item_incidencia').remove();
        for(var i = 0; i < input.files.length; i++){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#galeriaFotosNuevas').append('<li class = "galeria_item galeria_item_incidencia"><img src = "' + e.target.result + '" class = "galeria_img"/></li>');
            }
            reader.readAsDataURL(input.files[i]);
        }       
    }
}

function removeError(){
	$("#formSignup").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
		$(this).parent().removeClass("has-error");
	});
}

function removeErrorChangePassword(){
    $("#formCambiarcontra").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
        $(this).parent().removeClass("has-error");
    });
}

function removeErrorEdit(){
    $("#formModificar").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
        $(this).parent().removeClass("has-error");
    });
}