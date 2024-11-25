 <!-- Sidebar -->
 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             @if (isset($infoormations->logo))
                 <img src='{{ asset('img') }}/{{ $infoormations->logo }}' width='100'>
             @endif
         </div>
         <div class="sidebar-brand-text mx-3">
             @if (isset($infoormations))
                 {{ $infoormations->nom }}
             @endif
         </div>
     </a>
     <hr class="sidebar-divider my-0">
     <li class="nav-item active">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider">
     <li class="nav-item active">
         <a class="nav-link" href="{{ url('parameter') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Parameter</span></a>
     </li>

 </ul>
