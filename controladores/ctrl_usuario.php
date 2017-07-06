<?php 
require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/Utils.php");
require_once("clases/session.php");
require_once('clases/notificacion.php');
require_once('vendor/autoload.php');

class ControladorUsuario extends ControladorIndex{

	function landing($param=array()){
		$tpl = Template::getInstance();
		//$this->definirSesion();
		$tpl->asignar('location', 'Inicio');
		//$tpl->asignar('logueado', 'no');
		$tpl->asignar('landing', 'si');
		$tpl->asignar('classMain', 'mainLanding');
		$tpl->mostrar('landing');
	}

	function signup($params=array()){
		$tpl = Template::getInstance();
		if(isset($params[0]) && $params[0] != "")
			$success = "si";
		else
			$success = "no";
		$tpl->asignar('location','Sign Up');
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('success', $success);
		$tpl->mostrar("signup");
	}

	public function ayuda($params = array()){
		$tpl = Template::getInstance();
		//$this->definirSesion();
		$tpl->asignar('location','Ayuda');
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('landing', 'no');
		$tpl->mostrar("ayuda");
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
			Session::set('funcionario', 'false');
			
			$this->redirect('usuario', 'landing');
		}		
		else{
			$usuario = new Usuario(array(
					"ci" => $_POST["cedulaUsuario"],
					"contrasenia" => $_POST["passwordUsuario"],
				));

			$res = $usuario->login();

			if($res == 1){
				$recordar = "no";
				if(isset($_POST['recordarme'])){
					setcookie('ciUsuario', $_POST["cedulaUsuario"], time()+(60*60*24*365), '/');
					//setcookie('ciUsuario', $_POST["cedulaUsuario"]);
					$recordar = "si";
				}
				Session::init();
				Session::set('tipo', 'paysandulimpia');
				Session::set('ci', $_POST["cedulaUsuario"]);
				$user = $usuario->seleccionarUsuario();
				Session::set('nombre', $user->getNombre());
				Session::set('fotoPerfil', $user->getFotoperfil());
				$funcionario = $user->getFuncionario() ? "true" : "false";
				Session::set('funcionario', $funcionario);
				$respuesta = new Respuesta(array("code" => "ok",
													"message" => $recordar,
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

		if($hasimage && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp"){	
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
				if(Session::exists('ci'))
					$this::redirect("usuario","signup/success");	
				else
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
																	"content" => "<strong><center>ERROR</center></strong><center>No se ha chequeado captcha. Por favor, selecciónelo para continuar.</center>",),
												"content" => "",));
				/*echo "error";*/
			echo $respuesta->getResult();
		}
		
	}

	public function verPerfil($params = array()){
		Auth::loggedIn();
		Session::init();
		$usuario= new Usuario(array("ci"=>Session::get('ci')));
		$user=$usuario->seleccionarUsuario();
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Ver perfil');
		$tpl->asignar('landing', 'no');
		if(Session::get('tipo') == 'paysandulimpia'){
			$tpl->asignar('nombreModificar',$user->getNombre());
			$tpl->asignar('apellidoModificar',$user->getApellido());
			$tpl->asignar('email',$user->getEmail());
			$tpl->asignar('ci',$user->getCi());
			$tpl->asignar('fotoPerfil',$user->getFotoperfil());
			$funcionario = $user->getFuncionario() ? "true" : "false";
			$tpl->asignar('funcionario', $funcionario);
			$tpl->asignar('enviarCorreo',$user->getEnviarcorreo());
			if(isset($params[0]) && $params[0] == "success"){
				$tpl->asignar('success', 'si');
			}
			else{
				$tpl->asignar('success', 'no');
			}
		}
		
		$tpl->asignar('classMain', 'mainNoLanding');
		$tpl->asignar('landing', 'no');
		$tpl->asignar('tipo', Session::get('tipo'));

		//echo Session::get('nombre');
		//echo count($user);
		$tpl->mostrar('verPerfil');
	}

