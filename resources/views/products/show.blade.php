@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Detalles del producto</h1>
            <div class="pull-right">
                <a href="{{ route('products.index') }}" class="btn btn-default">Regresar</a>
            </div>
            <div class="col-sm-12 product-container">
                <div class="row">
                    <div class="col-xs-6">
                        <img src="{{ Storage::url($product->image) }}" class="product-image-large">
                    </div>
                    <div class="col-xs-6">
                        <p class="product-title">{{ $product->name }}</p>
                        <p>SKU: {{ $product->sku }}</p>
                        <p>{{ $product->description }}</p>
                        <p>Precio: ${{ number_format($product->price, 2) }}</p>
                        <p>Categoria: {{ ucwords($product->category->name) }}</p>
                        <p>Lo encuentras en las sucursales:</p>
                        <ul>
                            @foreach ($product->branches as $branch)
                                <li>{{ $branch->name }} - {{ $branch->address }}</li>
                            @endforeach
                        </ul>
                        @if (Auth::user())
                            <div class="col-xs-3">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-block">Editar</a>
                            </div>
                            <div class="col-xs-3">
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection