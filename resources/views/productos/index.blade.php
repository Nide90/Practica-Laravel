@extends('layouts.main')
@section('contenido')

    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{route('productos.crearnuevo')}}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                        <div class="alert alert-success">
                                {{session ('info')}}
                        </div> 
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>
                                        {{$producto->description}}
                                    </td>
                                    <td>
                                        {{$producto->price}}
                                    </td>
                                    <td>
                                        <a href="{{route('productos.editar' , $producto->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{$producto->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <form id="delete-{{$producto->id}}" action="{{route('productos.borrado' , $producto->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    </form>
                                    </td>
                                </tr>                                
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        Bienvenido {{auth()->user()->name}}
                        <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Cerrar sesión</a>
                        <form action="{{route('logout')}}" id="logout" method="POST" style="display:none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection