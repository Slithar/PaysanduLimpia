<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-04 06:57:46
         compiled from "vistas\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:415658f80da01afe57-50846233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aabbfe6616a8a7fe203e03a3b81a180c25c58a3f' => 
    array (
      0 => 'vistas\\header.tpl',
      1 => 1499151435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '415658f80da01afe57-50846233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f80da01b2858_75040954',
  'variables' => 
  array (
    'logueado' => 0,
    'fotoPerfil' => 0,
    'nombre' => 0,
    'cantidadNotificacionesNoVistas' => 0,
    'funcionario' => 0,
    'tipo' => 0,
    'cantidadNotificacionesTotal' => 0,
    'notificaciones' => 0,
    'notificacion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f80da01b2858_75040954')) {function content_58f80da01b2858_75040954($_smarty_tpl) {?><!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>-->

<header>
  <div class = "header">
    <div class = "divLogo">
      <img src = "img/LogoPaysandúLimpia5.png" class = "imgLogo"/>
    </div>
    <div class = "bars">
      <span class = "fa fa-bars"></span>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
      <div class = "divPerfil2">      
        <div class = "divFotoPerfil2">
          <img src = "<?php echo $_smarty_tpl->tpl_vars['fotoPerfil']->value;?>
" class = "fotoPerfil"/>
        </div>
        <p class = "nombreLogueado2" style = "margin-right: 15px">
          <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>

        </p>               
      </div>
    <?php }?>
    <div class = "ulMenuVertical">
      <ul>
        <li class = "opcionSubmenuVertical"><a href = "/Volquetas"><span class = "fa fa-home"></span>&nbsp;&nbsp;Inicio</a></li>
        <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
          <li class = "opcionSubmenuVertical"><a id = "opcionNotificaciones"> <span class = "fa fa-bell" style = "font-size: 18px"></span>&nbsp;&nbsp;Notificaciones</a>
            <?php if ($_smarty_tpl->tpl_vars['cantidadNotificacionesNoVistas']->value>0) {?>
              <span class = "pendientesVertical"><?php echo $_smarty_tpl->tpl_vars['cantidadNotificacionesNoVistas']->value;?>
</span>
            <?php }?>
          </li> 
        <?php }?>
        <li class = "opcionSubmenuVertical"><a href = "/Volquetas/usuario/ayuda"><span class = "fa fa-question-circle" style = "font-size: 22px"></span>&nbsp;&nbsp;Ayuda</a></li>  
        <li class = "opcionSubmenuVertical"><a href = "/Volquetas/volqueta/verVolquetas"><span class = "fa fa-map-marker" style = "font-size: 24px"></span>&nbsp;&nbsp;Ver volquetas</a></li>
        <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='no') {?>
          <li class = "opcionSubmenuVertical"><a href = "/Volquetas/usuario/signup"><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;Registrarse</a></li>
          <li class = "opcionSubmenuVertical"><a href = "/Volquetas/usuario/login"><span class = "fa fa-sign-in"></span>&nbsp;&nbsp;Iniciar sesión</a></li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
          <li class = "opcionSubmenuVertical"><a id = "opcionIncidenciasVertical"><span class = "fa fa-bug"></span>&nbsp;&nbsp;Incidencias&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarIncidenciasVertical"></span></a></li>
          <ul class = "submenuIncidenciasVertical">
            <li class = "opcionSubmenuIncidenciasVertical"><a href = "/Volquetas/incidencia/misIncidencias" style = "height: auto">Mis incidencias</a><span class = "fa fa-circle"></span></li>
            <li class = "opcionSubmenuIncidenciasVertical"><a href = "/Volquetas/incidencia/nuevaIncidencia" style = "height: auto">Nueva incidencia</a><span class = "fa fa-circle"></span></li>
            <?php if ($_smarty_tpl->tpl_vars['funcionario']->value=="true") {?>  
              <li class = "opcionSubmenuIncidenciasVertical"><a href = "/Volquetas/incidencia/verTodasLasIncidencias" style = "height: auto">Ver todas las incidencias</a><span class = "fa fa-circle"></span></li>
            <?php }?>  
          </ul>
          <li class = "opcionSubmenuVertical"><a href = "/Volquetas/volqueta/estadisticas"><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;Estadísticas</a></li>
          <li class = "opcionSubmenuVertical" id = "opcionUsuariosVertical"><a><span class = "fa fa-user"></span>&nbsp;&nbsp;Usuarios&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarUsuariosVertical"></span></a></li>
          <ul class = "submenuUsuariosVertical">
            <li class = "opcionSubmenuUsuariosVertical"><a href = "/Volquetas/usuario/verPerfil" style = "height: auto">Mi perfil</a><span class = "fa fa-circle"></span></li>
            <?php if ($_smarty_tpl->tpl_vars['funcionario']->value=="true") {?>
             <li class = "opcionSubmenuUsuariosVertical"><a href = "/Volquetas/usuario/signup" style = "height: auto">Agregar funcionario</a><span class = "fa fa-circle"></span></li>
            <?php }?>
          </ul> 
          <li class = "opcionSubmenuVertical" <?php if ($_smarty_tpl->tpl_vars['tipo']->value=="google") {?>onclick = "LogOutGoogle();"<?php } else { ?>onclick = "logout();"<?php }?>><a><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;Cerrar sesión</a></li>
        <?php }?>
      </ul>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?> 
      <!--<div classs = "divNotificaciones">-->
        <div class = "notificaciones">
          <span class = "fa fa-bell" style = "font-size: 24px"></span>
          <?php if ($_smarty_tpl->tpl_vars['cantidadNotificacionesNoVistas']->value>0) {?>
            <span class = "pendientes"><?php echo $_smarty_tpl->tpl_vars['cantidadNotificacionesNoVistas']->value;?>
</span>
          <?php }?>
          <ul class = "lstNotificaciones">
            <?php if ($_smarty_tpl->tpl_vars['cantidadNotificacionesTotal']->value>0) {?>
              <?php  $_smarty_tpl->tpl_vars['notificacion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notificacion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notificaciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notificacion']->key => $_smarty_tpl->tpl_vars['notificacion']->value) {
$_smarty_tpl->tpl_vars['notificacion']->_loop = true;
?>
                <li class = "<?php if ($_smarty_tpl->tpl_vars['notificacion']->value['vista']=='1') {?>vista<?php } else { ?>noVista<?php }?>" onclick = "verNotificacion(<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['codigo'];?>
, <?php echo $_smarty_tpl->tpl_vars['notificacion']->value['codigoIncidencia'];?>
);">          
                  <div style = "width: 17%; float: left;">
                    <?php if ($_smarty_tpl->tpl_vars['notificacion']->value['tipo']=="estado") {?>
                      <span class = "fa fa-trash" style = "font-size: 38px; margin-right:25px"></span>
                    <?php } else { ?>
                      <span class = "fa fa-comment" style = "font-size: 38px; margin-right:25px"></span>
                    <?php }?>
                  </div>
                  <div  style = "width: 83%; float: right; margin-top: 1.5px; font-size: 14px; color: black; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['notificacion']->value['mensaje'];?>
