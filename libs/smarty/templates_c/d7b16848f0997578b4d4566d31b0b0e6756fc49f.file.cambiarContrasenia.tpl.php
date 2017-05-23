<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-16 01:26:48
         compiled from "vistas\cambiarContrasenia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1750559135f288bb8a2-12120227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b16848f0997578b4d4566d31b0b0e6756fc49f' => 
    array (
      0 => 'vistas\\cambiarContrasenia.tpl',
      1 => 1494897452,
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
      <form id="formCambiarcontra" action="/Volquetas/usuario/modificarCon" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="modal-body" style = "padding: 4% 7%; box-sizing: border-box;">
          <div class = "container-fluid">
            <form id="cambiarContra">
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="ci" class="control-label"><b>Contraseña actual</b></label><br>
                  <input type="password" style = "width:100%" class = "form-control" name = "contravieja" id="contravieja">
                </div>              
              </div>
              <div class = "row">
                <div class="form-group col-sm-12">
                  <label for="ci" class="control-label" id="contranueva1"><b>Contraseña nueva</b></label><br>
                  <input type="password" style = "width:100%" class = "form-control" name = "contrasenia">
                </div>
              </div>
              <div class = "row">
                <div class="form-group col-sm-12">
                  <label for="ci" class="control-label" id="contranueva2"><b>Confirmar contraseña</b></label><br>
                  <input type="password" style = "width:100%" class = "form-control" name = 'contrasenia2'>
                </div>
              </div>
            </form>
          </div>       
        </div>
        <div class="modal-footer">
           <button type="submit" class="btn btn-success" id ="cambiarPass"><b>Aceptar</b></button>
           <button type="button" class="btn btn-danger" data-dismiss = "modal"><b>Cancelar</b></button>
           <div class="col-sm-12 alert alert-danger" id="alertaContrasenia" style="text-align: center; display: none; margin-top: 30px;">
           </div>
        </div>
        
      </form>
  </div>
  
</div>
<?php }} ?>
