<!-- Modal -->
<div class="modal fade" id="editar{{$producto->id}}" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Edit">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {!! Form::model($producto,['route' => ['productos.update',$producto->id], 'method'=>'PUT']) !!}

            <div class="modal-body">
              <div class="row container-fluid">
                  <div class="form-group">
                      <label>Nombre</label>
                      {{ Form::text('nombre', $producto->nombre, ['class'=>'form-control', 'required'=>'required']) }}
                  </div>
                  <div class="form-group">
                      <label>Precio</label>
                      {{ Form::text('precio', $producto->precio, ['class'=>'form-control', 'required'=>'required']) }}
                  </div>
                  <div class="form-group">
                      <label>Impueto</label>
                      {{ Form::number('impuesto', $producto->impuesto, ['class'=>'form-control', 'required'=>'required']) }}
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              {{-- <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button> --}}
              {{Form::submit('Actualizar', ['class'=>'btn btn-sm btn-primary']) }}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>