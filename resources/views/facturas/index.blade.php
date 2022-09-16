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
                                Facturas
                            </span>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#generarFactura">+Generar Factura</button>
                            {{-- <a class="btn btn-primary btn-sm" href="{{ route('facturas.create') }}">+Generar Factura</a> --}}
                        </div>
                    </nav>
                </div>
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nro de factura</th>                        
                        <th scope="col">fecha de facturación</th>                                                
                        <th scope="col">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                    <tr>
                        <th scope="row">VENTA-NRO-{{$factura->id}}</th>
                        <td>{{$factura->created_at}}</td>                            
                        <td align="center">
                            <a class="btn btn-info btn-sm" href="{{route('facturas.show',$factura->id)}}">Ver Factura detallada</a>
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- @include('compras.create') --}}
@include('facturas.create')
@endsection
