<!--<nav class="navbar navbar-inverse">
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
    {if $logueado eq 'si'}
      <div class = "notificaciones">
        <span class = "fa fa-bell"></span>
      </div>
    {/if}
    <div class = "menu">
      <ul class = "ulMenu"> 
        <li class = "opcion"><a href = "/Volquetas/usuario/ayuda"><span class = "fa fa-question-circle"></span>&nbsp;&nbsp;Ayuda</a></li>        
        <li class = "opcion"><a href = "/Volquetas/volqueta/verVolquetas"><span class = "fa fa-map-marker"></span>&nbsp;&nbsp;Ver volquetas</a></li>
        {if $logueado eq 'no'}
          <li class = "opcion"><a href = "/Volquetas/usuario/signup"><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;Registrarse</a></li>
          <li class = "opcion" id = "opcionIngresar"><a href = "/Volquetas/usuario/login"><span class = "fa fa-sign-in"></span>&nbsp;&nbsp;Iniciar sesión</a></li>
        {else}
          <div class = "divPerfil">
            <p class = "nombreLogueado">
              {$nombre}
            </p>
            <div class = "divFotoPerfil">
              <img src = "{$fotoPerfil}" class = "fotoPerfil"/>
            </div>
            
          </div>
        {/if}
      </ul>      
    </div>
  </div>
  {if $logueado eq 'si'}
    <div class = "secondHeader">
      <div class = "menuHorizontal">
        <ul class = "ulMenuHorizontal"> 
          <li class = "opcionSubmenu"><a href = "/Volquetas"><span class = "fa fa-home"></span>&nbsp;&nbsp;Inicio</a></li>        
          <li class = "opcionSubmenu" id = "opcionIncidencias"><a><span class = "fa fa-bug"></span>&nbsp;&nbsp;Incidencias&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarIncidencias"></span></a>
            <ul class = "submenu submenuIncidencias">
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/misIncidencias">Mis incidencias</a></li>
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/nuevaIncidencia">Nueva incidencia</a></li>
              {if $funcionario eq "true"}
                <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/verTodasLasIncidencias">Ver todas las incidencias</a></li>
              {/if}
            </ul>    
          </li>
          <li class = "opcionSubmenu"><a href = "#"><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;Estadísticas</a></li>
          <li class = "opcionSubmenu" id = "opcionUsuarios"><a><span class = "fa fa-user"></span>&nbsp;&nbsp;Cuentas de usuarios&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = iconoDesplegarUsuarios></span></a>
            <ul class = "submenu submenuUsuarios">
              <li class = "opcionSubmenuUsuarios"><a href = "/Volquetas/usuario/verPerfil">Mi perfil</a></li>
              {if $funcionario eq "true"}
               <li class = "opcionSubmenuUsuarios"><a href = "/Volquetas/usuario/signup">Agregar funcionario</a></li>
              {/if}
            </ul> 
          </li>
          <li class = "opcionSubmenu" {if $tipo eq "google"}onclick = "LogOutGoogle();"{else}onclick = "logout();"{/if}><a><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;Cerrar sesión</a></li>
        </ul>
    </div>
  {/if}
</header>
<!--
{if $logueado eq 'si'}
  <div id = "espacio" style = "margin-top: 90px"></div>
{else}
  <div id = "espacio" style = "margin-top: 57px"></div>
{/if}
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
-->