	<?php 
require_once("clases/template.php");
require_once("clases/auth.php");
require_once("clases/usuario.php");
require_once("clases/respuesta.php");
require_once("clases/Utils.php");

class ControladorUsuario extends ControladorIndex{

	function landing($param=array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Inicio');
		//$tpl->asignar('logueado', 'no');
		$tpl->asignar('landing', 'si');
		$tpl->mostrar('landing');
	}

	function signup($params=array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location','Sign Up');
		$tpl->mostrar("signup");
	}

	function login($params = array()){
		$tpl = Template::getInstance();
		$tpl->asignar('location', 'Log In');
		$tpl->asignar('landing', 'no');
		$tpl->mostrar("login");
	}	

	function validate($params=array()){

		$params = array(
					"ci"=>$_POST["cedulaUsuario"],
					"contrasenia" =>$_POST["passwordUsuario"],
				);
		$usuario = new Usuario($params);

		if($usuario->login() == 0){
			$code = "error";
			$message = "Los datos ingresados son incorrectos";
		}
		else{
			$code = "ok";
			$message = "";
			//echo "aca";
			if($_POST['recordarme']){
				setcookie('ciUsuario', $_POST['cedulaUsuario'], time() + 365 * 24 * 60 * 60, "/");
				//$code .= " y con cookie";
			}
		}

		$result = new Respuesta(array("code" => $code,
									"message" => $message,
									"content" => "",));

		echo $result->getResult();
	}

	function contacto($params = array()){
		/*$params = array("correo" => $_POST['correo'],
						"asunto" => $_POST['asunto'],
						"mensaje" => $_POST['mensaje'],);*/
		//echo json_encode($params);
		$utils = new Utils();


		$res = $utils->enviarCorreoContacto($_POST['correo'], $_POST['asunto'], $_POST['mensaje']);
		if($res){
			$respuesta = new Respuesta(array("code" => "ok",
											"message" => "El correo ha sido enviado de manera correcta. En breve los administradores del sistema se pondrán en contacto con usted.",
											"content" => "",));
			/*echo "ok";*/
		}
		else{
			$respuesta = new Respuesta(array("code" => "error",
											"message" => "Se ha producido un error al intentar enviar el mensaje. Por favor verifique la conexión a internet y vuelva a intentarlo.",
											"content" => "",));
			/*echo "error";*/
		}
		echo $respuesta->getResult();
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
}

?>