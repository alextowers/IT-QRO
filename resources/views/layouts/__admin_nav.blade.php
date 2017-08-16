<div class="container-fluid">
    <div class="row admin-banner">
        <span class="admin-title">Sistema de administración</span>
        <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">Inicio</a>
        <a href="{{ route('products.index') }}" class="{{ Request::is('products') ? 'active' : '' }}">Productos</a>
        <a href="{{ route('employees.index') }}" class="{{ Request::is('employees') ? 'active' : '' }}">Empleados</a>
        <a href="{{ route('clients.index') }}" class="{{ Request::is('clients') ? 'active' : '' }}">Clientes</a>
        <a href="{{ url('/reports') }}" class="{{ Request::is('reports') ? 'active' : '' }}">Reportes</a>
    </div>
</div>