@extends('layouts.main')

@section('title','Pedidos')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Pedidos</a></li> 
</ol>
@endsection

@section('content')
<section class="content-header">
    <a href="{{ route('pedidos.create') }}">
      <button class="btn bg-olive pull-left">
      <span class="fa fa-plus"></span> &nbsp; Añadir pedido
      </button>
    </a> 
    <p><br></p>
</section>
<section class="content">
  @include('pedidos.table')
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  $('#sidebar-btn-registrar-pedidos').addClass("active");
  $('#tabla-pedidos').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          },"order": [[ 0, "desc" ]], info:false,
        columnDefs: [
          { orderable: false, targets: -1},
          { searchable: false, targets: [-1]},
          { responsivePriority: 1, targets: [0,-1] },
          { responsivePriority: 2, targets: [1,2] },
          { responsivePriority: 3, targets: 4},
          { responsivePriority: 4, targets: [7] },
          { responsivePriority: 1001, targets: 2 }         
        ]
  });


});
  function confirmarDeletePedido(){
    if(confirm('¿Estás seguro de eliminar el pedido?'))
      return true;
    else
      return false;
    
  }
</script>
@endsection