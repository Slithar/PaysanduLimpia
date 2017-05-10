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
	<div class = "wrapper">
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
	 	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCambiarContrasenia">Cambiar contraseña</button>
		 <button type="button" class="btn btn-success">Modificar</button>
		<!-- <script src = "js/leafletVerVolquetas.js"></script>  -->	
		<!-- Incluir la vista del footer último. Más abajo no debe haber más código -->	
		{include file = "footer.tpl"}
	</div>
	{include file = "cambiarContrasenia.tpl"}
</body>

</html>