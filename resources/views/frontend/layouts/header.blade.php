  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand page-scroll" href="#page-top">
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
                  <a class="page-scroll" href="#download">{{trans('frontend.part')}}</a>
                </li>
                <li>
                  <a class="page-scroll" href="#contact">{{ trans('frontend.exams') }}</a>
                </li>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{{trans('frontend.login')}}</a></li>
                    <li><a href="{{ route('register') }}">{{ trans('frontend.register') }}</a></li>
                @else
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ trans('frontend.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
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
            <p class="intro-text">{{ trans('frontend.intro') }}</p>
            <a href="#about" class="btn btn-circle page-scroll">
              <i class="fa fa-angle-double-down animated"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>