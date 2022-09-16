<!-- Modal -->
<div class="modal fade" id="comprar" tabindex="-1" aria-labelledby="comprar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="comprar">Comprar Productos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {!! Form::open(['route' => 'compras.store']) !!}
          @include('compras.partials.form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>