	public function logout(){
		//Auth::loggedIn();
		Session::init();
		unset($_COOKIE['ciUsuario']);
		setcookie('ciUsuario', null, -1, '/');		
		Session::destroy();	
		$this->redirect('usuario', 'landing');
	}

	public function modificar (){
		Session::init();
		$imagenes = $_FILES['fotoPerfil'];
		$extensionesAceptadas = array(".JPG", ".JPEG", ".PNG", ".GIF", ".BMP");
		$cantidad = empty($imagenes['name']) ? 0 : 1;
		if($cantidad == 0){
			$fotoPerfil=Session::get('fotoPerfil');
		}
		else{
			$extension = substr($imagenes['name'], strrpos($imagenes['name'], "."));
			if(in_array(strtoupper($extension), $extensionesAceptadas)){
				if(file_exists("img/Perfiles/".Session::get('ci').$extension))
					unlink("img/Perfiles/".Session::get('ci').$extension);
				copy($imagenes['tmp_name'], "img/Perfiles/".Session::get('ci').$extension);
				$fotoPerfil = "img/Perfiles/".Session::get('ci').$extension;
			}
			else{
				$fotoPerfil = Session::get('fotoPerfil');
			}
		}
		//echo $fotoPerfil;
		$usuario= new Usuario(array("ci"=>Session::get('ci'),
									 "nombre"=>htmlentities($_POST['nombre'], ENT_QUOTES),
									 "apellido"=>htmlentities($_POST['apellido'], ENT_QUOTES),
									 "email"=>$_POST['email'],
									 "fotoperfil"=>$fotoPerfil,
									 "enviarcorreo"=>$_POST['enviarEmail'],));
		$usuario->update();
		//echo "listo";
		$usuario= new Usuario(array("ci"=>Session::get('ci')));
		$user=$usuario->seleccionarUsuario();
		Session::set('nombre', $user->getNombre());
		Session::set('fotoPerfil', $user->getFotoperfil());
		$this->redirect('usuario', 'verPerfil/success');
	}
	public function modificarCon(){
		Session::init();
		$usuario= new Usuario(array("ci"=>Session::get('ci'),
									"contrasenia"=>$_POST['contrasenia']));
		$usuario->modificarContra();

		$this->redirect('usuario', 'verPerfil/success');

	}
	public function existeCon(){
		Session::init();
		$usuario= new Usuario(array("ci"=>Session::get('ci'),
									"contrasenia"=>$_POST['contravieja']));

		$existeContra = $usuario->existeContra() > 0 ? true : false;
		if($existeContra){
				$respuesta = new Respuesta(array("code" => "ok",
												"message" => "",
												"content" => "",));
		}
		else{
					$respuesta = new Respuesta(array("code" => "error",
												"message" => array("alert" => "alert-danger",													
																	"content" => "<strong>ERROR: </strong>La contraseña actual ingresada no es correcta.",),
												"content" => "",));

		}
		echo $respuesta->getResult();

	}

		
	public function existeEmail(){
		Session::init();
		$usuario= new Usuario(array("ci"=>Session::get('ci'),
									"email"=>$_POST['email']));
		//$contra=$_POST['contrasenia'];
		$existeEmail = $usuario->existeEmail() > 0 ? true : false;
		if(!$existeEmail){
			$respuesta = new Respuesta(array("code" => "ok",
											"message" => "",
											"content" => "",));
		}
		else{
			$respuesta = new Respuesta(array("code" => "error",
										"message" => array("alert" => "alert-danger",													
															"content" => "<strong>ERROR: </strong>El correo electrónico ingresado ya existe.",),
										"content" => "",));

		}
		echo $respuesta->getResult();

	}
	public function banneado(){
		Session::init();
		$usuario= new Usuario(array("ci"=>Session::get('ci'),
									"contrasenia"=>$_POST['contrasenia']));
		$usuario->banneado();
		$this->redirect('usuario', 'logout');

	}	

