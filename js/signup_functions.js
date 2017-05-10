function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagenPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function removeError(){
	$("#formSignup").find('input[type="text"],input[type="password"], input[type="email"]').each(function(index, el) {
		$(this).parent().removeClass("has-error");
	});
}