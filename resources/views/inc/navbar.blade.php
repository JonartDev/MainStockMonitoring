<nav class="nav nav-tabs navbar-expand-md" style="color:black;">
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" >
        <ul class="nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"  href="{{ url('/') }}">HOME</a>
            </li>     
            @if(!auth()->user()->hasanyRole('purchasing'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('stocks') ? 'active' : '' }}" href="{{ url('/stocks') }}">STOCKS</a>
            </li>                   
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/stockrequest') ? 'active' : '' }}" href="{{ url('/admin/stockrequest') }}">STOCK REQUEST</a>
            </li>            
            @if(!auth()->user()->hasanyRole('purchasing'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/joborder') ? 'active' : '' }}" href="{{ url('/admin/joborder') }}">JOB ORDER</a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/assembly') ? 'active' : '' }}" href="{{ url('/admin/assembly') }}">ASSEMBLY</a>
            </li>
            @if(!auth()->user()->hasanyRole('purchasing'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pullout') ? 'active' : '' }}" href="{{ url('/admin/pullout') }}">PULLOUT</a>
            </li>            
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/filemaintenance*') ? 'active' : '' }}" href="{{ url('/admin/filemaintenance') }}">FILE MAINTENANCE</a>
            </li>
            @if(!auth()->user()->hasanyRole('purchasing'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">USERS</a>
            </li>
            
            @endif
        </ul>
            <ul class="nav">
                <a id="impScale" href="{{ url('/logout')}}"
                onclick="return confirm('Are You sure you want to logout?');"
                style="color:white; font-size:16px;"><b>Logout</b>&nbsp;&nbsp;<i class="fa fa-sign-out pr-5" aria-hidden="true"></i></a>
            </ul>
    </div>
</nav>
