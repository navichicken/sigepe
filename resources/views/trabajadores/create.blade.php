<div class="modal fade" id="modal_create_user" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Nuevo usuario</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('trabajadores.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="box box-success">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group @error('nombres') has-error @enderror">
                        <label for="nombres">Nombres</label>
                        <input id="nombres" type="text" class="form-control" name="nombres"
                          placeholder="Ingrese sus nombres" required>
                        @error('nombres')
                        <span class="help-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('dni') has-error @enderror">
                        <label for="dni">DNI</label>
                        <input id="dni" type="text" class="tuiker form-control"
                          value="{{ old('dni') }}" name="dni"
                          placeholder="Ingrese el numero de dni" required pattern="^[0-9]{8}">
                        @error('dni')
                        <span class="help-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group @error('apellido_materno') has-error @enderror">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input id="apellido_materno" type="text" class="form-control"
                          name="apellido_materno" placeholder="Ingrese el apellido materno"
                          required>
                        @error('apellido_materno')
                        <span class="help-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('apellido_paterno') has-error @enderror">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input id="apellido_paterno" type="text" class="form-control"
                          name="apellido_paterno" placeholder="Ingrese el apellido paterno"
                          required>
                        @error('apellido_paterno')
                        <span class="help-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-success">
                <div class="box-body">
                  <div class="form-group @error('email') has-error @enderror">
                    <label for="email">Correo Personal</label>
                    <input  type="email" class="form-control" name="email"
                      placeholder="Ingrese el correo">
                    @error('email')
                    <span class="help-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group @error('telefono') has-error @enderror">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" type="text" class="form-control" name="telefono"
                          placeholder="Ingrese el telefono">
                        @error('telefono')
                        <span class="help-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('genero') has-error @enderror">
                        <label for="genero">Genero</label>
                        <div class="form-inline">
                          <div class="radio">
                            <label>
                              <input type="radio" name="genero" value="1">
                              Masculino
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="genero" value="2">
                              Femenino
                            </label>
                          </div>
                        </div>
                        @error('genero')
                        <span class="help-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
           <div class="form-group">
             <button type="submit" class="btn btn-md btn-success">
               <em class="fa fa-save"> </em>
               Guardar usuario
             </button>
           </div>
         </div>
        </form>
      </div>
    </div>
  </div>
</div>
