<?php 
require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/Utils.php");
require_once("clases/session.php");
require_once('vendor/autoload.php');

class ControladorUsuario extends ControladorIndex{

	function landing($param=array()){
		$tpl = Template::getInstance();
		//$this->definirSesion();
		$tpl->asignar('location', 'Inicio');
		//$tpl->asignar('logueado', 'no');
		$tpl->asignar('landing', 'si');
		$tpl->asignar('classMain', 'mainLanding');
		$tpl->asignar('facebookURL', $this->loginFacebook());

		$tpl->mostrar('landing');
	}

	function signup($params=array()){
		$tpl = Template::getInstance();
		//$this->definirSesion();
		$tpl->asignar('location','Sign Up');
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('landing', 'no');
		$tpl->mostrar("signup");
	}

	function login($params = array()){
		$tpl = Template::getInstance();
		//$this->definirSesion();
		$ci = "";
		/*$password = "";*/
		if(isset($params[0]) && !empty($params[0])) {
			$tpl->asignar("alert", "block");
			if($params[0] == "success"){
				$tpl->asignar("success", "si");
				$tpl->asignar("error", "no");
			}
			else{
				$tpl->asignar("success", "no");
				$tpl->asignar("error", $params[0]);
				$ci = $params[1];
				/*$ci = isset($_POST['ci']) ? $_POST['ci'] : '';
				$password = isset($_POST['password']) ? $_POST['password'] : '';*/
			}
		} 
		else {
			$tpl->asignar("alert", "none");
			$tpl->asignar("success", "");
			$tpl->asignar("error", "no");
		}
		$tpl->asignar('ci', $ci);
		/*$tpl->asignar('ci', $ci);	
		$tpl->asignar('password', $password);	*/
		$tpl->asignar('location', 'Login');		
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('landing', 'no');
		$tpl->mostrar("login");
	}	

	function validate($params=array()){
		//Session::init();
		unset($_COOKIE['ciUsuario']);
		setcookie('ciUsuario', null, -1, '/');

		if(isset($params[0]) && !empty($params[0])){
			Session::init();
			Session::set('tipo', $params[0]);
			Session::logout('id');
			Session::set('id', $params[1]);
			Session::set('nombre', $params[2]);
			if($params[0] == "facebook")
				Session::set('fotoPerfil', 'http://graph.facebook.com/'.$params[1].'/picture?type=large');			
			else{				
				$file = "https://";
				for($i = 3; $i < count($params); $i++){

					$file .= $params[$i];
					if($i < (count($params) - 1))
						$file .= "/";
				}
				Session::set('fotoPerfil', $file);
			}
			
			$this->redirect('usuario', 'landing');
		}
		/*if(isset($_POST['api'])){
			Session::init();
			Session::set('tipo', $_POST['api']);
			Session::set('id', $_POST['id']);
			Session::set('nombre', $_POST['nombre']);
			Session::set('fotoPerfil', 'http://graph.facebook.com/'.$_POST['id'].'/picture?type=large');
			$respuesta = new Respuesta(array("code" => "ok",
												"message" => "",
												"content" => ""));
				
			echo $respuesta->getResult();
		}*/
		else{
			$usuario = new Usuario(array(
					"ci" => $_POST["cedulaUsuario"],
					"contrasenia" => $_POST["passwordUsuario"],
				));

			$res = $usuario->login();

			if($res == 1){
				if(isset($_POST['recordarme'])){
					setcookie('ciUsuario', $_POST["cedulaUsuario"], time() + 365 * 24 * 60 * 60, '/');
				}
				Session::init();
				Session::set('tipo', 'paysandulimpia');
				Session::set('ci', $_POST["cedulaUsuario"]);
				$user = $usuario->seleccionarUsuario();
				Session::set('nombre', $user->getNombre()." ".$user->getApellido());
				Session::set('fotoPerfil', $user->getFotoperfil());
				$funcionario = $user->getFuncionario() ? "true" : "false";
				Session::set('funcionario', $funcionario);
				$respuesta = new Respuesta(array("code" => "ok",
													"message" => "",
													"content" => ""));
					
				echo $respuesta->getResult();

							
			}
			else{
				$respuesta = new Respuesta(array("code" => "error",
													"message" => "",
													"content" => ""));
					
				echo $respuesta->getResult();
			}
		}
		
	}

