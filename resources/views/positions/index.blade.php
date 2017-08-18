@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <h1>Puestos de empleados <span class="text-muted">Listado de los diferentes cargos en la empresa</span></h1>
            <a href="{{ route('positions.create') }}" class="btn btn-primary">Agregar puesto</a>
            <hr>
        </div>
        <div class="row">
            @if (count($positions) != 0) 
                <table class="table table-condensed">
                    <tr>
                        <th>Nombre puesto</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position->name }}</td>
                            <td>
                                <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-primary btn-block">Editar</a>
                                <form action="{{ route('positions.destroy', $position->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    No hay puestos en la base de datos, agregue un nuevo puesto
                </div>
            @endif
        </div>
        {{ $positions->links() }}
    </div>
@endsection