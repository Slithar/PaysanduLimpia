function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getGivenName());
  console.log('Surname: ' + profile.getFamilyName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  console.log("/Volquetas/usuario/validate/google/" + profile.getId() + "/" + profile.getName() + "/" + profile.getImageUrl().replace("https://", ''));
  window.location.href = "/Volquetas/usuario/validate/google/" + profile.getId() + "/" + profile.getName() + "/" + profile.getImageUrl().replace("https://", '');
}

	var googleUser = {};
  //var startApp = function() {
    function startApp(){
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '534305849473-1d345eeam5j3fguteipt6tv95ufh8nm6.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('g-login'));
    });
  }

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
        	onSignIn(googleUser);
        }, function(error) {
          console.log(JSON.stringify(error, undefined, 2));
        });
  }

  function LogOutGoogle() {
	gapi.load('auth2', function(){
      auth2 = gapi.auth2.init({
        client_id: '534305849473-1d345eeam5j3fguteipt6tv95ufh8nm6.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
      });
    }); 
    /*while(gapi.auth2 == "undefined"){
    	console.log("no");
    }*/
	auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
	window.location.href = "/Volquetas/usuario/logout";

	//logout();
  }