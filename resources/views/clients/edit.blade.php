@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Actualiza los datos del cliente: {{ $client->name }}</legend>
                    <a href="{{ route('clients.index') }}" class="btn btn-default pull-right">Regresar</a>

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
                        <label class="col-md-4 control-label" for="name">Nombre de la empresa</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" placeholder="Escribe el nombre" class="form-control input-md" value="{{ $client->name }}">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="rfc">RFC</label>
                        <div class="col-md-4">
                            <input id="rfc" name="rfc" type="text" placeholder="Escribe el RFC" class="form-control input-md" value="{{ $client->rfc }}">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="contact">Contacto</label>
                        <div class="col-md-4">
                            <input id="contact" name="contact" type="text" placeholder="Escribe el nombre del contacto con la empresa" class="form-control input-md" value="{{ $client->contact }}">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="branch">Sucursal (actual: {{ $employee->branch->name }})</label>
                        <div class="col-md-4">
                            <select id="branch" name="branch" class="form-control">
                                <option value="0">Modifica la sucursal</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Guardar cliente</label>
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection