<div class="modal fade" id="modal-rechazar-solicitud" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('comprarInsumos.rejectSolicitud') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" id="id-insumo_proveedor" name="id_insumo_proveedor">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <span>Rechazar Solicitud</span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div style="text-align: center; font-size: 25px !important">
                  <span class="fa fa-close"></span>
                </div>
                <div style="margin: 16px; font-size: 14px;">
                  <p>La solicitud de insumos será rechazada y ya no estará disponible en la lista de solicituds de insumos.</p>
                  <p><span style="font-size: 14px; color: red;">* Tenga en cuenta que solo quedan <span id="cantidad-insumos">00</span> insumos de este tipo en stock.</span></p>         
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove-sign"></span>
                Rechazar pedido
              </button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span>
                Cancelar
              </button>
            </div>
        </form>
    </div><!-- /.modal-dialog -->
</div>
