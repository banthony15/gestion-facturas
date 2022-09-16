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
                                Productos
                            </span>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"  data-bs-target="#exampleModal">  +Registrar </button>
                        </div>
                    </nav>
                </div>
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio sin impuesto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Impuesto</th>
                        <th scope="col">Accciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <th scope="row">{{$producto->id}}</th>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{round($producto->precio*$producto->impuesto/100+$producto->precio, 2)}}</td>
                        <td>{{$producto->impuesto}}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method'=>'DELETE']) !!}

                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"  data-bs-target="#editar{{$producto->id}}">Editar</button>                                
                                {{Form::submit('Eliminar', ['class'=>'btn btn-sm btn-danger']) }}                                

                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @include('productos.edit')
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('productos.create')
@endsection
