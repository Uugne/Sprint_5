<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::routeIs('index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-item {{ Request::routeIs('projects.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{route('projects.index')}}">Project</a>
        </li>
        <li class="nav-item {{ Request::routeIs('employees.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('employees.index')}}">Employees</a>
        </li>  
      </ul>
    </div>
  </nav>