window.fbAsyncInit = function() {
	FB.init({
	  appId      : '229434740874734', // App ID
	  status     : true, // check login status
	  cookie     : true, // enable cookies to allow the server to access the session
	  xfbml      : true,
	  version	  : 'v2.9'	  // parse XFBML
	});
	 	      /* Revisar es status del usuario al entrar a la pagina */
	FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') { // Esta conectado
	    var uid = response.authResponse.userID;
	    var accessToken = response.authResponse.accessToken;
	        login();
	  } else if (response.status === 'not_authorized') { // La aplicacion no esta atoriada
	        logout();
	  } else { // No esta conectado
	       
	  }
	 });
	  /* Funcion que se ejecuta cuando ya se autoriza la conexion */
	function login(){
	    FB.api('/me', function(response) {
	         //alert(response.name + " estás conectado!");
	    });
	}

	//$('#opcionCerrarSesion').on('click', function(){
	
	//})
	
	/* Funcion para extraer algunos datos del susuario, como nombre y foto */
	function fqlQuery(){
	    FB.api('/me', function(response) {
	        var query = FB.Data.query('select name, hometown_location, sex, pic_square from user where uid={0}', response.id);
	        query.wait(function(rows) {
	            document.getElementById('name').innerHTML =
	            'Your name: ' + rows[0].name + "<br />" +
	            '<img src="' + rows[0].pic_square + '" alt="" />' + "<br />";
	        });
	    });
	}
};
	        /* Funcion para abrir la ventanita y conectarse a facebook */
function facebookLogin() {
    FB.login(function(r){
    	//console.log(r)
    	if(r.status == "connected"){
    		FB.api('/me', function(response) {
    			/*$.ajax({
					url: '/Volquetas/usuario/validate/',
					type: 'POST',
					dataType : 'json',
					data: {'api' : 'facebook',
	    					'id' : response.id,
	    					'name' : response.name}
				})
				.done(function(response) {
					//alert(response["code"]);
					if(response["code"] == "ok"){
						window.location.href = "/Volquetas/usuario/landing"
					}

				});*/
	    		/*$.ajax({
	    			url : 'Volquetas/usuario/validate',
	    			type : 'POST',
	    			data : {'api' : 'facebook',
	    					'id' : response.id,
	    					'name' : response.name}
	    		});*/
	    		window.location.href = '/Volquetas/usuario/validate/facebook/' + response.id + '/' + response.name;
	    	})
    	}
    	
    },
{
    scope: 'email' // estos son los permisos que necesita la aplicacion
  });
}

function logout(){

	FB.getLoginStatus(function(response) {
		console.log(response);
        //if (response.status === 'connected') {
            FB.logout(function(response){console.log("Deslogueado");});
       // }
    });
	//alert("aca");
	window.location.href = "/Volquetas/usuario/logout";
	
		
}
 
$('#btnFacebook').on('click', function(){
	facebookLogin();
});

// Load the SDK Asynchronously
(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   ref.parentNode.insertBefore(js, ref);
}(document));