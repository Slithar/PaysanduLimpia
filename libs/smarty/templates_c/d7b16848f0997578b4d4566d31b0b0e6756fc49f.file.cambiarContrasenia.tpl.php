<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-10 18:44:30
         compiled from "vistas\cambiarContrasenia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1750559135f288bb8a2-12120227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b16848f0997578b4d4566d31b0b0e6756fc49f' => 
    array (
      0 => 'vistas\\cambiarContrasenia.tpl',
      1 => 1494441867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1750559135f288bb8a2-12120227',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59135f288be481_19227400',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59135f288be481_19227400')) {function content_59135f288be481_19227400($_smarty_tpl) {?><div id="modalCambiarContrasenia" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cambiar contraseña</h4>
      </div>
      <div class="modal-body" style = "padding: 4% 7%; box-sizing: border-box;">
       <b>Contraseña actual:</b><br><input type="password" style = "width:100%" class = "form-control"><br>
       <b>Contraseña nueva:</b><br><input type="password" style = "width:100%" class = "form-control"><br>
       <b>Confirmar contraseña:</b><br><input type="password" style = "width:100%" class = "form-control"><br>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-success">Aceptar</button>
      	 <button type="button" class="btn btn-danger">Cancelar</button>
      </div>
    </div>

  </div>
  
</div><?php }} ?>
