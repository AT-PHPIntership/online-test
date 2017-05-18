<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
          Menu <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand page-scroll" href="{{ route('home') }}">
          <i class="fa fa-play-circle"></i> <span class="light">AT</span> Exams Toeic
      </a>
    </div>
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
              <li class="hidden">
                <a href="#page-top"></a>
              </li>
              <li>
                <a class="page-scroll" href="#news">{{trans('frontend.news')}}</a>
              </li>
              <li>
                <a class="page-scroll" href="#parts">{{trans('frontend.part')}}</a>
              </li>
              <li>
                <a class="page-scroll" href="#exams">{{ trans('frontend.exams') }}</a>
              </li>
              @if (Auth::guest())
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>{{trans('frontend.login')}}</a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>{{ trans('frontend.register') }}</a></li>
              @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              {!! trans('backend.logout') !!}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
                </li>
              @endif
          </ul>
      </div>
  </div>
</nav>
<header class="intro">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="brand-heading">{{ trans('frontend.toeic') }}</h1>
        </div>
      </div>
    </div>
  </div>
</header>
