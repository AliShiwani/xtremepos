@extends('layouts.app')
@section('title', __('lang_v1.add_purchase_return'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<br>
    <h1>@lang('lang_v1.add_purchase_return')</h1>
</section>

<!-- Main content -->
<section class="content no-print">
	{!! Form::open(['url' => action('CombinedPurchaseReturnController@save'), 'method' => 'post', 'id' => 'purchase_return_form', 'files' => true ]) !!}
	<div class="card card-solid">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('supplier_id', __('purchase.supplier') . ':*') !!}
						<!-- <div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							{!! Form::select('contact_id', [], null, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'supplier_id']); !!}
						</div> -->
						<div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            {!! Form::select('contact_id', [], null, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'supplier_id']); !!}
                        </div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('location_id', __('purchase.business_location').':*') !!}
						{!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('ref_no', __('purchase.ref_no').':') !!}
						{!! Form::text('ref_no', null, ['class' => 'form-control']); !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('transaction_date', __('messages.date') . ':*') !!}
						<!-- <div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							{!! Form::text('transaction_date', @format_datetime('now'), ['class' => 'form-control', 'readonly', 'required']); !!}
						</div> -->
						<div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
							{!! Form::text('transaction_date', @format_datetime('now'), ['class' => 'form-control', 'readonly', 'required']); !!}
                        </div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-3">
	                <!-- <div class="custom-file">
	                    {!! Form::label('document', __('purchase.attach_document') . ':',['class'=>'custom-file-label']) !!}
	                    {!! Form::file('document', ['class'=>'custom-file-input','id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); !!}

	                <p class="help-block">
						@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])
	                    @includeIf('components.document_help_text')
					</p>
	                </div> -->
					<div class="form-group">
					       
                        <div class="custom-file">
                            <input type="file" class="custom-file-input">
                            <label class="custom-file-label" for="customFile" accept="implode(',', array_keys(config('constants.document_upload_mimes_types')))">Choose file</label>
							<p class="help-block">
						@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])
	                    @includeIf('components.document_help_text')
					</p>
							
                        </div>
                    </div>
	            </div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="card card-solid">
		<div class="card-header">
        	<h3 class="card-title">{{ __('stock_adjustment.search_products') }}</h3>
       	</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<!-- <div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-search"></i>
							</span>
							{!! Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_purchase_return', 'placeholder' => __('stock_adjustment.search_products'), 'disabled']); !!}
						</div> -->
						<div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
							{!! Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_purchase_return', 'placeholder' => __('stock_adjustment.search_products'), 'disabled']); !!}
                        </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="hidden" id="product_row_index" value="0">
					<input type="hidden" id="total_amount" name="final_total" value="0">
					<div class="table-responsive">
					<table class="table table-bordered table-striped table-condensed" 
					id="purchase_return_product_table">
						<thead>
							<tr>
								<th class="text-center">	
									@lang('sale.product')
								</th>
								@if(session('business.enable_lot_number'))
									<th>
										@lang('lang_v1.lot_number')
									</th>
								@endif
								@if(session('business.enable_product_expiry'))
									<th>
										@lang('product.exp_date')
									</th>
								@endif
								<th class="text-center">
									@lang('sale.qty')
								</th>
								<th class="text-center">
									@lang('sale.unit_price')
								</th>
								<th class="text-center">
									@lang('sale.subtotal')
								</th>
								<th class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('tax_id', __('purchase.purchase_tax') . ':') !!}
						<select name="tax_id" id="tax_id" class="form-control select2" placeholder="'Please Select'">
							<option value="" data-tax_amount="0" data-tax_type="fixed" selected>@lang('lang_v1.none')</option>
							@foreach($taxes as $tax)
								<option value="{{ $tax->id }}" data-tax_amount="{{ $tax->amount }}" data-tax_type="{{ $tax->calculation_type }}">{{ $tax->name }}</option>
							@endforeach
						</select>
						{!! Form::hidden('tax_amount', 0, ['id' => 'tax_amount']); !!}
					</div>
				</div>
				<div class="col-md-8">
					<div class="pull-right"><b>@lang('stock_adjustment.total_amount'):</b> <span id="total_return">0.00</span></div>
				</div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="row">
		<div class="col-md-12">
			<button type="button" id="submit_purchase_return_form" class="btn btn-primary pull-right btn-flat">@lang('messages.submit')</button>
		</div>
	</div>
	{!! Form::close() !!}
</section>
@stop
@section('javascript')
	<script src="{{ asset('js/purchase_return.js?v=' . $asset_v) }}"></script>
	<script type="text/javascript">
		__page_leave_confirmation('#purchase_return_form');
	</script>
@endsection
