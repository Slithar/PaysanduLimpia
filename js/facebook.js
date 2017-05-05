window.addEventListener("load",  function(){
	var app_id = '229434740874734';
	var scopes = 'email, user_friends, user_online_presence';



	window.fbAsyncInit = function(){
		FB.init({
			appId : app_id,
			status : true,
			cookie : true,
			xfbml : true,
			version : 'v2.1'
		});

		FB.getLoginStatus(function(response){
			statusChangeCallback(response, function(){});
		});
	};

	var statusChangeCallback = function(response, callback){
		console.log(response);

		if(response.status === 'connected'){
			getFacebookData();
		}
		else{
			callback(false);
		}
	}

	var getFacebookData =  function() {
  		FB.api('/me', function(response) {
	  		alert("Bienvenido! " + responnse.name + " id: " + response.id);
	  	});
  	}

	var checkLoginState = function(callback){
		FB.getLoginStatus(function(response){
			callback(response);
		});
	}

	var facebookLogin = function(){
		FB.api('/me', function(response){
			alert("Bienvenido! " + responnse.name + " id: " + response.id);
		});
	}

	/*var facebookLogout = function(){

	}*/

	/*$('body').on('click', '#linkFacebook', function(e){
		alert("aca");
		e.preventDefault();
		facebookLogin();
	})*/
	document.getElementsByClassName('facebook')[0].addEventListener("click", facebookLogin);
})