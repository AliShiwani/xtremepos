<section class="no-print">
 
    <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> <a class="nav-link" class="navbar-brand" href="{{action('\Modules\Repair\Http\Controllers\DashboardController@index')}}"><i class="fa fa-wrench"></i> {{__('repair::lang.repair')}}</a></h4>
                                </div>
                                <div class="card-body">
                                   
                                   
                                    <ul class="nav">
                    @if(auth()->user()->can('job_sheet.create') || auth()->user()->can('job_sheet.view_assigned') || auth()->user()->can('job_sheet.view_all'))
                        <li @if(request()->segment(2) == 'job-sheet' && empty(request()->segment(3))) class="nav-item active" @endif>
                            <a class="nav-link" href="{{action('\Modules\Repair\Http\Controllers\JobSheetController@index')}}">
                                @lang('repair::lang.job_sheets')
                            </a>
                        </li>
                    @endif

                    @can('job_sheet.create')
                        <li class="nav-item" @if(request()->segment(2) == 'job-sheet' && request()->segment(3) == 'create') class="active" @endif>
                            <a class="nav-link" href="{{action('\Modules\Repair\Http\Controllers\JobSheetController@create')}}">
                                @lang('repair::lang.add_job_sheet')
                            </a>
                        </li>
                    @endcan

                    @if(auth()->user()->can('repair.view') || auth()->user()->can('repair.view_own'))
                        <li class="nav-item" @if(request()->segment(2) == 'repair' && empty(request()->segment(3))) class="active" @endif><a class="nav-link" href="{{action('\Modules\Repair\Http\Controllers\RepairController@index')}}">@lang('repair::lang.list_invoices')</a></li>
                    @endif

                    @can('repair.create')
                        <li class="nav-item" @if(request()->segment(2) == 'repair' && request()->segment(3) == 'create') class="active" @endif><a class="nav-link" href="{{ action('SellPosController@create'). '?sub_type=repair'}}">@lang('repair::lang.add_invoice')</a></li>
                    @endcan

                    @if(auth()->user()->can('brand.view') || auth()->user()->can('brand.create'))
                        <li class="nav-item" @if(request()->segment(1) == 'brands') class="active" @endif>
                            <a class="nav-link" href="{{action('BrandController@index')}}">@lang('brand.brands')</a></li>
                    @endif

                    @if (auth()->user()->can('edit_repair_settings'))
                        <li class="nav-item" @if(request()->segment(1) == 'repair' && request()->segment(2) == 'repair-settings') class="active" @endif><a class="nav-link" href="{{action('\Modules\Repair\Http\Controllers\RepairSettingsController@index')}}">@lang('messages.settings')</a></li>
                    @endif
                </ul>
                                </div>
                            </div>
                        </div>
</section>