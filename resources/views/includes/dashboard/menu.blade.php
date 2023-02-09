<h6 class="navbar-heading text-muted">Acciones</h6>

<ul class="navbar-nav">
    <li class="nav-item  active ">
      <a class="nav-link  active " href="./index.html">
        <i class="ni ni-tv-2 text-info"></i> Mi Espacio
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="ni ni-watch-time text-danger"></i> Mi rutina
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="ni ni-circle-08 text-orange"></i> Empleados
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="ni ni-single-02 text-yellow"></i> Usuarios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="ni ni-collection text-primary"></i> Reservas
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit()">
        <i class="fas fa-sign-in-alt"></i> Cerrar sesión
      </a>
      <form action="{{ route('logout') }}" method="POST" style="display: none" id="formLogout">
        @csrf
      </form>
    </li>
  </ul>
