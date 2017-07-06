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
    <div class = "bars">
      <span class = "fa fa-bars"></span>
    </div>
    {if $logueado eq 'si'}
      <div class = "divPerfil2">      
        <div class = "divFotoPerfil2">
          <img src = "{$fotoPerfil}" class = "fotoPerfil"/>
        </div>
        <p class = "nombreLogueado2" style = "margin-right: 15px">
          {$nombre}
        </p>               
      </div>
    {/if}
    <div class = "ulMenuVertical">
      <ul>
        <li class = "opcionSubmenuVertical"><a href = "/Volquetas"><span class = "fa fa-home"></span>&nbsp;&nbsp;Inicio</a></li>
        {if $logueado eq 'si'}
          <li class = "opcionSubmenuVertical"><a id = "opcionNotificaciones"> <span class = "fa fa-bell" style = "font-size: 18px"></span>&nbsp;&nbsp;Notificaciones</a>
            {if $cantidadNotificacionesNoVistas > 0}
              <span class = "pendientesVertical">{$cantidadNotificacionesNoVistas}</span>
            {/if}
          </li> 
        {/if}
        <li class = "opcionSubmenuVertical"><a href = "/Volquetas/usuario/ayuda"><span class = "fa fa-question-circle" style = "font-size: 22px"></span>&nbsp;&nbsp;Ayuda</a></li>  
        <li class = "opcionSubmenuVertical"><a href = "/Volquetas/volqueta/verVolquetas"><span class = "fa fa-map-marker" style = "font-size: 24px"></span>&nbsp;&nbsp;Ver volquetas</a></li>
        {if $logueado eq 'no'}
          <li class = "opcionSubmenuVertical"><a href = "/Volquetas/usuario/signup"><span class = "fa fa-user-plus"></span>&nbsp;&nbsp;Registrarse</a></li>
          <li class = "opcionSubmenuVertical"><a href = "/Volquetas/usuario/login"><span class = "fa fa-sign-in"></span>&nbsp;&nbsp;Iniciar sesión</a></li>
        {/if}
        {if $logueado eq 'si'}
          <li class = "opcionSubmenuVertical"><a id = "opcionIncidenciasVertical"><span class = "fa fa-bug"></span>&nbsp;&nbsp;Incidencias&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarIncidenciasVertical"></span></a></li>
          <ul class = "submenuIncidenciasVertical">
            <li class = "opcionSubmenuIncidenciasVertical"><a href = "/Volquetas/incidencia/misIncidencias" style = "height: auto">Mis incidencias</a><span class = "fa fa-circle"></span></li>
            <li class = "opcionSubmenuIncidenciasVertical"><a href = "/Volquetas/incidencia/nuevaIncidencia" style = "height: auto">Nueva incidencia</a><span class = "fa fa-circle"></span></li>
            {if $funcionario eq "true"}  
              <li class = "opcionSubmenuIncidenciasVertical"><a href = "/Volquetas/incidencia/verTodasLasIncidencias" style = "height: auto">Ver todas las incidencias</a><span class = "fa fa-circle"></span></li>
            {/if}  
          </ul>
          <li class = "opcionSubmenuVertical"><a href = "/Volquetas/volqueta/estadisticas"><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;Estadísticas</a></li>
          <li class = "opcionSubmenuVertical" id = "opcionUsuariosVertical"><a><span class = "fa fa-user"></span>&nbsp;&nbsp;Usuarios&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = "iconoDesplegarUsuariosVertical"></span></a></li>
          <ul class = "submenuUsuariosVertical">
            <li class = "opcionSubmenuUsuariosVertical"><a href = "/Volquetas/usuario/verPerfil" style = "height: auto">Mi perfil</a><span class = "fa fa-circle"></span></li>
            {if $funcionario eq "true"}
             <li class = "opcionSubmenuUsuariosVertical"><a href = "/Volquetas/usuario/signup" style = "height: auto">Agregar funcionario</a><span class = "fa fa-circle"></span></li>
            {/if}
          </ul> 
          <li class = "opcionSubmenuVertical" {if $tipo eq "google"}onclick = "LogOutGoogle();"{else}onclick = "logout();"{/if}><a><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;Cerrar sesión</a></li>
        {/if}
      </ul>
    </div>
    {if $logueado eq 'si'} 
      <!--<div classs = "divNotificaciones">-->
        <div class = "notificaciones">
          <span class = "fa fa-bell" style = "font-size: 24px"></span>
          {if $cantidadNotificacionesNoVistas > 0}
            <span class = "pendientes">{$cantidadNotificacionesNoVistas}</span>
          {/if}
          <ul class = "lstNotificaciones">
            {if $cantidadNotificacionesTotal > 0}
              {foreach from = $notificaciones item = notificacion}
                <li class = "{if $notificacion.vista eq '1'}vista{else}noVista{/if}" onclick = "verNotificacion({$notificacion.codigo}, {$notificacion.codigoIncidencia});">          
                  <div style = "width: 17%; float: left;">
                    {if $notificacion.tipo eq "estado"}
                      <span class = "fa fa-trash" style = "font-size: 38px; margin-right:25px"></span>
                    {else}
                      <span class = "fa fa-comment" style = "font-size: 38px; margin-right:25px"></span>
                    {/if}
                  </div>
                  <div  style = "width: 83%; float: right; margin-top: 1.5px; font-size: 14px; color: black; text-align: left;">{$notificacion.mensaje}</div>
                  <br><br>
                  <span class="subtexto"><span class = "fa fa-clock-o"></span>&nbsp;&nbsp;{$notificacion.fechaHora}</span>
                </li>
              {/foreach}
            {else}
              <li class = "noVista">
                <div style = "width: 100%; text-align: center"><span class = "fa fa-bell-slash" style = "font-size: 38px;"></span></div>
                <div  style = "width: 100%; margin-top: 11px; text-align: center">Sin notificaciones nuevas</div>
              </li>
            {/if}
          </ul>
        </div>
           
      <!--</div>--> 
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
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/misIncidencias" style = "height: auto">Mis incidencias</a></li>
              <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/nuevaIncidencia" style = "height: auto">Nueva incidencia</a></li>
              {if $funcionario eq "true"}
                <li class = "opcionSubmenuIncidencias"><a href = "/Volquetas/incidencia/verTodasLasIncidencias" style = "height: auto">Ver todas las incidencias</a></li>
              {/if}
            </ul>    
          </li>
          <li class = "opcionSubmenu"><a href = "/Volquetas/volqueta/estadisticas"><span class = "fa fa-bar-chart"></span>&nbsp;&nbsp;Estadísticas</a></li>
          <li class = "opcionSubmenu" id = "opcionUsuarios"><a><span class = "fa fa-user"></span>&nbsp;&nbsp;Usuarios&nbsp;&nbsp;<span class = "fa fa-chevron-down" id = iconoDesplegarUsuarios></span></a>
            <ul class = "submenu submenuUsuarios">
              <li class = "opcionSubmenuUsuarios"><a href = "/Volquetas/usuario/verPerfil" style = "height: auto">Mi perfil</a></li>
              {if $funcionario eq "true"}
               <li class = "opcionSubmenuUsuarios"><a href = "/Volquetas/usuario/signup" style = "height: auto">Agregar funcionario</a></li>
              {/if}
            </ul> 
          </li>
          <li class = "opcionSubmenu" {if $tipo eq "google"}onclick = "LogOutGoogle();"{else}onclick = "logout();"{/if}><a><span class = "fa fa-sign-out"></span>&nbsp;&nbsp;Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  {/if}
  <div class = "contenedorNegro">  
    <div class = "btnCerrar"><span class = "fa fa-times-circle-o"></span></div>
    <div class = "listaNotificaciones">
      <ul class = "lstNotificaciones2">
        {if $cantidadNotificacionesTotal > 0}
          {foreach from = $notificaciones item = notificacion}
            <li class = "{if $notificacion.vista eq '1'}vista{else}noVista{/if}" onclick = "verNotificacion({$notificacion.codigo}, {$notificacion.codigoIncidencia});">          
              <div style = "width: 17%; float: left;">
                {if $notificacion.tipo eq "estado"}
                  <span class = "fa fa-trash" style = "font-size: 38px; margin-right:25px"></span>
                {else}
                  <span class = "fa fa-comment" style = "font-size: 38px; margin-right:25px"></span>
                {/if}
              </div>
              <div  style = "width: 83%; float: right; margin-top: 1.5px; font-size: 14px; color: black; text-align: left;">{$notificacion.mensaje}</div>
              <br><br>
              <span class="subtexto"><span class = "fa fa-clock-o"></span>&nbsp;&nbsp;{$notificacion.fechaHora}</span>
            </li>
          {/foreach}
        {else}
          <li class = "noVista">
            <div style = "width: 100%; text-align: center"><span class = "fa fa-bell-slash" style = "font-size: 38px;"></span></div>
            <div  style = "width: 100%; margin-top: 11px; text-align: center">Sin notificaciones nuevas</div>
          </li>
        {/if}
      </ul>
    </div>
  </div> 
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