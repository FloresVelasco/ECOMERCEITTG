@extends('layout.general')


@section('breadcumb')
<li class="breadcrumb-item" ><a href="/tablero">Tablero</a></li>
<li class="breadcrumb-item"><a href="/Usuarios">Usuarios</a></li>
<li class="breadcrumb-item active" aria-current="page">Listar</li>
@endsection


@section('content')
@if (session('mensaje'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<a href="Usuarios/create" class="btn btn-primary form-control" >Agregar Usuario</a>
<table border="1" class="table table-striped">
<thead class="thead-dark">
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Acciones</th>
</thead>
<tbody class="thead-light">
    @forelse ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_paterno}}</td>
            <td>{{$usuario->rol}}</td>
            <td>
                <a href="/Usuarios/{{$usuario->id}}/edit" class="btn btn-success">Editar</a>
                <a href="/Usuarios/{{$usuario->id}}" class="btn btn-warning">Mostrar</a>
                <form action="/Usuarios/{{$usuario->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>    
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Sin usuarios registrados</td>
        </tr>
    @endforelse
</tbody> 
</table>
@endsection