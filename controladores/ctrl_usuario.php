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
		$tpl->asignar('location', 'Inicio');
		//$tpl->asignar('logueado', 'no');
		$tpl->asignar('landing', 'si');
		$tpl->asignar('facebookURL', $this->loginFacebook());
		$tpl->mostrar('landing');
	}

	function signup($params=array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location','Sign Up');
		$tpl->mostrar("signup");
	}

	function login($params = array()){
		$tpl = Template::getInstance();
		if(isset($params[0]) && $params[0] == "error" ){
			$tpl->asignar("alert", "visible");
		} 
		else {
			$tpl->asignar("alert", "hidden");
		}
		$tpl->asignar('location', 'Log In');
		$tpl->mostrar("login");
	}	

	function validate($params=array()){

		$params = array(
					"ci"=>$_POST["cedulaUsuario"],
					"contrasenia" =>$_POST["passwordUsuario"],
				);

		$usuario = new Usuario($params);

		$res = $usuario->login();

		if($res == 1){
			echo "true";
		}
		else{
			echo "false";
		}
	}

	function registrar($params=array()){

		$wantsEmail = (isset($_POST["enviarEmail"])) ? 1 : 0;

		$target_dir = "img/Perfiles";

		//$hasimage = (isset($_FILES["fotoPerfil"]["name"])) ? true : false;

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

			$params = array(
							"ci" => $_POST["cedulaUsuario"],
							"nombre" => $_POST["nombreUsuario"],
							"apellido" => $_POST["apellidoUsuario"],
							"contrasenia" => $_POST["contraseniaUsuario"],
							"ci" => $_POST["cedulaUsuario"],
							"email" => $_POST["emailUsuario"],
							"ci" => $_POST["cedulaUsuario"],
							"fotoperfil" => $destination,
							"funcionario" => false,
							"enviarcorreo" => $wantsEmail,
						);

			$usuario = new Usuario($params);

			if($usuario->existeCedula() == 0){
				if($usuario->existeMail() == 0){
					if($usuario ->signUp()){
						$this::redirect("usuario","login");	
					}
					else{
						/*Hubo un problema al registrar.*/
					}		
				}
				else{
					/*Existe mail*/
					echo "mail";
				}
			}
			else{
				/*Existe CI*/
				echo "ci";
			}
		}
		else{
			$message = array("codigo" => "error",
							 "message" => "El archivo no es una imagen",
							 "information" => array(), 
						);
			echo json_encode($message);
			exit();
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
	public function agregar(){
		/*$ubicacionCorrecta = 1;
		if(!$_POST['ubicacionCorrecta'])
			$ubicacionCorrecta = 0;
		$usuario = new Usuario(array("ci" => $_POST['ci'],
									 "nombre" => $_POST['nombre'],
									 "apellido" => $_POST['apellido'],
									 "email" => $_POST['email'],
									 "funcionario"  => $_POST['funcionario'],
									 "enviarCorreo" => $_POST['enviarcorreo'],));
		
		$usuario->insert();*/
		/************************************************************************************/
		$imagenes = $_FILES['imagenes'];
		$extensionesAceptadas = array(".JPG", ".JPEG", ".PNG", ".GIF", ".BMP");
		for($i = 0; $i < count($imagenes); $i++){
			$extension = substr($imagenes['name'][$i], strrpos($imagenes['name'][$i], "."));
			if(in_array(strtoupper($extension), $extensionesAceptadas)){
				$cant = $i + 1;
				copy($imagenes['tmp_name'][$i], "img/Perfiles/".$_POST['ci']."-".$cant.$extension);
				/*$imagen = new ImagenDeUsuario(array("ciUsuario" => $_POST['ci'].,
														"rutaImagen" => "img/Perfiles/".$_POST['ci']."-".$cant.$extension,));*/
				//$imagen->insert();
			}
		}
		
	}

	public function loginFacebook(){
		//echo "aca";
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

			echo "otra vez";
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
}

?>