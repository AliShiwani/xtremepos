<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl" style="background-color: #f8f8f8; box-shadow: none;">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
               
              
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
          
               
            @if(Auth::check())
            <li class="nav-item dropdown dropdown-notification mr-25"><a href="{{ action('HomeController@index') }}">@lang('home.home')</a></li>
            @endif
            @if (Route::has('login'))
            @if(!Auth::check())
               
                <li class="nav-item dropdown dropdown-notification mr-25">
           
                <a href="{{ route('login') }}">
                  @lang('lang_v1.login')
                </a>
                </li>
                @if(config('constants.allow_registration'))
                <li class="nav-item dropdown dropdown-notification mr-25">
                 
                <a href="{{ route('business.getRegister') }}">
                @lang('lang_v1.register')
               </a>
                </li>
                @endif
                @endif
        @endif
                
            </ul>
        </div>
    </nav>