	function registrar($params=array()){

		$wantsEmail = (isset($_POST["enviarEmail"])) ? 1 : 0;

		$target_dir = "img/Perfiles";

	
		
		$hasimage = empty($_FILES['fotoPerfil']["name"]) ? false : true;

		//echo $hasimage." y el numero eeeeees: ".count($_FILES['fotoPerfil']).", el primero eeeeees: ".$_FILES['fotoPerfil'][0];

		$target_file = $target_dir . basename($_FILES["fotoPerfil"]["name"]);

		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);	

		$isimage = true;	

		$destination = "img/sinFoto.png";

		if($hasimage && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){	
			$message = array("codigo" => "error",
							 "message" => "Formato de imagen incorrecto",
							 "information" => array(), 
						);
			echo json_encode($message);

			$isimage = false;
			exit();
		}	
	
		if($isimage){

			if($hasimage){
				$destination = "img/Perfiles/" . $_POST["cedulaUsuario"] . "." .$imageFileType;
				$imagen = $_FILES["fotoPerfil"];
				copy($imagen["tmp_name"], $destination);
			}

			$funcionario = Session::exists('ci') && Session::get('ci') > 2 ? true : false;

			$data = array(
							"ci" => $_POST["cedulaUsuario"],
							"nombre" => $_POST["nombreUsuario"],
							"apellido" => $_POST["apellidoUsuario"],
							"contrasenia" => $_POST["contraseniaUsuario"],
							"ci" => $_POST["cedulaUsuario"],
							"email" => $_POST["emailUsuario"],
							"ci" => $_POST["cedulaUsuario"],
							"fotoperfil" => $destination,
							"funcionario" => $funcionario,
							"enviarcorreo" => $wantsEmail,
						);

			$usuario = new Usuario($data);
			if($usuario ->signUp()){
				$this::redirect("usuario","login/success");	
			}		
		}
		else{			
			$message = array("codigo" => "error",
							 "message" => "<strong>ERROR: </strong>El perfil seleccionado no es una imagen",
							 "content" => array(), 
						);
			echo json_encode($message);
			exit();
		}
	}

	function verify($params = array()){
		$data = array(
					"ci" => $_POST["cedulaUsuario"],
					"nombre" => $_POST["nombreUsuario"],
					"apellido" => $_POST["apellidoUsuario"],
					"contrasenia" => $_POST["contraseniaUsuario"],
					"ci" => $_POST["cedulaUsuario"],
					"email" => $_POST["emailUsuario"],
					"ci" => $_POST["cedulaUsuario"],
					"funcionario" => false,
				);

		$usuario = new Usuario($data);
		if($params[0] == "update" || $usuario->existeCedula() == 0){
			if($usuario->existeMail() == 0){
				/*if($usuario ->signUp()){
					$this::redirect("usuario","login/success");	
				}
				else{
				}	*/
				$message = new Respuesta(array("code" => "ok",
									"message" => "",
									"content" => "",));
				echo $message->getResult();	
			}
			else{
				/*Existe mail*/
				$message = new Respuesta(array("code" => "error",
									"message" => "<strong>ERROR: </strong>El correo electrónico ya se encuentra registrado",
									"content" => "mail",));
				echo $message->getResult();
			}
		}
		else{
			/*Existe CI*/
			$message = new Respuesta(array("code" => "error",
								"message" => "<strong>ERROR: </strong>La cédula de identidad ya se encuentra registrada",
								"content" => "ci",));
			echo $message->getResult();
		}			
			
		
	}

	function contacto($params = array()){
		/*$params = array("correo" => $_POST['correo'],
						"asunto" => $_POST['asunto'],
						"mensaje" => $_POST['mensaje'],);*/
		//echo json_encode($params);
		if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
			$utils = new Utils();


			$res = $utils->enviarCorreoContacto($_POST['correo'], $_POST['asunto'], $_POST['mensaje']);
			if($res){
				$respuesta = new Respuesta(array("code" => "ok",
												"message" => array("alert" => "alert-success",
																	"content" => "<strong><center>¡ÉXITO!</center></strong><center>El correo ha sido enviado de manera correcta. En breve los administradores del sistema se pondrán en contacto con usted.</center>",),
												"content" => "",));
				/*echo "ok";*/
			}

			else{
				$respuesta = new Respuesta(array("code" => "error",
												"message" => array("alert" => "alert-danger",													
																	"content" => "<strong><center>ERROR</center></strong><center>Se ha producido un error al intentar enviar el mensaje. Por favor verifique la conexión a internet y vuelva a intentarlo.</center>",),
												"content" => "",));
				/*echo "error";*/
			}
			echo $respuesta->getResult();
		}
		else{
			$respuesta = new Respuesta(array("code" => "error",
												"message" => array("alert" => "alert-danger",													
																	"content" => "<strong><center>ERROR</center></strong><center>No se ha checkeado captcha. Por favor, selecciónelo para continuar.</center>",),
												"content" => "",));
				/*echo "error";*/
			echo $respuesta->getResult();
		}
		
	}

	public function verPerfil($params = array()){
		$usuario= new Usuario(array("ci"=>48704743));
		$user=$usuario->seleccionarUsuario();
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Ver perfil');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('nombre',$user->getNombre());
		$tpl->asignar('apellido',$user->getApellido());
		$tpl->asignar('email',$user->getEmail());
		$tpl->asignar('ci',$user->getCi());
		$tpl->asignar('fotoPerfil',$user->getFotoperfil());
		$tpl->asignar('funcionario',$user->getFuncionario());
		$tpl->asignar('enviarCorreo',$user->getEnviarcorreo());
		//echo count($user);
		$tpl->mostrar('verPerfil');
	}

	public function loginFacebook(){
		$fb = new Facebook\Facebook([
		  'app_id' => '229434740874734', 
		  'app_secret' => '1a46ccfac93f7806b261c7320c1f98da',
		  'default_graph_version' => 'v2.2'
		]);

		$helper = $fb->getRedirectLoginHelper();

		try{
			$access_token = $helper->getAccessToken();
		}
		catch(Facebook\Exceptions\FacebookResponseException $ex){
			$ex->getMessage();
			exit;
		}
		catch(Facebook\Exceptions\FacebookSDKException $ex){
			$ex->getMessage();
			exit;
		}

		if(!isset($access_token)){

			//echo "otra vez";
			$permission = ['email'];
			$facebookURL = $helper->getLoginUrl("http://localhost/Volquetas/index.php", $permission);
			return $facebookURL;
		}
		else{
			$fb->setDefaultAccessToken($accessToken);
			try {
			  $response = $fb->get('/me?fields=email,name');
			  $userNode = $response->getGraphUser();
			}catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			// Print the user Details
			echo "Welcome !<br><br>";
			echo 'Name: ' . $userNode->getName().'<br>';
			echo 'User ID: ' . $userNode->getId().'<br>';
			echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
			$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
			echo "Picture<br>";
			echo "<img src='$image' /><br><br>";
		}
		/*try{
			$session = $helper->getSessionFromRedirect();

			if($session){
				Session::init();
				Session::set('facebook', $session->getToken());
			}
		}	
		catch(FacebookRequestException $ex){

		}	
		catch(\Exception $ex){

		}*/
	}

	public function definirSesion(){
		$tpl = Template::getInstance();
		Session::init();
		if(Session::get('ci')){
			$tpl->asignar('ci', Session::get('ci'));
			$tpl->asignar('nombre', Session::get('nombre'));
			$tpl->asignar('fotoPerfil', Session::get('fotoPerfil'));		
			$tpl->asignar('logueado', 'si');		
			$tpl->asignar('classLogueado', 'logueado');
		}
		else{		
			$tpl->asignar('logueado', 'no');
			$tpl->asignar('classLogueado', 'noLogueado');
		}
	/*unset($_COOKIE['ciUsuario']);
	setcookie('ciUsuario', null, -1, '/');*/
	/*if(isset($_COOKIE['ciUsuario'])){
		$tpl->asignar('logueado', 'si');		
		$tpl->asignar('classLogueado', 'logueado');
	}
	else{
		$tpl->asignar('logueado', 'no');
		$tpl->asignar('classLogueado', 'noLogueado');
	}*/
	}

	public function logout(){
		Session::init();
		unset($_COOKIE['ciUsuario']);
		setcookie('ciUsuario', null, -1, '/');
		/*Session::logout('tipo');
		if(Session::exists('ci')){			
			Session::logout(Session::get('ci'));
			
			Session::logout(Session::get('nombre'));
			Session::logout(Session::get('fotoPerfil'));
			Session::destroy();
		}
		else{
			Session::logout(Session::get('id'));
		}*/
		Session::destroy();		
		//Session::init();

		$this->redirect('usuario', 'landing');
	}
}

?>