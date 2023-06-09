<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
      <div class="logo-wrapper"><a href="{{ route('/')}}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo-web.png') }}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="{{ route('/')}}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('dashboard')}}" target="_blank">
                <svg class="stroke-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                </svg><span>Dashboard</span></a></li>



                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                  <svg class="stroke-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                  </svg>
                  <svg class="fill-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                  </svg><span>Club</span></a>
                  <ul class="sidebar-submenu" style="display: block;">
                  <li><a href="{{route('listar.club')}}">Listar Clubes</a>
                  </li>
                  <li><a href="{{route('crear.club')}}">Nuevo Club</a>
                  </li></ul>
                </li>


                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                  <svg class="stroke-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                  </svg>
                  <svg class="fill-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                  </svg><span>Competencia</span></a>
                  <ul class="sidebar-submenu" style="display: block;">
                  <li><a href="{{route('listar.competencia')}}">Listar Competencias</a>
                  </li>
                  <li><a href="{{route('crear.competencia')}}">Nueva Competencia</a>
                  </li>
                  
                </ul>

                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                  <svg class="stroke-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                  </svg>
                  <svg class="fill-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                  </svg><span>Estadio</span></a>
                  <ul class="sidebar-submenu" style="display: block;">
                  <li><a href="{{route('listar.estadio')}}">Listar Estadios</a>
                  </li>
                  <li><a href="{{route('crear.estadio')}}">Nuevo Estadio</a>
                  </li></ul>
                </li>


                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                  <svg class="stroke-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                  </svg>
                  <svg class="fill-icon">
                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                  </svg><span>Jugadores</span></a>
                  <ul class="sidebar-submenu" style="display: block;">
                  <li><a href="{{route('listar.jugador')}}">Listar Jugadores</a>
                  </li>
                  <li><a href="{{route('crear.jugador')}}">Nuevo Jugador</a>
                  </li></ul>
                </li>

               




          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>