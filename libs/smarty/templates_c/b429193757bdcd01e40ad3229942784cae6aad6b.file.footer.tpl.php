<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-22 05:43:00
         compiled from "vistas\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2502958f80da01e1242-84629123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b429193757bdcd01e40ad3229942784cae6aad6b' => 
    array (
      0 => 'vistas\\footer.tpl',
      1 => 1492839758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2502958f80da01e1242-84629123',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f80da01e1fb2_34336753',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f80da01e1fb2_34336753')) {function content_58f80da01e1fb2_34336753($_smarty_tpl) {?><footer>
	<div class = "contenedor">
		<div class = "divInformacion">
			<div class = "informacion">
				<label class = "paysanduLimpia">Paysandú Limpia</label>
				<label class = "sistemaPara">Sistema para control de estado y asistencia de volquetas recolectoras de residuos</label>
				<label class = "anio">2017</label>
			</div>
		</div>
		<div class = "divContacto">
			<form>
				<label class = "tituloContacto">Contacto</label>
				<input type = "text" class = "form-control campoFooter" placeholder = "Correo electrónico"/>
				<input type = "text" class = "form-control campoFooter" placeholder = "Asunto"/>
				<textarea class = "form-control campoFooter" placeholder = "Mensaje"></textarea>
				<button type="button" class="btn btn-default enviarCorreo">Enviar</button>
			</form>
		</div>
	</div>
</footer><?php }} ?>
