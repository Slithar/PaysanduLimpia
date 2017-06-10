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
			<div class = "contenedor">
				<form id = "frmVerIncidencia" method = "POST" action = "/Volquetas/incidencia/agregarFotos"  enctype="multipart/form-data">
					<input type = "hidden" name = "codigo" value = "{$codigo}" id = "codigo">
					<div class = "contenedorIncidencia" style = "height: 75px; margin-top: 15px; padding: 25px 45px; box-sizing: border-box;">
						<div id = "imagenReportador">
							<img src = "{$imagenPerfil}" style = "width:59px; height: 59px; border-radius: 50%; float: left; margin-top: -17px;"/>
						</div> 
						<div style = "width: calc(100% - 75px); float: right; font-size: 16px; margin-top: 5px">							
							Incidencia reportada por <b>{$nombreIncidencia}</b>
						</div>
					</div>		
					<div class = "contenedorIncidencia" style = "height:400px; margin-top: 50px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Información básica</p>
						<br>
						<img class = "imagenVerIncidencia" src = "img/Volquetas/{$numeroVolqueta}.png"/>
						<table style = "float:left; width: 68%; margin-top: 0px">
							<tr>
								<td colspan = "3" style = "font-size: 18px; font-weight: bold;">Código de incidencia: {$codigo}</td>
								
							</tr>
							<br>
							<tr>
								<td class = "col1"><br><br><b>Número de volqueta:</b><br>{$numeroVolqueta}</td>
								<td class = "col2"><br><br><b>Dirección:</b><br>{$direccion}</td>
								<td class = "col3"><br><br><b>¿Corrida?</b><br>{if $ubicacionCorrecta eq "1"}No{else}Sí{/if}</td>
							</tr>
							<tr>
								<td class = "col1"><br><b>Fecha y hora de reporte:</b><br>{$fecha}</td>
								<td class = "col2"><br><b>Severidad:</b><br>{$severidad}</td>
								<td class = "col3"><br><b>Categoría:</b><br>{$categoria}</td>
							</tr>
							<tr>
								<td class = "col1"><br><b>Fecha y hora de solución:</b><br>{$fechaSolucion}</td>
								<td colspan = "2" style = "font-size: 18px; font-weight: bold;">Estado: <span class = "incidencia{$estado}">{$estado}</span></td>
							</tr>
						</table>
					</div>		
					<div class = "contenedorIncidencia" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Datos adicionales</p>
						<br><br>
						<div class = "form-group" id = "divDescripcion">
							<label>Descripción:</label>
							<div style = "width: 100%; height: auto; max-height: 250px; overflow-y: auto; text-align: justify;">
								{$descripcion}
							</div>
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
					</div>
					<div class = "contenedorIncidencia" style = "height:auto; margin-top: 40px; padding: 25px 45px; box-sizing: border-box;">
						<p style = "font-size: 24px; color: #0F3EA1; font-weight: bold; text-align: center;">Comentarios</p>
						<br><br>
						<div id = "divComentarios">
							{if $cantidadComentarios eq 0}
								<div style = "border-bottom: 2px solid #D8D8D8; height: 75px; text-align: center; padding-top: 25px; box-sizing: border-box;">
									<p style = "font-size: 14px;">No hay comentarios para esta incidencia</p>								
								</div>
							{else}
								{foreach from = $todosLosComentarios item = c}
									<div style = "border-bottom: 2px solid #D8D8D8; padding-top: 25px; box-sizing: border-box; height: auto;">
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
						<div style = "height: 210px;">
							<div>
								<img src = "{$fotoPerfil}" style = "width:80px; height: 80px; border-radius: 50%; float: left; margin-top: 25px"/>
							</div> 
							<form>
								<div class = "form-group">
									<textarea style = "width: calc(100% - 125px); float: right; margin-top: 25px; min-height: 80px; max-height: 125px;" class = "form-control" placeholder="Escribe tu comentario" id = "txtComentario"></textarea>		
								</div>					
								<button class = "btn btn-success" style = "width: 15%; float: right; margin-top: 25px;" id = "btnComentar"><span class = "fa fa-comment"></span>&nbsp;&nbsp;Comentar</button>
							</form>
						</div>
						<div id = "contenedorAlert">							
							<div class = "alert alert-danger" id = "alertComentario" style = "display:none;">
								<strong>ERROR: </strong>No se ha ingresado comentario
							</div>
						</div>
					</div>
				</form>
					
			</div>
				}
		</div>
		{include file = "footer.tpl"}
	</div>
	
	<div class = "fondoNegro" id = "fondoNegro">
		<span class = "fa fa-times-circle-o" id = "btnCerrar"></span>
		<img src = "img/img1.jpg" id = "imgModal"/>
	</div>
</body>
</html>