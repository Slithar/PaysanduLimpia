{if $landing eq "si"}
	<footer class = "footerLanding">
		<div class = "contenedor">
			<div class = "divInformacion">
				<div class = "informacion">
					<label class = "paysanduLimpia">Paysandú Limpia</label>
					<label class = "sistemaPara">Sistema para control de estado y asistencia de volquetas recolectoras de residuos</label>
					<label class = "anio">2017</label>
				</div>
			</div>
			
			
			<div class = "divInformacion2">
				<div class = "informacion2">
					<label class = "paysanduLimpia">Paysandú Limpia</label>
					<label class = "sistemaPara">Sistema para control de estado y asistencia de volquetas recolectoras de residuos</label>
					<label class = "anio">2017</label>
				</div>
			</div>
			<div class = "divContacto">
				<form id = "formContacto">
					
					<label class = "tituloContacto">Contacto</label>
					<input type = "text" class = "form-control campoFooter" placeholder = "Correo electrónico" name = "correo" id = "correo"/>
					<input type = "text" class = "form-control campoFooter" placeholder = "Asunto" name = "asunto" id = "asunto"/>
					<textarea class = "form-control campoFooter" placeholder = "Mensaje" name = "mensaje" id = "mensaje"></textarea>
					<center><div class="g-recaptcha" data-sitekey="6Le85B8UAAAAAAiydVde9mFTPUpUheJbRUmc1JJm" id = "recaptcha"></div></center><br>
					<button type="button" class="btn btn-default enviarCorreo" id = "btnEnviarCorreo">Enviar</button>
					<div id = "spinnerEnviar">
						<span class = "fa fa-spinner fa-spin"></span>
					</div>
					<div class = "alert" id = "alertContacto" style = "margin-bottom: 50px; display: none;">
						
					</div>
				</form>
			</div>
			
		</div>
	</footer>
{else}
	<footer class = "footerNoLanding">
		<label class = "lblFooterNoLanding">Sistema para control de estado y asistencia de volquetas recolectoras de residuos | 2017</label>
	</footer>
{/if}