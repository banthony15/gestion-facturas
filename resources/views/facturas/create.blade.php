<!-- Modal -->
<div class="modal fade" id="generarFactura" tabindex="-1" aria-labelledby="generarFactura" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="generarFactura">Comprar Productos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <div class="card">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <span class="navbar-text">
                                Usuarios con facturas por generar
                            </span>
                        </div>
                    </nav>
                </div>
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>                        
                        <th scope="col">Usuario</th>                                                                    
                        <th scope="col">Acciones</th> 
                    </tr>
                </thead>
                <tbody>                
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{$usuario->id}}</th>
                        <td>{{$usuario->name}}</td>                        
                        {{-- <td>{{round($compra->producto->precio*$compra->producto->impuesto/100+$compra->producto->precio, 2)}}</td>--}}
                        <td align="center">
                            {!! Form::open(['route'=>'facturas.store']) !!}
                                {!! Form::hidden('cliente', $usuario->id) !!}
                                {!! Form::submit('Generar', ['class'=>'btn btn-sm btn-info text-white']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>