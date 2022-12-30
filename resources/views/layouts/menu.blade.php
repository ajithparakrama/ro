<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{  request()->routeIs('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
@can('point-list')
<li class="nav-item">
    <a href="{{ route('points.index') }}" class="nav-link {{  request()->routeIs('points.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>My Points</p>
    </a>
</li>
@endcan
@can('point-create')
<li class="nav-item">
    <a href="{{ route('points.create') }}" class="nav-link {{  request()->routeIs('points.create') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Upload</p>
    </a>
</li>
@endcan
@can('user-list')
<li class="nav-item">
  <a href="{{ route('users.index') }}" class="nav-link {{  request()->routeIs('users*') ? 'active' : '' }}">
      <i class="nav-icon fas fa-cash-register"></i> 
      <p>Members</p>
  </a>
</li>
@endcan
@can('point-all-old')
<li class="nav-item has-treeview {{  request()->is('points*') ? 'menu-open' : ''   }} ">
    <a href="#" class="nav-link  {{  request()->is('points*') ? 'active' : ''     }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>Member Requests</p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('points.all') }}" class="nav-link {{ request()->routeIs('points.all') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>New Requests</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('points.old') }}" class="nav-link {{ request()->routeIs('points.old') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Past Requests</p>
            </a>
          </li>
           
    </ul>
</li>
@endcan
@can('role-list')
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
  @endcan 
  {{-- @endcan --}}
  <li class="nav-item">
    <a href="{{ route('profile') }}" class="nav-link {{  request()->routeIs('profile') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Profile</p>
    </a>
</li>

 
