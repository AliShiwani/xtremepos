@php
	$default = [];
	$default['show_table'] = 1;
	$default['table_label'] = 'Table';

	$default['show_service_staff'] = 1;
	$default['service_staff_label'] = 'Service staff';
	
	if(!empty($edit_il)){
		$default['show_table'] = isset($module_info['tables']['show_table']) ? $module_info['tables']['show_table'] : 0;
		$default['table_label'] = isset($module_info['tables']['table_label']) ? $module_info['tables']['table_label'] : '';

		$default['show_service_staff'] = isset($module_info['service_staff']['show_service_staff']) ? $module_info['service_staff']['show_service_staff'] : 0;
		
		$default['service_staff_label'] = isset($module_info['service_staff']['service_staff_label']) ? $module_info['service_staff']['service_staff_label'] : '';
	}
	
@endphp
@if(!empty($enabled_modules))
<div class="card card-solid">
    <div class="card-body">
    	<div class="card-header">
            <h3 class="card-title">@lang('lang_v1.restaurant_module_settings')</h3>
        </div>
		<div class="row">
		@if(in_array('tables', $enabled_modules) )
			<div class="col-sm-3">
				<div class="form-group">
					<div class="checkbox">
						<label>
							{!! Form::checkbox('module_info[tables][show_table]', 1, $default['show_table'], ['class' => 'input-icheck']); !!} @lang('restaurant.show_table')
						</label>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					{!! Form::label('module_info[tables][table_label]', __('restaurant.table_label') . ':' ) !!}
					{!! Form::text('module_info[tables][table_label]', $default['table_label'], ['class' => 'form-control', 'placeholder' => __('restaurant.table_label') ]); !!}
				</div>
			</div>
		@endif
		@if(in_array('service_staff', $enabled_modules) )
			<div class="col-sm-3">
				<div class="form-group">
					<div class="checkbox">
						<label>
							{!! Form::checkbox('module_info[service_staff][show_service_staff]', 1, $default['show_service_staff'], ['class' => 'input-icheck']); !!} @lang('restaurant.show_service_staff')
						</label>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					{!! Form::label('module_info[service_staff][service_staff_label]', __('restaurant.service_staff_label') . ':' ) !!}
					{!! Form::text('module_info[service_staff][service_staff_label]', $default['service_staff_label'], ['class' => 'form-control', 'placeholder' => __('restaurant.service_staff_label') ]); !!}
				</div>
			</div>
		@endif

		</div>
	</div>
</div>
@endif