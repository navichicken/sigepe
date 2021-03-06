<div>
  <div>
    <div class="box">
      <div class="box-body">
        <table id="tabla-trabajadores" class="table table-bordered table-striped">
        <caption>Tabla de trabajadores</caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">DNI</th>
              <th scope="col">Nombres</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Telefono</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($trabajadores as $trabajador)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$trabajador->dni}}</td>
                <td>{{$trabajador->nombres}}</td>
                <td>{{$trabajador->apellido_paterno}}</td>
                <td>{{$trabajador->telefono}}</td>
                <td>
                  <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-show-trabajador"
                            data-id="{{$trabajador->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>
                  </button>
                  <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit-trabajador"
                            data-id="{{$trabajador->id}}">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
                  @if(!$trabajador->hasAccount())
                  <form style="display:inline" method="POST" action="{{ route('trabajadores.destroy', $trabajador->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                  
                  <button class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal-create-user"
                    data-trabajador_id="{{$trabajador->id}}">
                    <span class="fa fa-fw fa-user-plus"></span>
                  </button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end box -->
  </div>
</div><!-- end row -->