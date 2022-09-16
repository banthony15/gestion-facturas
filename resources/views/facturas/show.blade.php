@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <table class="table table-bordered ">
                <div class="card">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <span class="navbar-text">
                                Cliente: {{$usuarios[0]['name']}}
                            </span>
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#comprar">+Generar Factura</button> --}}
                            {{--    <a class="btn btn-primary btn-sm" href="{{ route('facturas.create') }}">+Generar Factura</a> --}}
                        </div>
                    </nav>
                </div>
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th> 
                        <th scope="col">Producto</th>                        
                        <th scope="col">Precio</th>                                                
                        <th scope="col">Impuesto %</th> 
                        {{-- <th scope="col">Fecha de la compra</th>  --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas_generadas as $factura_g)
                    <tr>                        
                        <th scope="row">{{$factura_g->id}}</th>
                        <td>{{$factura_g->compra_factura->producto->nombre}}</td>
                        <td>{{$factura_g->compra_factura->producto->precio}}</td>
                        <td>{{$factura_g->compra_factura->producto->impuesto}}</td>
                        {{-- <td>{{$factura_g->compra_factura->created_at}}</td>                             --}}
                    </tr>                    
                    @endforeach
                </tbody>
                <tbody>
                    
                    <tr align="center" style="margin: 0px auto;">                        
                        <th class="table-light" colspan="2">Montos</th>
                        <th>Montal total: {{$sumatoriaPrecio}}</th>                          
                        <th>Impuesto total: {{$sumatoriaImpuesto}}</th>
                    </tr>                    
                    <tr align="center" style="margin: 0px auto;">
                        <th class="table-light" colspan="2">Sumatoria Final:</th>
                        <th colspan="2">{{$sumatoriaPreciofinal}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection