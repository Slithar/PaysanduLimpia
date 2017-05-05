<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-04 18:00:19
         compiled from "vistas\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2502958f80da01e1242-84629123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b429193757bdcd01e40ad3229942784cae6aad6b' => 
    array (
      0 => 'vistas\\footer.tpl',
      1 => 1493919464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2502958f80da01e1242-84629123',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f80da01e1fb2_34336753',
  'variables' => 
  array (
    'landing' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f80da01e1fb2_34336753')) {function content_58f80da01e1fb2_34336753($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['landing']->value=="si") {?>
	<footer class = "footerLanding">
		<div class = "contenedor">
			<div class = "divInformacion">
				<div class = "informacion">
					<label class = "paysanduLimpia">Paysandú Limpia</label>
					<label class = "sistemaPara">Sistema para control de estado y asistencia de volquetas recolectoras de residuos</label>
					<label class = "anio">2017</label>
				</div>
			</div>
			<div class = "divContacto">
				<form id = "formContacto">
					
					<label class = "tituloContacto">Contacto</label>
					<input type = "text" class = "form-control campoFooter" placeholder = "Correo electrónico" name = "correo" id = "correo"/>
					<input type = "text" class = "form-control campoFooter" placeholder = "Asunto" name = "asunto" id = "asunto"/>
					<textarea class = "form-control campoFooter" placeholder = "Mensaje" name = "mensaje" id = "mensaje"></textarea>
					<center><div class="g-recaptcha" data-sitekey="6Le85B8UAAAAAAiydVde9mFTPUpUheJbRUmc1JJm" id = "recaptcha"></div></center><br>
					<button type="button" class="btn btn-default enviarCorreo" id = "btnEnviarCorreo">Enviar</button>
					<div id = "spinnerEnviar">
						<span class = "fa fa-spinner fa-spin"></span>
					</div>
					<div class = "alert" id = "alertContacto" style = "margin-bottom: 50px; display: none;">
						
					</div>
				</form>
			</div>
		</div>
	</footer>
<?php } else { ?>
	<footer class = "footerNoLanding" style = "position:fixed;	width: 100%; height: 3.5%; bottom: 0">
		<label class = "lblFooterNoLanding">Sistema para control de estado y asistencia de volquetas recolectoras de residuos | 2017</label>
	</footer>
<?php }?><?php }} ?>
