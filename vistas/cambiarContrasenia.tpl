<div id="modalCambiarContrasenia" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cambiar contraseña</h4>
      </div>
      <form id="formCambiarcontra" action="/Volquetas/usuario/modificarCon" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="modal-body" style = "padding: 4% 7%; box-sizing: border-box;">
          <div class = "container-fluid">
            <form id="cambiarContra">
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="ci" class="control-label"><b>Contraseña actual</b></label><br>
                  <input type="password" style = "width:100%" class = "form-control" name = "contravieja" id="contravieja">
                </div>              
              </div>
              <div class = "row">
                <div class="form-group col-sm-12">
                  <label for="ci" class="control-label" id="contranueva1"><b>Contraseña nueva</b></label><br>
                  <input type="password" style = "width:100%" class = "form-control" name = "contrasenia">
                </div>
              </div>
              <div class = "row">
                <div class="form-group col-sm-12">
                  <label for="ci" class="control-label" id="contranueva2"><b>Confirmar contraseña</b></label><br>
                  <input type="password" style = "width:100%" class = "form-control" name = 'contrasenia2'>
                </div>
              </div>
            </form>
          </div>       
        </div>
        <div class="modal-footer">
           <button type="submit" class="btn btn-success" id ="cambiarPass"><b>Aceptar</b></button>
           <button type="button" class="btn btn-danger" data-dismiss = "modal"><b>Cancelar</b></button>
           <div class="col-sm-12 alert alert-danger" id="alertaContrasenia" style="text-align: center; display: none; margin-top: 30px;">
           </div>
        </div>
        
      </form>
  </div>
  
</div>