	public function notificacionesDelUsuario($params = array()){
		Session::init();
		/*$ciReceptor = Session::get('ci');
		if($ciReceptor != "1" && $ciReceptor != "2"){
			$aplicacion = "paysandulimpia";
			$idAplicacion = "0";
		}
		else{
			$aplicacion = Session::get('tipo');
			$idAplicacion = Session::get('id');
			if($aplicacion == "facebook")
				$ciReceptor = "1";
			else
				$ciReceptor = "2";
		}*/
		$aplicacion = Session::get('tipo');

		if($aplicacion == "paysandulimpia"){
			$ciReceptor = Session::get('ci');
			$idAplicacion = "0";
		}
		else if($aplicacion == "facebook"){
			$ciReceptor = "1";
			$idAplicacion = Session::get('id');
		}
		else if($aplicacion == "google"){
			$ciReceptor = "2";
			$idAplicacion = Session::get('id');
		}

		$notificacion = new notificacion(array("ciReceptor" => $ciReceptor,
											"aplicacion" => $aplicacion,
											"idAplicacion" => $idAplicacion));

		$notificacionesNoVistas = $notificacion->getNotificacionesNoVistas();
		$notificacionesVistas = $notificacion->getNotificacionesVistas();

		$cantidadNotificacionesVistas = count($notificacionesVistas);
		$cantidadNotificacionesNoVistas = count($notificacionesNoVistas);
		$cantidadNotificacionesTotal = $cantidadNotificacionesVistas + $cantidadNotificacionesNoVistas;
		if($cantidadNotificacionesNoVistas > 0){
			foreach($notificacionesNoVistas as $noVista){
				$datosNotificacion = array("codigo" => $noVista->getCodigo(),
											"ciReceptor" => $noVista->getCiReceptor(),
											"aplicacion" => $noVista->getAplicacion(),
											"idAplicacion" => $noVista->getIdAplicacion(),
											"mensaje" => $noVista->getMensaje(),
											"codigoIncidencia" => $noVista->getCodigoIncidencia(),
											"fechaHora" => $noVista->getFechaHora(),
											"tipo" => $noVista->getTipo(),
											"vista" => "0");
				$notificaciones[] = $datosNotificacion;
			}
		}
		if($cantidadNotificacionesNoVistas < 10){
			for($i = 0; $i < 11 - $cantidadNotificacionesNoVistas; $i++){
				if($notificacionesVistas[$i]){
					$datosNotificacion = array("codigo" => $notificacionesVistas[$i]->getCodigo(),
										"ciReceptor" => $notificacionesVistas[$i]->getCiReceptor(),
										"aplicacion" => $notificacionesVistas[$i]->getAplicacion(),
										"idAplicacion" => $notificacionesVistas[$i]->getIdAplicacion(),
										"mensaje" => $notificacionesVistas[$i]->getMensaje(),
										"codigoIncidencia" => $notificacionesVistas[$i]->getCodigoIncidencia(),
										"fechaHora" => $notificacionesVistas[$i]->getFechaHora(),
										"tipo" => $notificacionesVistas[$i]->getTipo(),
										"vista" => "1");
					$notificaciones[] = $datosNotificacion;
				}
				
			}
		}
		//var_dump($cantidadNotificacionesNoVistas." - ".$cantidadNotificacionesVistas);
		$tpl = Template::getInstance();
		$tpl->asignar('notificaciones', $notificaciones);
		$tpl->asignar('cantidadNotificacionesNoVistas', $cantidadNotificacionesNoVistas);
		$tpl->asignar('cantidadNotificacionesVistas', $cantidadNotificacionesVistas);
		$tpl->asignar('cantidadNotificacionesTotal', $cantidadNotificacionesTotal);
		
	}

	public function notificacionAVista(){
		$notificacion = new notificacion(array("codigo" => $_POST['codigo']));
		$notificacion->notificacionAVista();
		$respuesta = new Respuesta(array("code" => "ok",
										"message" => "",
										"content" => ""));
		echo $respuesta->getResult();
	}
}

?>