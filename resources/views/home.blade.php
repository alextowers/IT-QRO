@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
<div class="container">
    <h1 class="text-center">Panel de Control</h1>
    <h3 class="text-center">Opciones rapidas del sistema</h3>
    <div>
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#products" aria-controls="home" role="tab" data-toggle="tab">Productos</a></li>
            <li role="presentation"><a href="#employes" aria-controls="profile" role="tab" data-toggle="tab">Empleados</a></li>
            <li role="presentation"><a href="#clients" aria-controls="messages" role="tab" data-toggle="tab">Clientes</a></li>
        </ul>
        <div class="tab-content styled-tab">
            <div role="tabpanel" class="tab-pane active" id="products">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar producto</a>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Agregar categoría</a>
            </div>
            <div role="tabpanel" class="tab-pane" id="employes">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Agregar empleado</a>
                <a href="{{ route('positions.create') }}" class="btn btn-primary">Agregar puesto</a>
            </div>
            <div role="tabpanel" class="tab-pane" id="clients">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar cliente</a>
            </div>
        </div>
    </div>
</div>
@endsection
