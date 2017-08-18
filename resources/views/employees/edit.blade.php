@extends('layouts.app')

@section('content')
@include('layouts.__admin_nav')
    <div class="container">
        <div class="row">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Actualiza los datos del empleado: {{ $employee->first_name . ' ' . $employee->last_name . ' ' . $employee->maiden_name }}</legend>
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
                            <input id="first_name" name="first_name" type="text" placeholder="Escribe el nombre" class="form-control input-md" value="{{ $employee->first_name }}">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="last_name">Apellido paterno</label>
                        <div class="col-md-4">
                            <input id="last_name" name="last_name" type="text" placeholder="Escribe el primer apellido" class="form-control input-md" value="{{ $employee->last_name }}">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="maiden_name">Apellido materno</label>
                        <div class="col-md-4">
                            <input id="maiden_name" name="maiden_name" type="text" placeholder="Escribe el segundo apellido" class="form-control input-md" value="{{ $employee->maiden_name }}">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="salary">Salario</label>
                        <div class="col-md-4">
                            <input id="salary" name="salary" type="number" placeholder="Sueldo del empleado" class="form-control input-md" value="{{ $employee->salary }}">

                        </div>
                    </div>

                    <!-- Date picker-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="date_of_hire">Fecha de contratación</label>
                        <div class="col-md-4">
                            <input id="date_of_hire" name="date_of_hire" type="date" class="form-control input-md" value="{{ $employee->date_of_hire }}">

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

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="position">Puesto de empleado (actual: {{ $employee->position->name }})</label>
                        <div class="col-md-4">
                            <select id="position" name="position" class="form-control">
                                <option value="0">Modifica el puesto del empleado</option>
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