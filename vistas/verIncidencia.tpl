<!DOCTYPE html>
<html>
<head>
	<base href = "/Volquetas/">
	{include file = "bs_js.tpl"}
	<title>{$location} - Paysandú Limpia</title>
	<link rel = "stylesheet" href = "css/incidencia_volquetas.css"/>
	<script src = "js/signup_functions.js"></script>
</head>
<body>

	<div class = "wrapper">
		{include file = "header.tpl"}
		<div id = "main" class = "{$classMain} {$classLogueado}">
			<div class = "contenedor contenedorVerIncidencia">
				<div class="alert alert-success" style="display: {if $success eq "si"}block;{else}none;{/if}">
					<strong>¡ÉXITO!</strong>&nbsp;&nbsp;Los cambios han sido realizado de manera correcta
				</div>
				<form id = "frmVerIncidencia" method = "POST" action = "/Volquetas/incidencia/agregarFotos"  enctype="multipart/form-data">
					<input type = "hidden" name = "codigo" value = "{$codigo}" id = "codigo">
					<div class = "contenedorIncidencia contenedorVerIncidenciaDatos" id = "contenedorInformacionIncidencia">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Información básica</p>
						<br>
						<img class = "imagenVerIncidencia" src = "img/Volquetas/{$numeroVolqueta}.png"/>
						<table class = "tableDatosIncidencia1" style = "float:left; width: 68%; margin-top: 0">
							<tr>
								<td colspan = "2" style = "font-size: 18px; font-weight: bold;">Código de incidencia: {$codigo}</td>
								<td style = "font-size: 18px; font-weight: bold;">Estado: <span class = "incidencia{$estado}">{$estado}</span></td>
							</tr>
							<br>
							<tr>
								<td class = "col1"><br><br><b>Número de volqueta:</b><br>{$numeroVolqueta}</td>
								<td class = "col2"><br><br><b>Dirección:</b><br>{$direccion}</td>
								<td class = "col3"><br><br><b>¿Corrida?</b><br>{if $ubicacionCorrecta eq "1"}No{else}Sí{/if}</td>
							</tr>
							<tr>
								<td class = "col1"><br><b>Severidad:</b><br>{$severidad}</td>
								<td colspan = "2" class = "col2"><br><b>Categoría:</b><br>{$categoria}</td>
							</tr>
							<tr>								
								<td class = "col1"><br><b>Fecha y hora de reporte:</b><br>{$fecha}</td>
								<td colspan = "2" class = "col2"><br><b>Fecha y hora de solución:</b><br>{$fechaSolucion}</td>
							</tr>
						</table>
						<table class = "tableDatosIncidencia2">
							<tr style = "width: 100%">
								<td colspan = "2" style = "font-size: 18px; font-weight: bold;">Código de incidencia: {$codigo}</td>
								<td style = "font-size: 18px; font-weight: bold;">Estado: <span class = "incidencia{$estado}">{$estado}</span></td>
							</tr>
							<tr style = "width: 100%">
								<td><br><br><b>Número de volqueta:</b><br>{$numeroVolqueta}</td>
								<td><br><br><b>Dirección:</b><br>{$direccion}</td>
							</tr style = "width: 100%">
							<tr>								
								<td><br><br><b>¿Corrida?</b><br>{if $ubicacionCorrecta eq "1"}No{else}Sí{/if}</td>
								<td><br><b>Severidad:</b><br>{$severidad}</td>
								<td><br><b>Categoría:</b><br>{$categoria}</td>
							</tr>
							<tr>								
								<td><br><b>Fecha y hora de reporte:</b><br>{$fecha}</td>
								<td><br><b>Fecha y hora de solución:</b><br>{$fechaSolucion}</td>
								<td><br><button type = "button" class = "btn btn-primary" id = "btnVolqueta" style = "width: 100%;"><span class = "fa fa-trash"></span>&nbsp;&nbsp;Ver volqueta</button></td>
							</tr>
						</table>
					</div>		
					<div class = "contenedorIncidencia contenedorVerIncidenciaDatos" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Datos adicionales</p>
						<br><br>
						<div class = "form-group" id = "divDescripcion">
							<label>Descripción:</label>
							{if $estado eq "Pendiente"}
								<textarea id = "descripcion" class = "form-control" name = "descripcion">{$descripcion}</textarea>
							{else}
								<div style = "width: 100%; height: auto; max-height: 250px; overflow-y: auto; text-align: justify;">
									{$descripcion}
								</div>
							{/if}
						</div>						
						<br><br><br><br>
						<label>Fotos y/o imágenes:</label>
						
						{if $cantidadImagenes eq 0}
							<br>
							Sin imágenes
							<br><br>
						{else}
							<ul class = "galeria" style = "margin-bottom: 0; margin-top: 0">
								{foreach from = $imagenes item = imagen}
									<li class = "galeria_item" style = "width: 20.5%"><img src = "{$imagen.rutaImagen}" class = "galeria_img"/></li>
								{/foreach}
							</ul>
						{/if}
						{if $estado eq "Pendiente"}
							<label class="btn btn-default btn-file" id ="lblBuscarVerIncidencia">
							    <span class = "fa fa-folder"></span>&nbsp;&nbsp;<b>Buscar</b><input type="file" multiple="true" name = "imagenes[]" id = "fileImagen" onchange = "readURLIncidencia(this);" accept="image/jpg,image/png,image/jpg,image/gif,image/jpg,image/jpeg,image/bmp"/>
							</label>

							<label class="btn btn-default btn-file" id ="lblSubir"><span class = "fa fa-upload"></span>&nbsp;&nbsp;<b>Subir</b></label>
							<br><br>
							<ul class = "galeria" id = "galeriaFotosNuevas" style = "margin-bottom: 0; margin-top: 0">
							</ul>
						{/if}
					</div>
					<div class = "contenedorIncidencia contenedorVerIncidenciaDatos" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Comentarios</p>
						<br><br>
						<div id = "divComentarios">
							{if $cantidadComentarios eq 0}
								<div style = "height: 75px; text-align: center; padding-top: 25px; box-sizing: border-box;">
									<p style = "font-size: 14px;">No hay comentarios para esta incidencia</p>								
								</div>
							{else}
								{foreach from = $todosLosComentarios item = c}
									<div style = "padding-top: 25px; box-sizing: border-box; height: auto;" class = "divComentariosVerIncidencia">
										<div class = "contenedorComentario">
											<img src = "{$c.fotoPerfil}" style = "width: 80px; height: 80px; border-radius: 50%;"/>
										</div>
										<div class = "datosComentario">
											<b>{$c.nombreUsuario}</b> | <span style = "font-size: 12px">{$c.fechaHora}</span>
											<br><br>
											{$c.comentario}
										</div>
									</div>
								{/foreach}
							{/if}
						</div>					
					</div>

				</form>
				{if $estado eq "Pendiente"}
					<div style = "width: 100%; margin-top: 75px;">
						<button type = "button" class = "btn btn-danger" id = "btnEliminarIncidencia" onclick = "window.location.href = '/Volquetas/incidencia/eliminarIncidencia/{$codigo}'"><span class = "fa fa-times"></span>&nbsp;&nbsp;<b>Eliminar</b></button>
						<button type = "button" class = "btn btn-success" id = "btnModificarIncidencia"><span class = "fa fa-pencil"></span>&nbsp;&nbsp;<b>Modificar</b></button>
						
					</div>
					<div class = "alert alert-danger fadeIn" style = "margin-top: 200px; display: none;" id = "dangerVerIncidencia">
						<strong>ADVERTENCIA:&nbsp;</strong>No se han completado campos obligatorios
					</div>
				{/if}
					
			</div>
				}
		</div>
		{include file = "footer.tpl"}
	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>

	<div class = "contNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrarContNegro"></span>
		<img src = "img/Volquetas/{$numeroVolqueta}.png" id = "imgVolqueta"/>
	</div>
</body>
</html>