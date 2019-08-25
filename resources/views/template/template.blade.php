@extends('layouts.header')

  <body class="bg-body">

    <nav class="navbar navbar-expand-md navbar-dark background-orange fixed-top">
      <a class="navbar-brand font-weight" href="">BLOG UPLEXIS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown color-white float-right">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-fw text-light-600"></i>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu text-center" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-fw text-white-600"></i>
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Content Start -->
      @yield('content')
    <!-- nd of content --> 

@extends('layouts.footer')
