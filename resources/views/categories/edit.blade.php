@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Actualiza los datos de la categoria: {{ $category->name }}</legend>
                    <a href="{{ route('categories.index') }}" class="btn btn-default pull-right">Regresar</a>

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
                        <label class="col-md-4 control-label" for="name">Nombre</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" placeholder="Nombre de la categoria" class="form-control input-md" value="{{ $category->name }}">

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Actualizar categoria</label>
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection