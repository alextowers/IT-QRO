@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <h1>Empleados <span class="text-muted">Listado de los empleados que laboran en la empresa</span></h1>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Agregar empleado</a>
            <hr>
        </div>
        <div class="row">
            @if (count($employees) != 0) 
                <table class="table table-condensed">
                    <tr>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Sucursal</th>
                        <th>Opciones</th>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name . ' ' . $employee->last_name . ' ' . $employee->maiden_name }}</td>
                            <td>{{ $employee->position->name }}</td>
                            <td>{{ $employee->branch->name }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-block">Editar</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
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
                    No hay empleados en la base de datos, agregue un nuevo empleado
                </div>
            @endif
        </div>
        {{ $employees->links() }}
    </div>
@endsection