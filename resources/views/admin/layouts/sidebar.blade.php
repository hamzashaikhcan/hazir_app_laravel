<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <h6 style="margin-left:18px; font-weight: 700; color: #012970; margin-bottom: 60px;"></h6>


    <li class="nav-item">
      <a class="nav-link " href="{{url('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Admin Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-heading">Bookings</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('allcars')}}">
        <i class="bi bi-car-front-fill"></i>
        <span>All Cars</span>
      </a>
    </li><!-- New Request Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('addcar')}}">
        <i class="bi bi-car-front-fill"></i>
        <span>Add Car</span>
      </a>
    </li><!-- New Request Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('allusers')}}">
        <i class="bi bi-people"></i>
        <span>All Users</span>
      </a>
    </li><!-- booking Request Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('adduser')}}">
        <i class="bi bi-people"></i>
        <span>Add User</span>
      </a>
    </li><!-- booking Request Nav -->


    <!-- Booking Request Nav -->
    <li class="nav-heading">Maintenance</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url ('profile')}}">
        <i class="bi bi-people"></i>
        <span>Profile</span>
      </a>
    </li>
    <!-- User List Nav -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="customer.html">
            <i class="bi bi-person"></i>
          <span>Customer List</span>
        </a>
      </li> -->
    <!-- Customer List Nav -->
                                    

    <li class="nav-item">
      <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="bi bi-box-arrow-in-right"></i>  {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </li><!-- End Login Page Nav -->

  </ul>

</aside>