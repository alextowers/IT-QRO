@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <h1>Clientes <span class="text-muted">Listado de los clientes de la empresa</span></h1>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar cliente</a>
            <hr>
        </div>
        <div class="row">
            @if (count($clients) != 0) 
                <table class="table table-condensed">
                    <tr>
                        <th>Nombre de la empresa</th>
                        <th>RFC</th>
                        <th>Contacto</th>
                        <th>Opciones</th>
                    </tr>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->rfc }}</td>
                            <td>{{ $client->contact }}</td>
                            <td>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-block">Editar</a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="post">
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
                    No hay clientes en la base de datos, agregue un nuevo cliente
                </div>
            @endif
        </div>
        {{ $clients->links() }}
    </div>
@endsection