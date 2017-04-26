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
			<div class = "divContacto">
				<form>
					<label class = "tituloContacto">Contacto</label>
					<input type = "text" class = "form-control campoFooter" placeholder = "Correo electrónico"/>
					<input type = "text" class = "form-control campoFooter" placeholder = "Asunto"/>
					<textarea class = "form-control campoFooter" placeholder = "Mensaje"></textarea>
					<button type="button" class="btn btn-default enviarCorreo">Enviar</button>
				</form>
			</div>
		</div>
	</footer>
{else}
	<footer class = "footerNoLanding" style = "position:fixed;	width: 100%; height: 3.5%; bottom: 0">
		<label class = "lblFooterNoLanding">Sistema para control de estado y asistencia de volquetas recolectoras de residuos | 2017</label>
	</footer>
{/if}