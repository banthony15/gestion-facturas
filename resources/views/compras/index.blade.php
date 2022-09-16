@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <table class="table table-bordered">
                <div class="card">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <span class="navbar-text">
                                Mis Compras
                            </span>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#comprar">+Comprar</button>
                        </div>
                    </nav>
                </div>
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>                        
                        <th scope="col">Precio</th>                                                
                        <th scope="col">Precio sin impuesto</th> 
                        <th scope="col">Estatus</th> 
                        <th scope="col">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                    <tr>
                        <th scope="row">{{$compra->id}}</th>
                        <td>{{$compra->producto->nombre}}</td>
                        <td>{{$compra->producto->precio}}</td>
                        <td>{{round($compra->producto->precio*$compra->producto->impuesto/100+$compra->producto->precio, 2)}}</td>      
                        @if ($compra->procesada == 0)
                            <td>Compra no procesada</td>                             
                        @elseif($compra->procesada == 1)
                            <td>Venta procesada</td> 
                        @endif                                
                        <td align="center">
                            @if ($compra->procesada == 0)
                                {!! Form::open(['route' => ['compras.destroy', $compra->id], 'method'=>'DELETE']) !!}
                                    {{Form::submit('Eliminar', ['class'=>'btn btn-sm btn-danger']) }}                                
                                {!! Form::close() !!}
                            @elseif($compra->procesada == 1)
                                {{Form::submit('Eliminar', ['class'=>'btn btn-sm btn-secondary','disabled']) }}
                            @endif

                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('compras.create')
@endsection
