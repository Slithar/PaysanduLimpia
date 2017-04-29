<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-27 21:58:10
         compiled from "vistas\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:415658f80da01afe57-50846233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aabbfe6616a8a7fe203e03a3b81a180c25c58a3f' => 
    array (
      0 => 'vistas\\header.tpl',
      1 => 1493330222,
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
    <div class = "menu">
      <ul class = "ulMenu"> 
        <li class = "opcion"><a href = "#"><span class = "fa fa-question-circle"></span>&nbsp;&nbsp;Ayuda</a></li>        
        <li class = "opcion"><a href = "/Volquetas/volqueta/verVolquetas"><span class = "fa fa-map-marker"></span>&nbsp;&nbsp;Ver volquetas</a></li>
        <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='no') {?>
          <li class = "opcion"><a href = "#"><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;Registrarse</a></li>
          <li class = "opcion" id = "opcionIngresar"><a href = "#"><span class = "fa fa-sign-in"></span>&nbsp;&nbsp;Iniciar sesión</a></li>
        <?php } else { ?>
          <div class = "divPerfil">
            <p class = "nombreLogueado">
              Guille
            </p>
            <div class = "divFotoPerfil">
              <img src = "img/sinFoto.png" class = "fotoPerfil"/>
            </div>
            
          </div>
        <?php }?>
      </ul>
      <div class = "loginForm" id = "loginData">
        <form class = "form-inline" id = "formLogin">

          <span class = "fa fa-chevron-right" id = "spanAtras"></span>
          <div class = "form-group">
            <input type = "text" name = "cedulaUsuario" id = "ci" placeholder="Cédula de identidad" class = "form-control" style = "margin-right: 7px"/>
          </div>
          <div class = "form-group">
            <input type = "password" name = "passwordUsuario" id = "contrasenia" placeholder="Contraseña" class = "form-control" style = "margin-right: 15px"/>
          </div>
          <div class = "checkbox">
            <label id = "lblRecordarme"><input type = "checkbox" name = "recordarme"/>&nbsp;Recordarme</label>
          </div>          
          
          <input type = "submit" value = "Iniciar sesión" class = "btn btn-success" id = "btnSubmitLogin"/>
          
        </form>
      </div>
    </div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
    <div class = "secondHeader">
      <div class = "menuHorizontal">
        <ul class = "ulMenuHorizontal"> 
          <li class = "opcionSubmenu"><a href = "/Volquetas"><span class = "fa fa-home"></span>&nbsp;&nbsp;Inicio</a></li>        
          <li class = "opcionSubmenu" id = "opcionIncidencias"><a><span class = "fa fa-bug"></span>&nbsp;&nbsp;Incidencias&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarIncidencias"></span></a>
            <ul class = "submenu submenuIncidencias">
              <li class = "opcionSubmenuIncidencias"><a href = "#">Mis incidencias</a></li>
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/nuevaIncidencia">Nueva incidencia</a></li>
              <li class = "opcionSubmenuIncidencias"><a href = "#">Ver todas las incidencias</a></li>
            </ul>    
          </li>
          <li class = "opcionSubmenu"><a href = "#"><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;Estadísticas</a></li>
          <li class = "opcionSubmenu" id = "opcionUsuarios"><a><span class = "fa fa-user"></span>&nbsp;&nbsp;Cuentas de usuarios&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = iconoDesplegarUsuarios></span></a>
            <ul class = "submenu submenuUsuarios">
              <li class = "opcionSubmenuUsuarios"><a href = "#">Mi perfil</a></li>
              <li class = "opcionSubmenuUsuarios"><a href = "#">Agregar funcionario</a></li>
            </ul> 
          </li>
          <li class = "opcionSubmenu"><a href = "#"><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;Cerrar sesión</a></li>
        </ul>
    </div>
  <?php }?>
</header>
<?php if ($_smarty_tpl->tpl_vars['logueado']->value=='si') {?>
  <div id = "espacio" style = "margin-top: 90px"></div>
<?php } else { ?>
  <div id = "espacio" style = "margin-top: 57px"></div>
<?php }?>
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
