@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <form action="{{ route('employees.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Agrega un nuevo empleado</legend>
                    <a href="{{ route('employees.index') }}" class="btn btn-default pull-right">Regresar</a>

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
                        <label class="col-md-4 control-label" for="first_name">Nombre</label>
                        <div class="col-md-4">
                            <input id="first_name" name="first_name" type="text" placeholder="Escribe el nombre" class="form-control input-md" value="{{ old('first_name') }}" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="last_name">Apellido paterno</label>
                        <div class="col-md-4">
                            <input id="last_name" name="last_name" type="text" placeholder="Escribe el primer apellido" class="form-control input-md" value="{{ old('last_name') }}" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="maiden_name">Apellido materno</label>
                        <div class="col-md-4">
                            <input id="maiden_name" name="maiden_name" type="text" placeholder="Escribe el segundo apellido" class="form-control input-md" value="{{ old('maiden_name') }}" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="salary">Salario</label>
                        <div class="col-md-4">
                            <input id="salary" name="salary" type="number" placeholder="Sueldo del empleado" class="form-control input-md" value="{{ old('salary') }}" required="">

                        </div>
                    </div>

                    <!-- Date picker-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="date_of_hire">Fecha de contratación</label>
                        <div class="col-md-4">
                            <input id="date_of_hire" name="date_of_hire" type="date" class="form-control input-md" value="{{ old('date_of_hire') }}" required="">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="branch">Sucursal</label>
                        <div class="col-md-4">
                            <select id="branch" name="branch" class="form-control">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="position">Puesto de empleado</label>
                        <div class="col-md-4">
                            <select id="position" name="position" class="form-control">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Guardar empleado</label>
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection