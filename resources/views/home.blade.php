@extends('layouts.main')
@section('title','Dashboard')

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="#" class="text-muted">Inicio</a></li>
</ol>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card">
        <div class="card-header">
          <h2>Panel de Control</h2>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
          <div class="row">
            @if( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('AtencionCliente'))
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$array['npedido']}}</h3>
                  <p>Pedidos totales</p>
                </div>
                <div class="icon">
                  <em class="fa fa-shopping-cart"></em>
                </div>
                <a href="{{route('pedidos.index')}}" class="small-box-footer">Más información &nbsp;<em class="fa fa-arrow-circle-right"></em></a>
              </div>
            </div>
          @endif
          @if( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('JefeProduccion'))
            <!-- ./col -->            
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3>{{$array['ncategoria']}}<sup style="font-size: 20px"></sup></h3>
                  <p>Número de Categorias</p>
                </div>
                <div class="icon">
                  <em class="fa fa-tasks"></em>
                </div>
                <a href="{{route('categorias.index')}}" class="small-box-footer">Más información &nbsp;<em class="fa fa-arrow-circle-right"></em></a>
              </div>
            </div>
          @endif
          @if( Auth::user()->hasRole('Admin'))
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3>{{$array['nusuario']}}</h3>
                  <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                  <em class="fa fa-users"></em>
                </div>
                <a href="{{route('trabajadores.index')}}" class="small-box-footer">Más información &nbsp;<em class="fa fa-arrow-circle-right"></em></a>
              </div>
            </div>
          @endif
          @if( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('JefeCompras'))
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{$array['nproveedor']}}</h3>
                  <p>Proveedores de la empresa</p>
                </div>
                <div class="icon">
                  <em class="fa fa-truck"></em>
                </div>
                <a href="{{route('proveedores.index')}}" class="small-box-footer">Más información &nbsp;<em class="fa fa-arrow-circle-right"></em></a>
              </div>
            </div>
          @endif
          @if( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('JefeProduccion'))
            <!-- ./col -->
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{$array['nproductos']}}</h3>
                  <p>Productos en stock</p>
                </div>
                <div class="icon">
                  <em class="fa fa-tags"></em>
                </div>
                <a href="{{route('productos.index')}}" class="small-box-footer">Más información &nbsp;<em class="fa fa-arrow-circle-right"></em></a>
              </div>
            </div>
          @endif
            <!-- ./col -->
          @if( !Auth::user()->hasRole('AtencionCliente'))
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-gray">
                <div class="inner">
                  <h3>{{$array['ninsumo']}}</h3>
                  <p>Insumos en stock</p>
                </div>
                <div class="icon">
                  <em class="glyphicon glyphicon-cog"></em>
                </div>
                <a href="{{route('revisarStock.index')}}" class="small-box-footer">Más información &nbsp;<em class="fa fa-arrow-circle-right"></em></a>
              </div>
            </div>
          @endif
            <!-- ./col -->
          </div> <!-- end.row-->
        </div> <!-- end.card-body-->
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $('#sidebar-btn-panel-control').addClass("active");
</script>
@endsection
