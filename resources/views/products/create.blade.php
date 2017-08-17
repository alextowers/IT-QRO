@extends('layouts.app') 
@section('content') 

@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <form action="{{ route('products.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Agrega un nuevo producto</legend>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="sku">SKU</label>
                        <div class="col-md-4">
                            <input id="sku" name="sku" type="text" placeholder="Clave de catalogo" class="form-control input-md" value="{{ old('sku') }}" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Nombre</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" placeholder="Nombre comercial del producto" class="form-control input-md" value="{{ old('name') }}" required="">

                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Descripción</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">Precio</label>
                        <div class="col-md-4">
                            <input id="price" name="price" type="number" placeholder="Digita su costo" class="form-control input-md" value="{{ old('price') }}" required="">

                        </div>
                    </div>

                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="image">Incluye una imagen</label>
                        <div class="col-md-4">
                            <input id="image" name="image" class="input-file" type="file">
                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="category">Categoria</label>
                        <div class="col-md-4">
                            <select id="category" name="category" class="form-control">
                                <option value="null">Selecciona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="branch">Sucursales</label>
                        <div class="col-md-4">
                            @foreach ($branches as $branch)
                                <label class="checkbox-inline" for="branch-{{ $branch->id }}">
                                    <input type="checkbox" name="branch[]" id="branch-{{ $branch->id }}" value="{{ $branch->id }}">
                                    {{ $branch->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Guardar producto</label>
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection