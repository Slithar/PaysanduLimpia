<!DOCTYPE html>
<html>
<head>
	
	<base href="/Volquetas/">
	{include file="bs_js.tpl"}
	
<!-- La variable $location tendrá el valor de la página a la que vamos. Paysandú Limpia es constante en todas las páginas. -->
	<title>{$location} - Paysandú Limpia</title>
</head>
<body>
	<!-- Incluir la vista del header al principio -->
	
	{include file="header.tpl"}
	Ci:<span class="label label-default">{$ci}</span>
	Nombre: <input type = "text" value = "{$nombre}"/>
	Apellido:<input type = "text" value = "{$apellido}"/>
	Email:<input type = "text" value = "{$email}"/>
	Foto Perfil:<img src="{$fotoPerfil}">
	{if $funcionario eq "0"}
	Tipo:<span class="label label-default">estandar</span>
	{else}
	Tipo:<span class="label label-default">Funcionario</span>
	{/if}
 	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Cambiar contraseña</button>
	 <button type="button" class="btn btn-success">Modificar</button>
	<!-- <script src = "js/leafletVerVolquetas.js"></script>  -->	
	<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
	{include file = "footer.tpl"}
</body>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cambiar contraseña</h4>
      </div>
      <div class="modal-body" style = "padding: 7% 15%; box-sizing: border-box;">
       <b>Contraseña actual:</b><br><input type="password" style = "width:100%" class = "form-control"><br><br>
       <b>Contraseña nueva:</b><br><input type="password" style = "width:100%" class = "form-control"><br><br>
       <b>Confirmar contraseña:</b><br><input type="password" style = "width:100%" class = "form-control"><br><br>
      </div>
      <div class="modal-footer">
      	 <button type="button" class="btn btn-success">Aceptar</button>
      	 <button type="button" class="btn btn-danger">Cancelar</button>
      </div>
    </div>

  </div>
</div>
</html>