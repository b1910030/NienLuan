    <header class="header" id="header">
      <nav class="nav container">
        <a href="{{ route('home') }}" class="nav__logo"
          >VietNamTourist</a>
          

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="{{ route('home') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}"">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name">Home</span>
              </a>
            </li>

            <!-- <li class="nav__item">
              <a href="#about" class="nav__link">
                <i class="bx bx-user nav__icon"></i>
                <span class="nav__name">About</span>
              </a>
            </li> -->

            <li class="nav__item">
              <a href="{{ route('posts') }}" class="nav__link {{ request()->is('posts') ? ' active-link' : '' }}"">
                <i class="bx bx-book-alt nav__icon"></i>
                <span class="nav__name">Blog</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="{{ route('tour') }}" class="nav__link {{ request()->is('paket-travel') ? ' active-link' : '' }}">
                <i class="bx bx-briefcase-alt nav__icon"></i>
                <span class="nav__name">Tour</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="{{ route('contact') }}" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                <i class="bx bx-message-square-detail nav__icon"></i>
                <span class="nav__name">Contact us</span>
              </a>
            </li>
            <li>
              
              
  
              @auth 
                  @if(Auth::user()->is_admin=='1')
                    <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">{{Auth()->user()->name}}</a></li>
                  @else 
                    <li><i class="ti-user"></i> <a href="{{route('auth.profile')}}"  target="_blank">{{Auth()->user()->name}}</a></li>
                  @endif
                  <li><i class="ti-power-off"></i> <a href="{{route('logout')}}">Logout</a></li>
                  @else
                  <li><i class="ti-power-off"></i><a href="{{route('login')}}">Login /</a> <a href="{{route('register')}}">Register</a></li>
              @endauth

            </li>
          </ul>
        </div>
      </nav>
    </header>