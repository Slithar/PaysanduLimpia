<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-22 06:11:40
         compiled from "vistas\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:415658f80da01afe57-50846233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aabbfe6616a8a7fe203e03a3b81a180c25c58a3f' => 
    array (
      0 => 'vistas\\header.tpl',
      1 => 1492841468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '415658f80da01afe57-50846233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f80da01b2858_75040954',
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
        <li class = "opcion"><a href = "#"><span class = "fa fa-map-marker"></span>&nbsp;&nbsp;Ver volquetas</a></li>
        <li class = "opcion"><a href = "#"><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;Registrarse</a></li>
        <li class = "opcion" id = "opcionIngresar"><a href = "#"><span class = "fa fa-sign-in"></span>&nbsp;&nbsp;Ingresar</a></li>
      </ul>
      <div class = "loginForm" id = "loginData">
        <form class = "form-group" id = "form_login">
          <span class = "fa fa-chevron-left" id = "spanAtras"></span>
          <input type = "text" name = "ci" id = "ci" placeholder="Cédula de identidad" class = "form-control"/>
          <input type = "password" name = "contrasenia" id = "contrasenia" placeholder="Contraseña" class = "form-control"/>
          <input type = "checkbox" name = "recordarme" id = "recordarme"/>&nbsp;<label for = "recordarme" id = "lblRecordarme">Recordarme</label>
          <input type = "submit" value = "Iniciar sesión" class = "btn btn-default" id = "btnSubmitLogin"/>
        </form>
      </div>
    </div>
  </div>
</header>
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
