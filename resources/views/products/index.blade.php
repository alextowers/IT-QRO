@extends('layouts.app') 

@section('content')
    @if (Auth::user())
        @include('layouts.__admin_nav')
    @endif
    <div class="container-fluid" id="filtersContainer">
        <div class="container">
            <form action="{{ route('products.index') }}" method="GET" class="form-row">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="type">Categoría:</label>
                    <select name="category" id="category" class="form-control" required="required">
                        <option value="none">Selecciona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Precio:</label>
                    <select name="price" id="price" class="form-control" required="required">
                        <option value="none">Ordena por precio del producto</option>
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
            @if (count($products) != 0) 
                @foreach ($products as $product)
                    <div class="col-sm-6 product-container">
                        <div class="row">
                            <div class="col-xs-6">
                                <img src="{{ Storage::url($product->image) }}" class="product-image">
                            </div>
                            <div class="col-xs-6">
                                <p class="product-title">{{ $product->name }}</p>
                                <p>{{ $product->description }}</p>
                                <a href="{{ route('products.show', $product->id) }}"><button type="button" class="btn btn-info btn-block">Detalles</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger" role="alert">
                    No hay productos en la base de datos, agregue un nuevo producto
                </div>
            @endif
        </div>
        {{ $products->links() }}
    </div>
@endsection