</div>
                  <br><br>
                  <span class="subtexto"><span class = "fa fa-clock-o"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['fechaHora'];?>
</span>
                </li>
              <?php } ?>
            <?php } else { ?>
              <li class = "noVista">
                <div style = "width: 100%; text-align: center"><span class = "fa fa-bell-slash" style = "font-size: 38px;"></span></div>
                <div  style = "width: 100%; margin-top: 11px; text-align: center">Sin notificaciones nuevas</div>
              </li>
            <?php }?>
          </ul>
        </div>
           
      <!--</div>--> 
    <?php }?>
    <div class = "menu">
      <ul class = "ulMenu"> 
        <li class = "opcion"><a href = "/Volquetas/usuario/ayuda"><span class = "fa fa-question-circle"></span>&nbsp;&nbsp;Ayuda</a></li>        
        <li class = "opcion"><a href = "/Volquetas/volqueta/verVolquetas"><span class = "fa fa-map-marker"></span>&nbsp;&nbsp;Ver volquetas</a></li>
        <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='no') {?>
          <li class = "opcion"><a href = "/Volquetas/usuario/signup"><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;Registrarse</a></li>
          <li class = "opcion" id = "opcionIngresar"><a href = "/Volquetas/usuario/login"><span class = "fa fa-sign-in"></span>&nbsp;&nbsp;Iniciar sesión</a></li>
        <?php } else { ?>
          <div class = "divPerfil">
            <p class = "nombreLogueado">
              <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>

            </p>
            <div class = "divFotoPerfil">
              <img src = "<?php echo $_smarty_tpl->tpl_vars['fotoPerfil']->value;?>
" class = "fotoPerfil"/>
            </div>
            
          </div>
        <?php }?>
      </ul>      
    </div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
    <div class = "secondHeader">
      <div class = "menuHorizontal">
        <ul class = "ulMenuHorizontal"> 
          <li class = "opcionSubmenu"><a href = "/Volquetas"><span class = "fa fa-home"></span>&nbsp;&nbsp;Inicio</a></li>        
          <li class = "opcionSubmenu" id = "opcionIncidencias"><a><span class = "fa fa-bug"></span>&nbsp;&nbsp;Incidencias&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarIncidencias"></span></a>
            <ul class = "submenu submenuIncidencias">
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/misIncidencias" style = "height: auto">Mis incidencias</a></li>
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/nuevaIncidencia" style = "height: auto">Nueva incidencia</a></li>
              <?php if ($_smarty_tpl->tpl_vars['funcionario']->value=="true") {?>
                <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/verTodasLasIncidencias" style = "height: auto">Ver todas las incidencias</a></li>
              <?php }?>
            </ul>    
          </li>
          <li class = "opcionSubmenu"><a href = "/Volquetas/volqueta/estadisticas"><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;Estadísticas</a></li>
          <li class = "opcionSubmenu" id = "opcionUsuarios"><a><span class = "fa fa-user"></span>&nbsp;&nbsp;Usuarios&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = iconoDesplegarUsuarios></span></a>
            <ul class = "submenu submenuUsuarios">
              <li class = "opcionSubmenuUsuarios"><a href = "/Volquetas/usuario/verPerfil" style = "height: auto">Mi perfil</a></li>
              <?php if ($_smarty_tpl->tpl_vars['funcionario']->value=="true") {?>
               <li class = "opcionSubmenuUsuarios"><a href = "/Volquetas/usuario/signup" style = "height: auto">Agregar funcionario</a></li>
              <?php }?>
            </ul> 
          </li>
          <li class = "opcionSubmenu" <?php if ($_smarty_tpl->tpl_vars['tipo']->value=="google") {?>onclick = "LogOutGoogle();"<?php } else { ?>onclick = "logout();"<?php }?>><a><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  <?php }?>
  <div class = "contenedorNegro">  
    <div class = "btnCerrar"><span class = "fa fa-times-circle-o"></span></div>
    <div class = "listaNotificaciones">
      <ul class = "lstNotificaciones2">
        <?php if ($_smarty_tpl->tpl_vars['cantidadNotificacionesTotal']->value>0) {?>
          <?php  $_smarty_tpl->tpl_vars['notificacion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notificacion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notificaciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notificacion']->key => $_smarty_tpl->tpl_vars['notificacion']->value) {
$_smarty_tpl->tpl_vars['notificacion']->_loop = true;
?>
            <li class = "<?php if ($_smarty_tpl->tpl_vars['notificacion']->value['vista']=='1') {?>vista<?php } else { ?>noVista<?php }?>" onclick = "verNotificacion(<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['codigo'];?>
, <?php echo $_smarty_tpl->tpl_vars['notificacion']->value['codigoIncidencia'];?>
);">          
              <div style = "width: 17%; float: left;">
                <?php if ($_smarty_tpl->tpl_vars['notificacion']->value['tipo']=="estado") {?>
                  <span class = "fa fa-trash" style = "font-size: 38px; margin-right:25px"></span>
                <?php } else { ?>
                  <span class = "fa fa-comment" style = "font-size: 38px; margin-right:25px"></span>
                <?php }?>
              </div>
              <div  style = "width: 83%; float: right; margin-top: 1.5px; font-size: 14px; color: black; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['notificacion']->value['mensaje'];?>
</div>
              <br><br>
              <span class="subtexto"><span class = "fa fa-clock-o"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['notificacion']->value['fechaHora'];?>
</span>
            </li>
          <?php } ?>
        <?php } else { ?>
          <li class = "noVista">
            <div style = "width: 100%; text-align: center"><span class = "fa fa-bell-slash" style = "font-size: 38px;"></span></div>
            <div  style = "width: 100%; margin-top: 11px; text-align: center">Sin notificaciones nuevas</div>
          </li>
        <?php }?>
      </ul>
    </div>
  </div> 
</header>
<!--
<?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
  <div id = "espacio" style = "margin-top: 90px"></div>
<?php } else { ?>
  <div id = "espacio" style = "margin-top: 57px"></div>
<?php }?>
-->


<!--
<div class="loginForm" id="loginData">
  <form class="form-group" id="form_login" method = "POST" action="logear.php">
    <span style="white-space:nowrap">
      <input type="text" name ="username" id="CI" placeholder="Cedula de identidad"/>
      <span class="results" id="resultado" >Error de usuario o contraseña</span>
      <input type = "password" name = "password" id="password" placeholder="Contraseña"/>
      <input type="submit"  value="Iniciar Sesion">
    </span>
  </form>
</div>
--><?php }} ?>
