@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Agrega una nueva categoria de producto</legend>
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
                            <input id="name" name="name" type="text" placeholder="Nombre de la categoria" class="form-control input-md" value="{{ old('name') }}" required="">

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Guardar categoria</label>
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection