<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ URL::asset('images/logo-utcc60th.png') }}" alt="" width="60" height="54" class="d-inline-block align-text-middle">
            {{ __('KPIs') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-nowrap {{ request()->routeIs('home') ? 'active' : '' }}"
                            aria-current="page" href="{{ url('/home') }}">
                            <i class="bi bi-house"></i>
                            {{ __(' Home') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap {{ request()->routeIs('users.*') ? 'active' : '' }}"
                            href="{{ url('users') }}">
                            <i class="bi bi-people"></i>
                            {{ __(' จัดการผู้ใช้งาน') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap {{ request()->routeIs('divisions.*') ? 'active' : '' }}" href="{{ url('divisions') }}">
                            <i class="bi bi-diagram-3-fill"></i>
                            {{ __(' จัดการฝ่าย/คณะวิชา') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap {{ request()->routeIs('departments.*') ? 'active' : '' }}"
                            href="{{ url('departments') }}">
                            <i class="bi bi-diagram-3"></i>
                            {{ __(' จัดการหน่วยงาน') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap {{ request()->routeIs('faculties.*') ? 'active' : '' }}"
                            href="{{ url('faculties') }}">
                            <i class="bi bi-diagram-2"></i>
                            {{ __(' จัดการแผนก/สาขาวิชา') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                                {{ __('User Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>