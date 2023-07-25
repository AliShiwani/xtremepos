@inject('request', 'Illuminate\Http\Request')

@if($request->segment(1) == 'pos' && ($request->segment(2) == 'create' || $request->segment(3) == 'edit'))
    @php
        $pos_layout = true;
    @endphp
@else
    @php
        $pos_layout = false;
    @endphp
@endif

@php
    $whitelist = ['127.0.0.1', '::1'];
@endphp
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') - {{ Session::get('business.name') }}</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}">
   
    <!-- BEGIN: Custom CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <style>
        .dataTables_wrapper {
            overflow-x: auto;
        }
        .dataTables_wrapper .row {
            width: 100%;
        }
        .fade.in {
             opacity: 1 ;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            padding-right: 0;
        }
        .popover {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1060;
            display: none;
            max-width: 190px;
            padding: 20px;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            word-wrap: normal;
            white-space: normal;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            -webkit-box-shadow: 0 5px 10px rgb(0 0 0 / 20%);
            box-shadow: 0 5px 10px rgb(0 0 0 / 20%);
            line-break: auto;
        }
        .popover.bottom {
            margin-top: 10px;
        }
        #calculator button {
            height: 35px;
            width: 35px;
            margin: 2px 1px;
            border: none!important;
            padding: 6px 7px;
        }
        .main-menu .main-menu-content{
            overflow-y: scroll;
        }
        .daterangepicker {
            position: absolute;
            color: inherit;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 278px;
            max-width: none;
            padding: 0;
            margin-top: 7px;
            top: 100px;
            left: 20px;
            z-index: 3001;
            display: none;
            font-family: arial;
            font-size: 15px;
            line-height: 1em;
        }

        .daterangepicker:before, .daterangepicker:after {
            position: absolute;
            display: inline-block;
            border-bottom-color: rgba(0, 0, 0, 0.2);
            content: '';
        }

        .daterangepicker:before {
            top: -7px;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent;
            border-bottom: 7px solid #ccc;
        }

        .daterangepicker:after {
            top: -6px;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #fff;
            border-left: 6px solid transparent;
        }

        .daterangepicker.opensleft:before {
            right: 9px;
        }

        .daterangepicker.opensleft:after {
            right: 10px;
        }

        .daterangepicker.openscenter:before {
            left: 0;
            right: 0;
            width: 0;
            margin-left: auto;
            margin-right: auto;
        }

        .daterangepicker.openscenter:after {
            left: 0;
            right: 0;
            width: 0;
            margin-left: auto;
            margin-right: auto;
        }

        .daterangepicker.opensright:before {
            left: 9px;
        }

        .daterangepicker.opensright:after {
            left: 10px;
        }

        .daterangepicker.drop-up {
            margin-top: -7px;
        }

        .daterangepicker.drop-up:before {
            top: initial;
            bottom: -7px;
            border-bottom: initial;
            border-top: 7px solid #ccc;
        }

        .daterangepicker.drop-up:after {
            top: initial;
            bottom: -6px;
            border-bottom: initial;
            border-top: 6px solid #fff;
        }

        .daterangepicker.single .daterangepicker .ranges, .daterangepicker.single .drp-calendar {
            float: none;
        }

        .daterangepicker.single .drp-selected {
            display: none;
        }

        .daterangepicker.show-calendar .drp-calendar {
            display: block;
        }

        .daterangepicker.show-calendar .drp-buttons {
            display: block;
        }

        .daterangepicker.auto-apply .drp-buttons {
            display: none;
        }

        .daterangepicker .drp-calendar {
            display: none;
            max-width: 270px;
        }

        .daterangepicker .drp-calendar.left {
            padding: 8px 0 8px 8px;
        }

        .daterangepicker .drp-calendar.right {
            padding: 8px;
        }

        .daterangepicker .drp-calendar.single .calendar-table {
            border: none;
        }

        .daterangepicker .calendar-table .next span, .daterangepicker .calendar-table .prev span {
            color: #fff;
            border: solid black;
            border-width: 0 2px 2px 0;
            border-radius: 0;
            display: inline-block;
            padding: 3px;
        }

        .daterangepicker .calendar-table .next span {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }

        .daterangepicker .calendar-table .prev span {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        .daterangepicker .calendar-table th, .daterangepicker .calendar-table td {
            white-space: nowrap;
            text-align: center;
            vertical-align: middle;
            min-width: 32px;
            width: 32px;
            height: 24px;
            line-height: 24px;
            font-size: 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            white-space: nowrap;
            cursor: pointer;
        }

        .daterangepicker .calendar-table {
            border: 1px solid #fff;
            border-radius: 4px;
            background-color: #fff;
        }

        .daterangepicker .calendar-table table {
            width: 100%;
            margin: 0;
            border-spacing: 0;
            border-collapse: collapse;
        }

        .daterangepicker td.available:hover, .daterangepicker th.available:hover {
            background-color: #eee;
            border-color: transparent;
            color: inherit;
        }

        .daterangepicker td.week, .daterangepicker th.week {
            font-size: 80%;
            color: #ccc;
        }

        .daterangepicker td.off, .daterangepicker td.off.in-range, .daterangepicker td.off.start-date, .daterangepicker td.off.end-date {
            background-color: #fff;
            border-color: transparent;
            color: #999;
        }

        .daterangepicker td.in-range {
            background-color: #ebf4f8;
            border-color: transparent;
            color: #000;
            border-radius: 0;
        }

        .daterangepicker td.start-date {
            border-radius: 4px 0 0 4px;
        }

        .daterangepicker td.end-date {
            border-radius: 0 4px 4px 0;
        }

        .daterangepicker td.start-date.end-date {
            border-radius: 4px;
        }

        .daterangepicker td.active, .daterangepicker td.active:hover {
            background-color: #357ebd;
            border-color: transparent;
            color: #fff;
        }

        .daterangepicker th.month {
            width: auto;
        }

        .daterangepicker td.disabled, .daterangepicker option.disabled {
            color: #999;
            cursor: not-allowed;
            text-decoration: line-through;
        }

        .daterangepicker select.monthselect, .daterangepicker select.yearselect {
            font-size: 12px;
            padding: 1px;
            height: auto;
            margin: 0;
            cursor: default;
        }

        .daterangepicker select.monthselect {
            margin-right: 2%;
            width: 56%;
        }

        .daterangepicker select.yearselect {
            width: 40%;
        }

        .daterangepicker select.hourselect, .daterangepicker select.minuteselect, .daterangepicker select.secondselect, .daterangepicker select.ampmselect {
            width: 50px;
            margin: 0 auto;
            background: #eee;
            border: 1px solid #eee;
            padding: 2px;
            outline: 0;
            font-size: 12px;
        }

        .daterangepicker .calendar-time {
            text-align: center;
            margin: 4px auto 0 auto;
            line-height: 30px;
            position: relative;
        }

        .daterangepicker .calendar-time select.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .daterangepicker .drp-buttons {
            clear: both;
            text-align: right;
            padding: 8px;
            border-top: 1px solid #ddd;
            display: none;
            line-height: 12px;
            vertical-align: middle;
        }

        .daterangepicker .drp-selected {
            display: inline-block;
            font-size: 12px;
            padding-right: 8px;
        }

        .daterangepicker .drp-buttons .btn {
            margin-left: 8px;
            font-size: 12px;
            font-weight: bold;
            padding: 4px 8px;
        }

        .daterangepicker.show-ranges.single.rtl .drp-calendar.left {
            border-right: 1px solid #ddd;
        }

        .daterangepicker.show-ranges.single.ltr .drp-calendar.left {
            border-left: 1px solid #ddd;
        }

        .daterangepicker.show-ranges.rtl .drp-calendar.right {
            border-right: 1px solid #ddd;
        }

        .daterangepicker.show-ranges.ltr .drp-calendar.left {
            border-left: 1px solid #ddd;
        }

        .daterangepicker .ranges {
            float: none;
            text-align: left;
            margin: 0;
        }

        .daterangepicker.show-calendar .ranges {
            margin-top: 8px;
        }

        .daterangepicker .ranges ul {
            list-style: none;
            margin: 0 auto;
            padding: 0;
            width: 100%;
        }

        .daterangepicker .ranges li {
            font-size: 12px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .daterangepicker .ranges li:hover {
            background-color: #eee;
        }

        .daterangepicker .ranges li.active {
            background-color: #08c;
            color: #fff;
        }
      .hide{
          display: none;
          
        }
        html .content {
            margin-left: 0px;
        }
    </style>
    @yield('css')
    <style type="text/css">
	/*
	* Pattern lock css
	* Pattern direction
	* http://ignitersworld.com/lab/patternLock.html
	*/
	.patt-wrap {
	  z-index: 10;
	}
	.patt-circ.hovered {
	  background-color: #cde2f2;
	  border: none;
	}
	.patt-circ.hovered .patt-dots {
	  display: none;
	}
	.patt-circ.dir {
	  background-image: url("https://pos.ultimatefosters.com/img/pattern-directionicon-arrow.png");
	  background-position: center;
	  background-repeat: no-repeat;
	}
	.patt-circ.e {
	  -webkit-transform: rotate(0);
	  transform: rotate(0);
	}
	.patt-circ.s-e {
	  -webkit-transform: rotate(45deg);
	  transform: rotate(45deg);
	}
	.patt-circ.s {
	  -webkit-transform: rotate(90deg);
	  transform: rotate(90deg);
	}
	.patt-circ.s-w {
	  -webkit-transform: rotate(135deg);
	  transform: rotate(135deg);
	}
	.patt-circ.w {
	  -webkit-transform: rotate(180deg);
	  transform: rotate(180deg);
	}
	.patt-circ.n-w {
	  -webkit-transform: rotate(225deg);
	   transform: rotate(225deg);
	}
	.patt-circ.n {
	  -webkit-transform: rotate(270deg);
	  transform: rotate(270deg);
	}
	.patt-circ.n-e {
	  -webkit-transform: rotate(315deg);
	  transform: rotate(315deg);
	}
    input.input-icheck {
        margin-left: -14px;
        margin-top: 2px;
    }
    .icheckbox_square-blue, .iradio_square-blue {
        display: inline-block;
        vertical-align: middle;
        margin: 0;
        padding: 0;
        width: 22px;
        height: 22px;
        background: url(../images/vendor/icheck/skins/square/blue.png?96f8a90…) no-repeat;
        border: none;
        cursor: pointer;
    }
    .iradio_square-blue {
        margin-right: 10px;
    }
    .iradio_square-blue.checked {
        background-position: -168px 0;
    }
    .icheckbox_square-blue.checked {
        background-position: -168px 0;
    }
    .modal-header .close {
        margin: 0 !important;
    }
</style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
   
    <!-- END: Header-->

    @if(!$pos_layout)
                @include('layouts.partials.header')
                @include('layouts.partials.sidebar')
            @else
                @include('layouts.partials.header-pos')
            @endif
    <!-- BEGIN: Main Menu-->
 
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('content')
     
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <div class="modal fade" id="todays_profit_modal" style="padding-top:45px" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">@lang('home.todays_profit')</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="modal_today" value="{{\Carbon::now()->format('Y-m-d')}}">
        <div class="row">
          <div id="todays_profit">
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
      </div>
    </div>
  </div>
</div>

    <!-- BEGIN: Footer-->
 
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    @include('layouts.partials.javascripts')
    <!-- BEGIN Vendor JS-->

    
</body>
<!-- END: Body-->

</html>