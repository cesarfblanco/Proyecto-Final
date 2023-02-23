<h6 class="navbar-heading text-muted">MENU</h6>

<ul class="navbar-nav">

    @if (auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/actividades') }}">
                <i class="ni ni-watch-time text-danger"></i> Actividades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/entrenadores') }}">
                <i class="ni ni-circle-08 text-primary"></i> Empleados
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/clientes') }}">
                <i class="ni ni-single-02 text-yellow"></i> Clientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="ni ni-collection text-primary"></i> Reservas
            </a>
        </li>
    @elseif(auth()->user()->role == 'entrenadores')
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/clientes') }}">
                <i class="ni ni-single-02 text-yellow"></i> Clientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="ni ni-collection text-primary"></i> Reservas
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="ni ni-collection text-primary"></i> Reservar
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">
              <i class="ni ni-collection text-primary"></i> Mis Reservas
          </a>
      </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit()">
            <i class="fas fa-sign-in-alt"></i> Cerrar sesión
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none" id="formLogout">
            @csrf
        </form>
    </li>

</ul>
