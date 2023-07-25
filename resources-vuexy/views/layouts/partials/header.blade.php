<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email">{{ @format_date('now') }}</a></li>

                </ul>
                <ul class="nav navbar-nav">
               
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item">
                    <button id="btnCalculator" title="@lang('lang_v1.calculator')" type="button" class="mr-1 btn btn-success btn-flat pull-left m-8 btn-sm mt-10 popover-default hidden-xs" data-toggle="popover" data-trigger="click" data-content='@include("layouts.partials.calculator")' data-html="true" data-placement="bottom">
                        <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
                    </button>
                </li>
                <li class="nav-item">
                    @if($request->segment(1) == 'pos')
                        @can('view_cash_register')
                        <button type="button" id="register_details" title="{{ __('cash_register.register_details') }}" data-toggle="tooltip" data-placement="bottom" class="mr-1 btn btn-success btn-flat pull-left m-8 btn-sm mt-10 btn-modal" data-container=".register_details_modal" 
                        data-href="{{ action('CashRegisterController@getRegisterDetails')}}">
                        <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
                        </button>
                        @endcan
                        @can('close_cash_register')
                        <button type="button" id="close_register" title="{{ __('cash_register.close_register') }}" data-toggle="tooltip" data-placement="bottom" class="mr-1 btn btn-danger btn-flat pull-left m-8 btn-sm mt-10 btn-modal" data-container=".close_register_modal" 
                        data-href="{{ action('CashRegisterController@getCloseRegister')}}">
                        <strong><i class="fa fa-window-close fa-lg"></i></strong>
                        </button>
                        @endcan
                    @endif
                </li>
                <li class="nav-item">
                    @if(in_array('pos_sale', $enabled_modules))
                        @can('sell.create')
                        <a href="{{action('SellPosController@create')}}" title="@lang('sale.pos_sale')" data-toggle="tooltip" data-placement="bottom" class="mr-1 btn btn-flat pull-left m-8 btn-sm mt-10 btn-success">
                            <strong><i class="fa fa-th-large"></i> &nbsp; @lang('sale.pos_sale')</strong>
                        </a>
                        @endcan
                    @endif
                </li>
                <li class="nav-item">
                    @can('profit_loss_report.view')
                        <button type="button" id="view_todays_profit" title="{{ __('home.todays_profit') }}" data-toggle="tooltip" data-placement="bottom" class="mr-1  btn btn-success btn-flat pull-left m-8 btn-sm mt-10">
                        <strong><i class="far fa-money-bill-alt"></i></strong>
                        </button>
                     @endcan
                </li>
                {{-- <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="javascript:void(0);" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="javascript:void(0);" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="javascript:void(0);" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                </li> --}}
               
{{--                <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>--}}
{{--                    <div class="search-input">--}}
{{--                        <div class="search-input-icon"><i data-feather="search"></i></div>--}}
{{--                        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">--}}
{{--                        <div class="search-input-close"><i data-feather="x"></i></div>--}}
{{--                        <ul class="search-list search-list-main"></ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <li class="nav-item dropdown dropdown-cart mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                  <i class="ficon" data-feather="calendar"></i>
                </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    @if(config('app.env') != 'demo')
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                            <a href="{{route('calendar')}}">
                                <h4 class="notification-title mb-0 mr-auto">Calendar</h4>
                                <div class="badge badge-pill badge-light-primary"><i data-feather="plus"></i></div>
                            </a>
                            </div>
                        </li>
                    @endif
                    @if(auth()->user()->hasRole('Admin#' . auth()->user()->business_id))
                        <li class="scrollable-container media-list">
                        <div class="dropdown-header d-flex">
                        <a id="start_tour" href="#">
                                <h4 class="notification-title mb-0 mr-auto">Programm Tour</h4>
                                <div class="badge badge-pill badge-light-primary"><i data-feather="alert-circle"></i></div>
                        </a>
                            </div>
                        </li>
                      @endif
                     
                    </ul>
                </li>
                @include('layouts.partials.header-notifications')
                <li class="nav-item dropdown dropdown-user">
                  <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Session::get('business.name') }}</span><span class="user-status">{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</span></div>
                        <span class="avatar">
                        @php
                $profile_photo = auth()->user()->media;
              @endphp
              @if(!empty($profile_photo))
                  <img class="round" src="{{$profile_photo->display_url}}" alt="avatar" height="40" width="40">
                  <span class="avatar-status-online"></span>
              @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                      <a class="dropdown-item" href="{!! action('UserController@getProfile')!!}">
                      <i class="mr-50" data-feather="user"></i> Profile</a
                      >
                      <!-- <a class="dropdown-item" href="app-email.html">
                      <i class="mr-50" data-feather="mail"></i> Inbox</a>
                      <a class="dropdown-item" href="app-todo.html">
                        <i class="mr-50" data-feather="check-square"></i> Task
                      </a>
                      <a class="dropdown-item" href="app-chat.html">
                        <i class="mr-50" data-feather="message-square"></i> Chats</a> -->
                        <!-- <div class="dropdown-divider">

                        </div> -->
                        <!-- <a class="dropdown-item" href="page-account-settings.html">
                          <i class="mr-50" data-feather="settings"></i> Settings</a>
                          <a class="dropdown-item" href="page-pricing.html">
                            <i class="mr-50" data-feather="credit-card"></i> Pricing</a> -->
                        <!-- <a class="dropdown-item" href="page-faq.html">
                          <i class="mr-50" data-feather="help-circle"></i> FAQ</a> -->
                          <a href="{!! action('Auth\LoginController@logout') !!}" class="dropdown-item" >
                          <i class="mr-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>