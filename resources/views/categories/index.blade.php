@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <h1>Categorias de producto <span class="text-muted">Listado de las diferentes categorias de los productos</span></h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Agregar categoria</a>
            <hr>
        </div>
        <div class="row">
            @if (count($categories) != 0) 
                <table class="table table-condensed">
                    <tr>
                        <th>Nombre categoria</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-block">Editar</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
                    No hay categorias en la base de datos, agregue una nueva categoria
                </div>
            @endif
        </div>
        {{ $categories->links() }}
    </div>
@endsection