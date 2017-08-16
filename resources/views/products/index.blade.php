@extends('layouts.app') @section('content')
<div class="container-fluid" id="filtersContainer">
    <div class="container">
        <form action="{{ route('products.index') }}" method="GET" class="form-row">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="type">Categoría:</label>
                <select name="category" id="category" class="form-control" required="required">
                    @foreach ($category as $row)
                    <option value="{{ $row->id }}">{{ ucwords($row->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Precio:</label>
                <select name="price" id="price" class="form-control" required="required">
                    <option value="asc">Mas bajo a mas alto</option>
                    <option value="desc">Mas alto a mas bajo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
            @if (Auth::user())
            <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar producto</a>
            @endif
        </form>
    </div>
</div>
<div class="container">
    <h1>Productos <span class="text-muted">Agregue un filtro para una mejor búsqueda</span></h1>
    <hr>
    <div class="row">
    @if ($data)
        @foreach ($data as $row)
        <div class="col-sm-6 product-container">
            <div class="row">
                <div class="col-xs-6">
                    <img src="{{ Storage::url($row->image) }}" class="product-image">
                </div>
                <div class="col-xs-6">
                    <p class="product-title">{{ $row->name }}</p>
                    <p>{{ $row->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
            No hay productos en la base de datos
        </div>
    @endif
    </div>
</div>
@endsection