<div class="container-fluid shadow">
   <div class="container">
      <header class="d-flex justify-content-center py-3">
         <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/tickets" class="nav-link">Tickets</a></li>
            @auth
            <li class="nav-item dropdown"><a href="#" id="navbarDropdown" data-bs-toggle="dropdown" class="nav-link dropdown-toggle">{{ auth()->user()->name }}</a>
               <ul class="dropdown-menu">
                  @if(auth()->user()->user_role_id == 2)
                  <li><a href="/admin/dashboard" class="dropdown-item">Admin Dashboard</a></li>
                  @endif
                  @if(auth()->user()->user_role_id == 1)
                  <li><a href="/mytickets" class="dropdown-item">My Tickets</a></li>
                  @endif
                  <li><a href="/logout" class="dropdown-item">Logout</a></li>
               </ul>
            </li>
            @else
            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endauth
         </ul>
      </header>
   </div>
</div>
