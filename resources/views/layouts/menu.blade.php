<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{  request()->routeIs('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('points.create') }}" class="nav-link {{  request()->routeIs('points.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Upload</p>
    </a>
</li>

<li class="nav-item">
  <a href="{{ route('users.index') }}" class="nav-link {{  request()->routeIs('users*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-cash-register"></i> 
      <p>Members</p>
  </a>
</li>

<li class="nav-item has-treeview {{  request()->is('settings*') ? 'menu-open' : ''   }} ">
    <a href="#" class="nav-link  {{  request()->is('settings*') ? 'active' : ''     }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>Member Requests</p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->routeIs('locations*') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>New Requests</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('categories*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Past Requests</p>
            </a>
          </li>
           
    </ul>
</li>
{{-- @can('user-list') --}}
<li class="nav-item has-treeview {{  request()->is('mainatin*') ? 'menu-open' : ''   }} ">
  <a href="#" class="nav-link  {{  request()->is('mainatin*') ? 'active' : ''     }}">
      <i class="nav-icon fas fa-users"></i>
      <p>Administration</p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Roles</p>
      </a>
    </li>
  </ul>
  {{-- @endcan --}}
  <li class="nav-item">
    <a href="{{ route('profile') }}" class="nav-link {{  request()->routeIs('profile') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Profile</p>
    </a>
</li>
 
