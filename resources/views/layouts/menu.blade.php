<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link ">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('clients') }}" class="nav-link ">
        <i class="nav-icon fas fa-building"></i>
        <p> Clients</p>

    </a>
</li>
<li class="nav-item">
    <a href="{{ route('workorders') }}" class="nav-link ">
        <i class="fas fa-paste"></i>
        <p> Work Orders</p>

    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
      <p>
        Admin
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('users')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Users</p>
        </a>
      </li>

    </ul>
  </li>

<li class="nav-item">
    <a href="{{ route('downloads') }}" class="nav-link ">
        <i class="fas fa-download"></i>
        <p> Downloads</p>

    </a>
</li>
