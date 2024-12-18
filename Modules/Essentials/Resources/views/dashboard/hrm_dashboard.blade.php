@extends('layouts.app')
@section('title', __('essentials::lang.hrm'))

@section('content')
@include('essentials::layouts.nav_hrm') 
<!-- Main content -->
<section class="content">
	<div class="row row-custom">
		<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
			<div class="card card-solid">
                <div class="card-body p-10">
                    <table class="table no-margin">
                    	<thead>
                    		<tr>
                    			<th colspan="2">
                    				@lang('essentials::lang.my_leaves')
                    			</th>
                    		</tr>
                    		@forelse($users_leaves as $user_leave)
                    			<tr>
                    				<td>
                    					{{@format_date($user_leave->start_date)}}
                    					- {{@format_date($user_leave->end_date)}}
                    				</td>
                    				<td>
                    					{{$user_leave->leave_type->leave_type}}
                    				</td>
                    			</tr>
                    		@empty
                    			<tr>
	                    			<td colspan="2" class="text-center">
	                    				@lang('lang_v1.no_data')
	                    			</td>
	                    		</tr>
                    		@endforelse
                    	</thead>
                    </table>
                </div>
	        </div>
		</div>
		@if(!$is_admin)
        	@include('essentials::dashboard.holidays')
     	@endif
	</div>
	@if($is_admin)
	<hr>
	@endif
	<div class="row row-custom">
		@can('user.view')
	    <div class="col-md-4 col-sm-6 col-xs-12 col-custom">
	        <div class="card card-solid">
	            <div class="card-body p-10">
                	<div class="info-box info-box-new-style">
		            	<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

		            	<div class="info-box-content">
		              		<span class="info-box-text">{{ __('user.users') }}</span>
		              		<span class="info-box-number">{{$users->count()}}</span>
		            	</div>
		            	<!-- /.info-box-content -->
		          	</div>
	                <table class="table no-margin">
	                    <thead>
	                        <tr>
	                            <th>{{ __('essentials::lang.department') }}</th>
	                            <th>{{ __('sale.total') }}</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @forelse($departments as $department)
	                            <tr>
	                                <td>{{$department->name}}</td>
	                                <td>@if(!empty($users_by_dept[$department->id])){{count($users_by_dept[$department->id])}} @else 0 @endif</td>
	                            </tr>
	                        @empty
	                            <tr>
	                                <td colspan="2" class="text-center">@lang('lang_v1.no_data')</td>
	                            </tr>
	                        @endforelse
	                    </tbody>
	                </table>
            	</div>
        	</div>
    	</div>
    	@endcan
        @can('essentials.approve_leave')
    	<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
            <div class="card card-solid">
                <div class="card-header with-border">
                    <i class="fa fa-user-times"></i>
                    <h3 class="card-title">@lang('essentials::lang.leaves')</h3>
                </div>
                <div class="card-body p-10">
                    <table class="table no-margin">
                        <tr>
                            <th class="bg-light-gray" colspan="2">@lang('home.today')</th>
                        </tr>
                        @forelse($todays_leaves as $leave)
                			<tr>
                				<td>
                					{{@format_date($leave->start_date)}}
                					- {{@format_date($leave->end_date)}}
                				</td>
                				<td>
                					{{$leave->leave_type->leave_type}}
                				</td>
                			</tr>
                		@empty
                			<tr>
                    			<td colspan="2" class="text-center">
                    				@lang('lang_v1.no_data')
                    			</td>
                    		</tr>
                		@endforelse
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="bg-light-gray" colspan="2">@lang('lang_v1.upcoming')</th>
                        </tr>
                        @forelse($upcoming_leaves as $leave)
                			<tr>
                				<td>
                					{{@format_date($leave->start_date)}}
                					- {{@format_date($leave->end_date)}}
                				</td>
                				<td>
                					{{$leave->leave_type->leave_type}}
                				</td>
                			</tr>
                		@empty
                			<tr>
                    			<td colspan="2" class="text-center">
                    				@lang('lang_v1.no_data')
                    			</td>
                    		</tr>
                		@endforelse
                    </table>
                </div>
            </div>
        </div>
        @endcan
        @if($is_admin)
        	@include('essentials::dashboard.holidays')
     	@endif
    </div>
    <div class="row row-custom">
    	@if($is_admin)
    		<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
	        	<div class="card card-solid">
	        		<div class="card-header with-border">
	                    <i class="fa fa-user-check"></i>
	                    <h3 class="card-title">@lang('essentials::lang.todays_attendance')</h3>
	                </div>
	                <div class="card-body p-10">
	                    <table class="table no-margin">
	                    	<thead>
	                    		<tr>
	                    			<th>
	                    				@lang('essentials::lang.employee')
	                    			</th>
	                    			<th>
	                    				@lang('essentials::lang.clock_in')
	                    			</th>
	                    			<th>
	                    				@lang('essentials::lang.clock_out')
	                    			</th>
	                    		</tr>
	                    	</thead>
	                        <tbody>
		                        @forelse($todays_attendances as $attendance)
	                                <tr>
	                                    <td>{{$attendance->employee->user_full_name}}</td>
	                                    <td>
	                                    	{{@format_datetime($attendance->clock_in_time)}}

	                                    	@if(!empty($attendance->clock_in_note))
	                                    		<br><small>{{$attendance->clock_in_note}}</small>
	                                    	@endif
	                                    </td>
	                                    <td>
	                                    	@if(!empty($attendance->clock_out_time))
	                                    		{{@format_datetime($attendance->clock_out_time)}}
	                                    	@endif

	                                    	@if(!empty($attendance->clock_out_note))
	                                    		<br><small>{{$attendance->clock_out_note}}</small>
	                                    	@endif
	                                   	</td>
	                                </tr>
	                            @empty
	                                <tr>
	                                    <td colspan="3" class="text-center">@lang('lang_v1.no_data')</td>
	                                </tr>
	                            @endforelse
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
    	@endif
    </div>
    
</section>
<!-- /.content -->
@endsection
