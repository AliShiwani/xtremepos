@extends('layouts.app')
@section('title', __('role.add_role'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>@lang( 'role.add_role' )</h1>
</section>

<!-- Main content -->
<section class="content">
    @php
      $pos_settings = !empty(session('business.pos_settings')) ? json_decode(session('business.pos_settings'), true) : [];
    @endphp
    @component('components.widget', ['class' => 'box-primary'])
        {!! Form::open(['url' => action('RoleController@store'), 'method' => 'post', 'id' => 'role_add_form' ]) !!}
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            {!! Form::label('name', __( 'user.role_name' ) . ':*') !!}
              {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'user.role_name' ) ]); !!}
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-3">
          <label>@lang( 'user.permissions' ):</label> 
        </div>
        </div>

        <div class="row check_group">
          <div class="col-md-2">
            <h4>@lang( 'lang_v1.others' )</h4>
          </div>
          <div class="col-md-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="select_all_1" />
                <label class="custom-control-label" for="select_all_1">{{ __( 'role.select_all' ) }}</label>
            </div>
         
          </div>
          <div class="col-md-8">
              @if(in_array('service_staff', $enabled_modules))
                <div class="col-md-12">
                  <div  class="custom-control custom-checkbox">
                   
                      {!! Form::checkbox('is_service_staff', 1, false, 
                      [ 'class' => 'input-icheck','id'=>'service_staff']); !!} 
                      <label class="custom-control-label" for="service_staff">
                      {{ __( 'restaurant.service_staff' ) }}
                    </label>
                    @show_tooltip(__('restaurant.tooltip_service_staff'))
                  </div>
                </div>
              @endif

              <div class="col-md-12">
              
                  <!-- <label>
                    {!! Form::checkbox('permissions[]', 'view_export_buttons', false, 
                    [ 'class' => 'input-icheck']); !!} 
                  </label> -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_export_buttons" />
                    <label class="custom-control-label" for="view_export_buttons">{{ __( 'lang_v1.view_export_buttons' ) }}</label>
                  </div>
              
              </div>
          </div>
        </div>
        <hr>

        <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'role.user' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                    <input type="checkbox"  class="custom-control-input" id="select_all_2" />
                    <label class="custom-control-label" for="select_all_2">{{ __( 'role.select_all' ) }}</label>
            </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'user.view', false, 
                [ 'class' => 'input-icheck']); !!} 
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_user_view"  />
                <label class="custom-control-label" for="role_user_view">{{ __( 'role.user.view' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'user.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_user_create"  />
                <label class="custom-control-label" for="role_user_create">{{ __( 'role.user.create' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'user.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_user_update"  />
                <label class="custom-control-label" for="role_user_update">{{ __( 'role.user.update' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'user.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_user_delete"/>
                <label class="custom-control-label" for="role_user_delete">{{ __( 'role.user.delete' ) }}</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'user.roles' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
          </div> -->
          <div class="custom-control custom-checkbox">
                <input type="checkbox"  class="custom-control-input" id="select_all_3" />
                <label class="custom-control-label" for="select_all_3">{{ __( 'role.select_all' ) }}</label>
          </div>
        </div>
        <div class="col-md-8">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'roles.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_role' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_role"/>
                <label class="custom-control-label" for="view_role">{{ __( 'lang_v1.view_role' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'roles.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.add_role' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_add_role"/>
                <label class="custom-control-label" for="role_add_role">{{ __( 'role.add_role' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'roles.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.edit_role' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_edit_role"/>
                <label class="custom-control-label" for="role_edit_role">{{ __( 'role.edit_role' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'roles.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_role' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_delete_role"/>
                <label class="custom-control-label" for="role_delete_role">{{ __( 'lang_v1.delete_role' ) }}</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'role.supplier' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
          <div class="custom-control custom-checkbox">
                <input type="checkbox"  class="custom-control-input" id="select_all_4" />
                <label class="custom-control-label" for="select_all_4">{{ __( 'role.select_all' ) }}</label>
          </div>
        </div>
        <div class="col-md-8">
          <div class="radio-group">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[supplier_view]', 'supplier.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_supplier' ) }}
              </label>
            </div> -->
            <!-- <div class="custom-control custom-checkbox">
                <input type="checkbox"  class="custom-control-input" id="view_all_supplier" />
                <label class="custom-control-label" for="view_all_supplier">{{ __( 'lang_v1.view_all_supplier' ) }}</label>
          </div> -->
          <div class="custom-control custom-radio">
              <input type="radio" id="view_all_supplier" name="radio_option[supplier_view]" class="custom-control-input"  />
              <label class="custom-control-label" for="view_all_supplier">{{ __( 'lang_v1.view_all_supplier' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="custom-control custom-checkbox"> -->
              <!-- <label class="custom-control-label" for="view_own_supplier">
                {!! Form::radio('radio_option[supplier_view]', 'supplier.view_own', false, 
                [ 'class' => 'custom-control-input' , 'id' => 'view_own_supplier',]); !!} {{ __( 'lang_v1.view_own_supplier' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="view_own_supplier" name="radio_option[supplier_view]" class="custom-control-input"  />
              <label class="custom-control-label" for="view_own_supplier">{{ __( 'lang_v1.view_own_supplier' ) }}</label>
            </div>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'supplier.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.supplier.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="supplier.create"  />
                <label class="custom-control-label" for="supplier.create">{{ __( 'role.supplier.create' ) }}</label>
             </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'supplier.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.supplier.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="supplier_update"  />
                <label class="custom-control-label" for="supplier_update">{{ __( 'role.supplier.update' ) }}</label>
             </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'supplier.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.supplier.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="supplier_delete"  />
                <label class="custom-control-label" for="supplier_delete">{{ __( 'role.supplier.delete' ) }}</label>
             </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'role.customer' ) @show_tooltip(__('lang_v1.customer_permissions_tooltip'))</h4>
        </div>
        <div class="col-md-2">
        <div class="custom-control custom-checkbox">
                <input type="checkbox"  class="custom-control-input" id="select_all5" />
                <label class="custom-control-label" for="select_all5">{{ __( 'role.select_all' ) }}</label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view]', 'customer.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_customer' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="view_all_customer" name="radio_option[customer_view]" class="custom-control-input"  />
              <label class="custom-control-label" for="view_all_customer">{{ __( 'lang_v1.view_all_customer' ) }}</label>
            </div>
        
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view]', 'customer.view_own', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_customer' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="view_own_customer" name="radio_option[customer_view]" class="custom-control-input"  />
              <label class="custom-control-label" for="view_own_customer">{{ __( 'lang_v1.view_own_customer' ) }}</label>
            </div>
            <hr>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_one_month', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.customer_with_no_sell_one_month' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="customer_with_no_sell_one_month" name="radio_option[customer_view_by_sell]" class="custom-control-input"  />
              <label class="custom-control-label" for="customer_with_no_sell_one_month">{{ __( 'lang_v1.customer_with_no_sell_one_month' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_three_month', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.customer_with_no_sell_three_month' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="customer_with_no_sell_three_month" name="radio_option[customer_view_by_sell]" class="custom-control-input"  />
              <label class="custom-control-label" for="customer_with_no_sell_three_month">{{ __( 'lang_v1.customer_with_no_sell_three_month' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_six_month', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.customer_with_no_sell_six_month' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="{{ __( 'lang_v1.customer_with_no_sell_six_month' ) }}" name="radio_option[customer_view_by_sell]" class="custom-control-input"  />
              <label class="custom-control-label" for="{{ __( 'lang_v1.customer_with_no_sell_six_month' ) }}">{{ __( 'lang_v1.customer_with_no_sell_six_month' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_one_year', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.customer_with_no_sell_one_year' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="customer_with_no_sell_one_year" name="radio_option[customer_view_by_sell]" class="custom-control-input"  />
              <label class="custom-control-label" for="customer_with_no_sell_one_year">{{ __( 'lang_v1.customer_with_no_sell_one_year' ) }}</label>
            </div>

          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[customer_view_by_sell]', 'customer_irrespective_of_sell', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.customer_irrespective_of_sell' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="customer_irrespective_of_sell" name="radio_option[customer_view_by_sell]" class="custom-control-input"  />
              <label class="custom-control-label" for="customer_irrespective_of_sell">{{ __( 'lang_v1.customer_irrespective_of_sell' ) }}</label>
            </div>
            <hr>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'customer.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.customer.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_customer_create"/>
              <label class="custom-control-label" for="role_customer_create"> {{ __( 'role.customer.create' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'customer.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.customer.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_customer_update"/>
              <label class="custom-control-label" for="role_customer_update"> {{ __( 'role.customer.update' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'customer.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.customer.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_customer_delete"/>
              <label class="custom-control-label" for="role_customer_delete"> {{ __( 'role.customer.delete' ) }}</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'business.product' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="select_all_6"/>
              <label class="custom-control-label" for="select_all_6"> {{ __( 'role.select_all' ) }}</label>
            </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'product.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.view' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_product_view"/>
              <label class="custom-control-label" for="role_product_view"> {{ __( 'role.product.view' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'product.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_product_create"/>
              <label class="custom-control-label" for="role_product_create"> {{ __( 'role.product.create' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'product.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_product_create"/>
              <label class="custom-control-label" for="role_product_create"> {{ __( 'role.product.create' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'product.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_product_delete"/>
              <label class="custom-control-label" for="role_product_delete"> {{ __( 'role.product.delete' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'product.opening_stock', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.add_opening_stock' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="add_opening_stock"/>
              <label class="custom-control-label" for="add_opening_stock"> {{ __( 'lang_v1.add_opening_stock' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'view_purchase_price', false,['class' => 'input-icheck']); !!}
                {{ __('lang_v1.view_purchase_price') }}
              </label>
              @show_tooltip(__('lang_v1.view_purchase_price_tooltip'))
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_purchase_price"/>
              <label class="custom-control-label" for="view_purchase_price">   {{ __('lang_v1.view_purchase_price') }}</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        @if(in_array('purchases', $enabled_modules) || in_array('stock_adjustment', $enabled_modules) )
        <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'role.purchase' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox"  class="custom-control-input" id="select_all_7" />
              <label class="custom-control-label" for="select_all_7">  {{ __( 'role.select_all' ) }}</label>
            </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[purchase_view]', 'purchase.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_purchase_n_stock_adjustment' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" name="radio_option[purchase_view]" id="view_all_purchase_n_stock_adjustment"  class="custom-control-input" />
              <label  class="custom-control-label" for="view_all_purchase_n_stock_adjustment" > {{ __( 'lang_v1.view_all_purchase_n_stock_adjustment' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[purchase_view]', 'view_own_purchase', false,['class' => 'input-icheck']); !!}
                {{ __('lang_v1.view_own_purchase_n_stock_adjustment') }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" name="radio_option[purchase_view]" id="view_own_purchase_n_stock_adjustment"  class="custom-control-input" />
              <label  class="custom-control-label" for="view_own_purchase_n_stock_adjustment" >{{ __('lang_v1.view_own_purchase_n_stock_adjustment') }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'purchase.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_purchase_create"  />
              <label class="custom-control-label" for="role_purchase_create">{{ __( 'role.purchase.create' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'purchase.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_purchase_update"  />
              <label class="custom-control-label" for="role_purchase_update">{{ __( 'role.purchase.update' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'purchase.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_purchase_delete"  />
              <label class="custom-control-label" for="role_purchase_delete"> {{ __( 'role.purchase.delete' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'purchase.payments', false,['class' => 'input-icheck']); !!}
                {{ __('lang_v1.add_purchase_payment') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="add_purchase_payment"  />
              <label class="custom-control-label" for="add_purchase_payment">  {{ __('lang_v1.add_purchase_payment') }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'edit_purchase_payment', false,['class' => 'input-icheck']); !!}
                {{ __('lang_v1.edit_purchase_payment') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="edit_purchase_payment"  />
              <label class="custom-control-label" for="edit_purchase_payment">{{ __('lang_v1.edit_purchase_payment') }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'delete_purchase_payment', false,['class' => 'input-icheck']); !!}
                {{ __('lang_v1.delete_purchase_payment') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="delete_purchase_payment"  />
              <label class="custom-control-label" for="delete_purchase_payment">{{ __('lang_v1.delete_purchase_payment') }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'purchase.update_status', false,['class' => 'input-icheck']); !!}
                {{ __('lang_v1.update_status') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="update_status"  />
              <label class="custom-control-label" for="update_status"> {{ __('lang_v1.update_status') }}</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        @endif

        @if(!empty($common_settings['enable_purchase_order']))
          <div class="row check_group">
            <div class="col-md-2">
              <h4>@lang( 'lang_v1.purchase_order' )</h4>
            </div>
            <div class="col-md-2">
              <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
              <input type="checkbox"  class="custom-control-input" id="select_all_8"  />
              <label class="custom-control-label" for="update_status" for="select_all_8"> {{ __( 'role.select_all' ) }}</label>
            </div>
            </div>
            <div class="col-md-8">
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::radio('radio_option[purchase_order_view]', 'purchase_order.view_all', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_purchase_order' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-radio">
                  <input type="radio" name="radio_option[purchase_order_view]" id="view_all_purchase_order"  class="custom-control-input"  />
                  <label class="custom-control-label" for="view_all_purchase_order">{{ __( 'lang_v1.view_all_purchase_order' ) }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::radio('radio_option[purchase_order_view]', 'purchase_order.view_own', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_purchase_order' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-radio">
                  <input type="radio" name="radio_option[purchase_order_view]" id="view_own_purchase_order"  class="custom-control-input"  />
                  <label class="custom-control-label" for="view_own_purchase_order">{{ __( 'lang_v1.view_own_purchase_order' ) }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'purchase_order.create', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.create_purchase_order' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" class="custom-control-input" id="create_purchase_order"  />
                  <label class="custom-control-label" for="create_purchase_order">{{ __( 'lang_v1.create_purchase_order' ) }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'purchase_order.update', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.edit_purchase_order' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" class="custom-control-input" id="edit_purchase_order"  />
                  <label class="custom-control-label" for="edit_purchase_order">{{ __( 'lang_v1.edit_purchase_order' ) }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'purchase_order.delete', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_purchase_order' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" class="custom-control-input" id="delete_purchase_order"  />
                  <label class="custom-control-label" for="delete_purchase_order">{{ __( 'lang_v1.delete_purchase_order' ) }}</label>
                </div>
              </div>

            </div>
          </div>
          <hr>
        @endif
        <div class="row check_group">
            <div class="col-md-2">
                <h4>@lang( 'sale.pos_sale' )</h4>
            </div>
            <div class="col-md-2">
                <!-- <div class="checkbox">
                    <label>
                        <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                    </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox"  class="custom-control-input"  id="select_all_9" />
                  <label class="custom-control-label" for="select_all_9" >{{ __( 'role.select_all' ) }}</label>
                </div>

            </div>
            <div class="col-md-7">
            @if(in_array('pos_sale', $enabled_modules))
                <div class="col-md-12">
                    <!-- <div class="checkbox">
                      <label>
                        {!! Form::checkbox('permissions[]', 'sell.view', false, 
                        [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.view' ) }}
                      </label>
                    </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="role_sell_view"  class="custom-control-input"  />
                  <label class="custom-control-label" for="role_sell_view" > {{ __( 'role.sell.view' ) }}</label>
                </div>

                </div>
                <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'sell.create', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.create' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="role_sell_create"  class="custom-control-input"  />
                  <label class="custom-control-label" for="role_sell_create" >  {{ __( 'role.sell.create' ) }}</label>
                </div>
              </div>
                @endif
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'sell.update', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.update' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="role_sell_update"  class="custom-control-input"  />
                  <label class="custom-control-label" for="role_sell_update" >  {{ __( 'role.sell.update' ) }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'sell.delete', false, 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.delete' ) }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="role_sell_delete"  class="custom-control-input"  />
                  <label class="custom-control-label" for="role_sell_delete" >  {{ __( 'role.sell.delete' ) }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'edit_product_price_from_pos_screen', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.edit_product_price_from_pos_screen') }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="edit_product_price_from_pos_screen"  class="custom-control-input"  />
                  <label class="custom-control-label" for="edit_product_price_from_pos_screen" >  {{ __('lang_v1.edit_product_price_from_pos_screen') }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'edit_product_discount_from_pos_screen', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.edit_product_discount_from_pos_screen') }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="edit_product_discount_from_pos_screen"  class="custom-control-input"  />
                  <label class="custom-control-label" for="edit_product_discount_from_pos_screen" > {{ __('lang_v1.edit_product_discount_from_pos_screen') }}</label>
                </div>
              </div>
              <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'print_invoice', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.print_invoice') }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" id="print_invoice"  class="custom-control-input"  />
                  <label class="custom-control-label" for="print_invoice" >  {{ __('lang_v1.print_invoice') }}</label>
                </div>
              </div>

            </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'sale.sale' ) @show_tooltip(__('lang_v1.sell_permissions_tooltip'))</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div>-->
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox"  id="role_select_all1"  class="custom-control-input"  />
          <label class="custom-control-label" for="role_select_all1" >{{ __( 'role.select_all' ) }}</label>
        </div>
        <div class="col-md-8">
          @if(in_array('add_sale', $enabled_modules))
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[sell_view]', 'direct_sell.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_sale' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="view_all_sale" name="radio_option[sell_view]" class="custom-control-input"  />
              <label class="custom-control-label" for="view_all_sale">{{ __( 'lang_v1.view_all_sale' ) }}</label>
            </div>
       
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[sell_view]', 'view_own_sell_only', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_sell_only' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="view_own_sell_only" name="radio_option[sell_view]" class="custom-control-input"  />
              <label class="custom-control-label" for="view_own_sell_only">{{ __( 'lang_v1.view_own_sell_only' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'view_paid_sells_only', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_paid_sells_only' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_paid_sells_only" />
               <label class="custom-control-label" for="view_paid_sells_only">{{ __( 'lang_v1.view_paid_sells_only' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'view_due_sells_only', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_due_sells_only' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_due_sells_only" />
               <label class="custom-control-label" for="view_due_sells_only">{{ __( 'lang_v1.view_due_sells_only' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'view_partial_sells_only', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_partially_paid_sells_only' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_partially_paid_sells_only" />
              <label class="custom-control-label" for="view_partially_paid_sells_only">{{ __( 'lang_v1.view_partially_paid_sells_only' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'view_overdue_sells_only', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_overdue_sells_only' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_overdue_sells_only" />
              <label class="custom-control-label" for="view_overdue_sells_only">{{ __( 'lang_v1.view_overdue_sells_only' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'direct_sell.access', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.add_sell' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="add_sell" />
              <label class="custom-control-label" for="add_sell">{{ __( 'lang_v1.add_sell' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'direct_sell.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.update_sale' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="update_sale" />
              <label class="custom-control-label" for="update_sale">{{ __( 'lang_v1.update_sale' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'direct_sell.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_sell' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="delete_sell" />
              <label class="custom-control-label" for="delete_sell"> {{ __( 'lang_v1.delete_sell' ) }}</label>
            </div>
          </div>
          @endif
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'view_commission_agent_sell', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_commission_agent_sell' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_commission_agent_sell" />
              <label class="custom-control-label" for="view_commission_agent_sell">{{ __( 'lang_v1.view_commission_agent_sell' ) }}</label>
            </div>
          </div>

          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'sell.payments', false, ['class' => 'input-icheck']); !!}
                {{ __('lang_v1.add_sell_payment') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="add_sell_payment" />
              <label class="custom-control-label" for="add_sell_payment"> {{ __('lang_v1.add_sell_payment') }}</label>
            </div>
            
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'edit_sell_payment', false, ['class' => 'input-icheck']); !!}
                {{ __('lang_v1.edit_sell_payment') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="edit_sell_payment" />
              <label class="custom-control-label" for="edit_sell_payment">{{ __('lang_v1.edit_sell_payment') }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'delete_sell_payment', false, ['class' => 'input-icheck']); !!}
                {{ __('lang_v1.delete_sell_payment') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="delete_sell_payment" />
              <label class="custom-control-label" for="delete_sell_payment">{{ __('lang_v1.delete_sell_payment') }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'edit_product_price_from_sale_screen', false, ['class' => 'input-icheck']); !!}
                {{ __('lang_v1.edit_product_price_from_sale_screen') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="edit_product_price_from_sale_screen" />
              <label class="custom-control-label" for="edit_product_price_from_sale_screen">{{ __('lang_v1.edit_product_price_from_sale_screen') }}</label>
            </div>
          </div>
          
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'edit_product_discount_from_sale_screen', false, ['class' => 'input-icheck']); !!}
                {{ __('lang_v1.edit_product_discount_from_sale_screen') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="edit_product_discount_from_sale_screen" />
              <label class="custom-control-label" for="edit_product_discount_from_sale_screen"> {{ __('lang_v1.edit_product_discount_from_sale_screen') }}</label>
            </div>
            
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'discount.access', false, ['class' => 'input-icheck']); !!}
                {{ __('lang_v1.discount.access') }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="discount_access" />
              <label class="custom-control-label" for="discount_access">  {{ __('lang_v1.discount.access') }}</label>
            </div>
          </div>
          @if(in_array('types_of_service', $enabled_modules))
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'access_types_of_service', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.access_types_of_service' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="access_types_of_service" />
              <label class="custom-control-label" for="access_types_of_service">{{ __( 'lang_v1.access_types_of_service' ) }}</label>
            </div>
          </div>
          @endif
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'access_sell_return', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.access_all_sell_return' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="access_all_sell_return" />
              <label class="custom-control-label" for="access_all_sell_return">{{ __( 'lang_v1.access_all_sell_return' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'access_own_sell_return', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.access_own_sell_return' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="access_own_sell_return" />
              <label class="custom-control-label" for="access_own_sell_return">{{ __( 'lang_v1.access_own_sell_return' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'edit_invoice_number', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.add_edit_invoice_number' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="permissions[]" class="custom-control-input" id="add_edit_invoice_number" />
              <label class="custom-control-label" for="add_edit_invoice_number">{{ __( 'lang_v1.add_edit_invoice_number' ) }}</label>
            </div>
          </div>

        </div>
        </div>
        <hr>
      @if(!empty($pos_settings['enable_sales_order']))
        <div class="row check_group">
          <div class="col-md-2">
            <h4>@lang( 'lang_v1.sales_order' )</h4>
          </div>
          <div class="col-md-2">
            <!-- <div class="checkbox">
                <label>
                  <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                </label>
              </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="role_select_all2" />
              <label class="custom-control-label" for="role_select_all2"> {{ __( 'role.select_all' ) }}</label>
            </div>
              
          </div>
          <div class="col-md-8">
            <div class="col-md-12">
              <!-- <div class="checkbox">
                <label>
                  {!! Form::radio('radio_option[so_view]', 'so.view_all', false, 
                  [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_so' ) }}
                </label>
              </div> -->
              <div class="custom-control custom-radio">
                  <input type="radio" id="view_all_so" name="radio_option[so_view]" class="custom-control-input"  />
                  <label class="custom-control-label" for="view_all_so1">{{ __( 'lang_v1.view_all_so' ) }}</label>
              </div>
            </div>
            <div class="col-md-12">
              <!-- <div class="checkbox">
                <label>
                  {!! Form::radio('radio_option[so_view]', 'so.view_own', false, 
                  [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_so' ) }}
                </label>
              </div> -->
              <div class="custom-control custom-radio">
                  <input type="radio" id="view_own_so" name="radio_option[so_view]" class="custom-control-input"  />
                  <label class="custom-control-label" for="view_own_so"> {{ __( 'lang_v1.view_own_so' ) }}</label>
              </div>
            </div>
            <div class="col-md-12">
              <!-- <div class="checkbox">
                <label>
                  {!! Form::checkbox('permissions[]', 'so.create', false, 
                  [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.create_so' ) }}
                </label>
              </div> -->
              <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="permissions[]" class="custom-control-input" id="create_so" />
                     <label class="custom-control-label" for="create_so">{{ __( 'lang_v1.create_so' ) }}</label>
              </div>
            </div>
            <div class="col-md-12">
              <!-- <div class="checkbox">
                <label>
                  {!! Form::checkbox('permissions[]','so.update', false, 
                  [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.edit_so' ) }}
                </label>
              </div> -->
              <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="permissions[]" class="custom-control-input" id="edit_so" />
                     <label class="custom-control-label" for="edit_so">{{ __( 'lang_v1.edit_so' ) }}</label>
              </div>
            </div>
            <div class="col-md-12">
              <!-- <div class="checkbox">
                <label>
                  {!! Form::checkbox('permissions[]', 'so.delete', false, 
                  [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_so' ) }}
                </label>
              </div> -->
              <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="permissions[]" class="custom-control-input" id="delete_so" />
                     <label class="custom-control-label" for="delete_so">{{ __( 'lang_v1.delete_so' ) }}</label>
              </div>
            </div>

          </div>
        </div>
        <hr>
      @endif
      <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'sale.draft' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" id="role_select_all4"  />
                     <label class="custom-control-label" for="role_select_all4">{{ __( 'role.select_all' ) }}</label>
              </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
        <!-- <div class="checkbox">
          <label>
            {!! Form::radio('radio_option[draft_view]', 'draft.view_all', false, 
            [ 'class' => 'input-icheck']) !!} {{ __( 'lang_v1.view_all_drafts' ) }}
          </label>
        </div> -->
        <div class="custom-control custom-radio">
          <input type="radio" id="view_all_drafts" name="radio_option[draft_view]" class="custom-control-input" />
          <label class="custom-control-label" for="view_all_drafts">{{ __( 'lang_v1.view_all_drafts' ) }}</label>
        </div>
      </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[draft_view]', 'draft.view_own', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_drafts' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
          <input type="radio" id="view_own_drafts" name="radio_option[draft_view]" class="custom-control-input" />
          <label class="custom-control-label" for="view_own_drafts">{{ __( 'lang_v1.view_own_drafts' ) }}</label>
        </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'draft.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.edit_draft' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
          <input type="radio" id="edit_draft" name="radio_option[draft_view]" class="custom-control-input" />
          <label class="custom-control-label" for="edit_draft">{{ __( 'lang_v1.edit_draft' ) }}</label>
        </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'draft.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_draft' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
          <input type="radio" id="delete_draft" name="radio_option[draft_view]" class="custom-control-input" />
          <label class="custom-control-label" for="delete_draft">{{ __( 'lang_v1.delete_draft' ) }}</label>
        </div>
            
          </div>

        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'lang_v1.quotation' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="role_select_all5"  />
              <label class="custom-control-label" for="role_select_all5">{{ __( 'role.select_all' ) }}</label>
            </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
        <!-- <div class="checkbox">
          <label>
            {!! Form::radio('radio_option[quotation_view]', 'quotation.view_all', false, 
            [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_quotations' ) }}
          </label>
        </div> -->
        <div class="custom-control custom-radio">
          <input type="radio" id="view_all_quotations" name="radio_option[quotation_view]" class="custom-control-input" />
          <label class="custom-control-label" for="view_all_quotations">{{ __( 'lang_v1.view_all_quotations' ) }}</label>
        </div>
      </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::radio('radio_option[quotation_view]', 'quotation.view_own', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_quotations' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
                         <input type="radio" id="view_own_quotations" name="radio_option[quotation_view]" class="custom-control-input" />
                          <label class="custom-control-label" for="view_own_quotations">{{ __( 'lang_v1.view_own_quotations' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'quotation.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.edit_quotation' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-radio">
              <input type="radio" id="edit_quotation" name="radio_option[quotation_view]" class="custom-control-input" />
              <label class="custom-control-label" for="edit_quotation">{{ __( 'lang_v1.edit_quotation' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'quotation.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_quotation' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="delete_quotation"  />
              <label class="custom-control-label" for="delete_quotation">{{ __( 'lang_v1.delete_quotation' ) }}</label>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'lang_v1.shipments' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="role.select_all6"  />
              <label class="custom-control-label" for="role.select_all6">{{ __( 'role.select_all' ) }}</label>
            </div>
        </div>
        <div class="col-md-7">
            <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::radio('radio_option[shipping_view]', 'access_shipping', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.access_all_shipments') }}
                  </label>
                </div> -->
                <div class="custom-control custom-radio">
                  <input type="radio" id="access_all_shipments" name="radio_option[shipping_view]" class="custom-control-input" />
                  <label class="custom-control-label" for="access_all_shipments"> {{ __('lang_v1.access_all_shipments') }}</label>
                </div>

            </div>
            <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::radio('radio_option[shipping_view]', 'access_own_shipping', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.access_own_shipping') }}
                  </label>
                </div> -->
                <div class="custom-control custom-radio">
                  <input type="radio" id="access_own_shipping" name="radio_option[shipping_view]" class="custom-control-input" />
                  <label class="custom-control-label" for="access_own_shipping">{{ __('lang_v1.access_own_shipping') }}</label>
                </div>
            </div>
            <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'access_pending_shipments_only', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.access_pending_shipments_only') }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" class="custom-control-input" id="access_pending_shipments_only"  />
                  <label class="custom-control-label" for="access_pending_shipments_only">{{ __('lang_v1.access_pending_shipments_only') }}</label>
                </div>
            </div>
            <div class="col-md-12">
                <!-- <div class="checkbox">
                  <label>
                    {!! Form::checkbox('permissions[]', 'access_commission_agent_shipping', false, ['class' => 'input-icheck']); !!}
                    {{ __('lang_v1.access_commission_agent_shipping') }}
                  </label>
                </div> -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="permissions[]" class="custom-control-input" id="access_commission_agent_shipping"  />
                  <label class="custom-control-label" for="access_commission_agent_shipping">{{ __('lang_v1.access_commission_agent_shipping') }}</label>
                </div>
            </div>
        </div>
    </div>
    <hr>
        <div class="row check_group">
      <div class="col-md-3">
        <h4>@lang( 'cash_register.cash_register' )</h4>
      </div>
      <div class="col-md-2">
        <!-- <div class="checkbox">
            <label>
              <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
            </label>
          </div> -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_select_all_6"  />
            <label class="custom-control-label" for="role_select_all_6">{{ __( 'role.select_all' ) }}</label>
          </div>
      </div>
      <div class="col-md-7">
        <div class="col-md-12">
          <!-- <div class="checkbox">
            <label>
              {!! Form::checkbox('permissions[]', 'view_cash_register', false, 
              [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_cash_register' ) }}
            </label>
          </div> -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]" class="custom-control-input" id="view_cash_register"  />
            <label class="custom-control-label" for="view_cash_register">{{ __( 'lang_v1.view_cash_register' ) }}</label>
          </div>
        </div>
        <div class="col-md-12">
          <!-- <div class="checkbox">
            <label>
              {!! Form::checkbox('permissions[]', 'close_cash_register', false, 
              [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.close_cash_register' ) }}
            </label>
          </div> -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]" class="custom-control-input" id="close_cash_register"  />
            <label class="custom-control-label" for="close_cash_register"> {{ __( 'lang_v1.close_cash_register' ) }}</label>
          </div>
          
        </div>
      </div>
      </div>
        <hr>
        
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'role.brand' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox"  class="custom-control-input" id="roleselectall1" />
            <label class="custom-control-label" for="roleselectall1"> {{ __( 'role.select_all' ) }}</label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'brand.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.view' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="role_brand_view" />
            <label class="custom-control-label" for="role_brand_view"> {{ __( 'role.brand.view' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'brand.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="role_brand_create" />
            <label class="custom-control-label" for="role_brand_create">  {{ __( 'role.brand.create' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'brand.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="role_brand_update" />
            <label class="custom-control-label" for="role_brand_update">{{ __( 'role.brand.update' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'brand.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="role.brand.delete" />
            <label class="custom-control-label" for="role.brand.delete">{{ __( 'role.brand.delete' ) }}</label>
          </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'role.tax_rate' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="roleselectall2" />
            <label class="custom-control-label" for="roleselectall2"> {{ __( 'role.select_all' ) }}</label>
          </div>
        </div>
        <div class="col-md-8">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'tax_rate.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.view' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="tax_rate.view" />
            <label class="custom-control-label" for="tax_rate.view"> {{ __( 'role.tax_rate.view' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'tax_rate.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="permissions[]"  class="custom-control-input" id="tax_rate.create" />
            <label class="custom-control-label" for="tax_rate.create">  {{ __( 'role.tax_rate.create' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'tax_rate.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]"  class="custom-control-input" id="tax_rate.update" />
                <label class="custom-control-label" for="tax_rate.update">  {{ __( 'role.tax_rate.update' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'tax_rate.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]"  class="custom-control-input" id="tax_rate.delete" />
                <label class="custom-control-label" for="tax_rate.delete">   {{ __( 'role.tax_rate.delete' ) }}</label>
          </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'role.unit' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="roleselectall3" />
                <label class="custom-control-label" for="roleselectall3">  {{ __( 'role.select_all' ) }}</label>
          </div>

        </div>
        <div class="col-md-8">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'unit.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.view' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="unit_view" />
                <label class="custom-control-label" for="unit_view"> {{ __( 'role.unit.view' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'unit.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="unit_create" />
                <label class="custom-control-label" for="unit_create">{{ __( 'role.unit.create' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'unit.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="unit.update" />
                <label class="custom-control-label" for="unit.update">{{ __( 'role.unit.update' ) }}</label>
          </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'unit.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="role_unit_delete" />
                <label class="custom-control-label" for="role_unit_delete">{{ __( 'role.unit.delete' ) }}</label>
          </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'category.category' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="roleselectall30" />
                <label class="custom-control-label" for="roleselectall30">{{ __( 'role.select_all' ) }}</label>
          </div>
            
        </div>
        <div class="col-md-8">
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'category.view', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.view' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="category.view" />
                <label class="custom-control-label" for="category.view">{{ __( 'role.category.view' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'category.create', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.create' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="category_create" />
                <label class="custom-control-label" for="category_create">{{ __( 'role.category.create' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'category.update', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.update' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="category_update" />
                <label class="custom-control-label" for="category_update"> {{ __( 'role.category.update' ) }}</label>
            </div>
          </div>
          <div class="col-md-12">
            <!-- <div class="checkbox">
              <label>
                {!! Form::checkbox('permissions[]', 'category.delete', false, 
                [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.delete' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="category.delete" />
                <label class="custom-control-label" for="category.delete"> {{ __( 'role.category.delete' ) }}</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'role.report' )</h4>
        </div>
        <div class="col-md-2">
          <!-- <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
              </label>
            </div> -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input" id="roleselectall5" />
                <label class="custom-control-label" for="roleselectall5"> {{ __( 'role.select_all' ) }}</label>
            </div>
        </div>
        <div class="col-md-8">
            @if(in_array('purchases', $enabled_modules) || in_array('add_sale', $enabled_modules) || in_array('pos_sale', $enabled_modules))
              <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('permissions[]', 'purchase_n_sell_report.view', false, 
                    [ 'class' => 'custom-control-input', 'id' => 'purchaseNSell']); !!}
                    <label class="custom-control-label" for="purchaseNSell">  {{ __( 'role.purchase_n_sell_report.view' ) }}</label>
                </div>
              </div>
            @endif
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
              
                {!! Form::checkbox('permissions[]', 'tax_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'taxreportview']); !!} 
                <label class="custom-control-label" for="taxreportview">
                {{ __( 'role.tax_report.view' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
           
                {!! Form::checkbox('permissions[]', 'contacts_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'contactsreportview']); !!}
                <label class="custom-control-label" for="contactsreportview">
                {{ __( 'role.contacts_report.view' ) }}
              </label>
            </div>
          </div>
          @if(in_array('expenses', $enabled_modules))
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            
                {!! Form::checkbox('permissions[]', 'expense_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'expensereportview']); !!} 
                <label for="expensereportview" class="custom-control-label">
                {{ __( 'role.expense_report.view' ) }}
              </label>
            </div>
          </div>
          @endif
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
           
                {!! Form::checkbox('permissions[]', 'profit_loss_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'profitlossreportview']); !!} 
                <label  class="custom-control-label" for="profitlossreportview">
                {{ __( 'role.profit_loss_report.view' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
              
                {!! Form::checkbox('permissions[]', 'stock_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'stockreportview']); !!} 
                <label class="custom-control-label" for="stockreportview">
                {{ __( 'role.stock_report.view' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'trending_product_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'trendingproductreportview']); !!}
              <label class="custom-control-label" for="trendingproductreportview">
                 {{ __( 'role.trending_product_report.view' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'register_report.view', false, 
                [ 'class' => 'custom-control-input','id'=>'registerreportview']); !!}
              <label class="custom-control-label" for="registerreportview" >
               {{ __( 'role.register_report.view' ) }}
              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'sales_representative.view', false, 
                [ 'class' => 'custom-control-input','id'=>'salesrepresentativeview']); !!}
              <label class="custom-control-label"   for="salesrepresentativeview">
             {{ __( 'role.sales_representative.view' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'view_product_stock_value', false, 
                [ 'class' => 'custom-control-input','id'=>'viewproductstockvalue']); !!}
              <label class="custom-control-label" for="viewproductstockvalue">
               {{ __( 'lang_v1.view_product_stock_value' ) }}
              </label>
            </div>
          </div> 

        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-2">
          <h4>@lang( 'role.settings' )</h4>
        </div>
        <div class="col-md-2">
          <div  class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="roleselectall45">
              <label   class="custom-control-label" for="roleselectall45">
                 {{ __( 'role.select_all' ) }}
              </label>
            </div>
        </div>
        <div class="col-md-8">
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'business_settings.access', false, 
                [ 'class' => 'custom-control-input','id'=>'businesssettingsaccess']); !!}
              <label class="custom-control-label" for="businesssettingsaccess" >
               {{ __( 'role.business_settings.access' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'barcode_settings.access', false, 
                [ 'class' => 'custom-control-input','id'=>'barcodesettingsaccess']); !!}
              <label class="custom-control-label" for="barcodesettingsaccess" >
              {{ __( 'role.barcode_settings.access' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'invoice_settings.access', false, 
                [ 'class' => 'custom-control-input','id'=>'invoicesettingsaccess']); !!}
              <label class="custom-control-label" for="invoicesettingsaccess" >
               {{ __( 'role.invoice_settings.access' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            {!! Form::checkbox('permissions[]', 'access_printers', false,['class' => 'custom-control-input','id'=>'accessprinters']); !!}
              <label class="custom-control-label" for="accessprinters">
             
                {{ __('lang_v1.access_printers') }}
              </label>
            </div>
          </div>
        </div>
        </div>
        @if(in_array('expenses', $enabled_modules))
            <hr>
            <div class="row check_group">
                <div class="col-md-2">
                  <h4>@lang( 'lang_v1.expense' )</h4>
                </div>
                <div class="col-md-2">
                  <div  class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="roleselectall40" >
                      <label class="custom-control-label"  for="roleselectall40">
                        {{ __( 'role.select_all' ) }}
                      </label>
                    </div>
                </div>
                <div class="col-md-8">
                  <div class="col-md-12">
                        <div  class="custom-control custom-checkbox">
                        {!! Form::radio('radio_option[expense_view]', 'all_expense.access', false, 
                            [ 'class' => 'custom-control-input','id'=>'accessallexpense']); !!}
                          <label  class="custom-control-label" for="accessallexpense">
                          {{ __( 'lang_v1.access_all_expense' ) }}
                          </label>
                        </div>
                      </div>
                    <div class="col-md-12">
                        <div  class="custom-control custom-checkbox">
                        {!! Form::radio('radio_option[expense_view]', 'view_own_expense', false,['class' => 'custom-control-input','id'=>'view_ownexpense']); !!}
                      <label  class="custom-control-label" for="view_ownexpense"  >
                       
                        {{ __('lang_v1.view_own_expense') }}
                      </label>
                        </div>
                  </div>
                  <div class="col-md-12">
                    <div  class="custom-control custom-checkbox">
                    {!! Form::checkbox('permissions[]', 'expense.add', false, 
                        [ 'class' => 'custom-control-input','id'=>'addexpense']); !!}
                      <label  class="custom-control-label" for="addexpense">
                         {{ __( 'expense.add_expense' ) }}
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div  class="custom-control custom-checkbox">
                   
                        {!! Form::checkbox('permissions[]', 'expense.edit', false, 
                        [ 'class' => 'custom-control-input','id'=>'editexpense']); !!}
                        <label  class="custom-control-label" for="editexpense"> {{ __( 'expense.edit_expense' ) }}</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div  class="custom-control custom-checkbox">
                     
                        {!! Form::checkbox('permissions[]', 'expense.delete', false, 
                        [ 'class' => 'custom-control-input','id'=>'deleteexpense']); !!} 
                        <label  class="custom-control-label" for="deleteexpense">
                        {{ __( 'lang_v1.delete_expense' ) }}
                      </label>
                    </div>
                  </div>
                </div>
            </div>
        @endif
        <hr>
        <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'role.dashboard' ) @show_tooltip(__('tooltip.dashboard_permission'))</h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
             
                {!! Form::checkbox('permissions[]', 'dashboard.data', true, 
                [ 'class' => 'custom-control-input','id'=>'dashboarddata']); !!} 
                <label  class="custom-control-label" for="dashboarddata">
                {{ __( 'role.dashboard.data' ) }}
              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-3">
          <h4>@lang( 'account.account' )</h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
              
                {!! Form::checkbox('permissions[]', 'account.access', false, 
                [ 'class' => 'custom-control-input','id'=>'accessaccounts']); !!} 
                <label  class="custom-control-label" for="accessaccounts">
                {{ __( 'lang_v1.access_accounts' ) }}
              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
              
                {!! Form::checkbox('permissions[]', 'edit_account_transaction', false, 
                [ 'class' => 'custom-control-input','id'=>'editaccounttransaction']); !!}
                <label  class="custom-control-label" for="editaccounttransaction">
                 {{ __( 'lang_v1.edit_account_transaction' ) }}
              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
             
                {!! Form::checkbox('permissions[]', 'delete_account_transaction', false, 
                [ 'class' => 'custom-control-input','id'=>'deleteaccounttransaction']); !!} 
                <label  class="custom-control-label" for="deleteaccounttransaction">
                {{ __( 'lang_v1.delete_account_transaction' ) }}
              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        @if(in_array('booking', $enabled_modules))
        <div class="row check_group">
        <div class="col-md-1">
          <h4>@lang( 'restaurant.bookings' )</h4>
        </div>
        <div class="col-md-2">
          <div  class="custom-control custom-checkbox">
              <label  class="custom-control-label">
                <input type="checkbox" class="custom-control-label" > {{ __( 'role.select_all' ) }}
              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
            
                {!! Form::radio('radio_option[bookings_view]', 'crud_all_bookings', false, 
                [ 'class' => 'custom-control-input','id'=>'addeditviewallbooking']); !!}
                <label  class="custom-control-label" for="addeditviewallbooking"> 
                {{ __( 'restaurant.add_edit_view_all_booking' ) }}
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
                {!! Form::radio('radio_option[bookings_view]', 'crud_own_bookings', false, 
                [ 'class' => 'custom-control-input','id'=>'addeditviewownbooking']); !!} 
              <label  class="custom-control-label" for="addeditviewownbooking">

                {{ __( 'restaurant.add_edit_view_own_booking' ) }}
              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        @endif
        <div class="row">
        <div class="col-md-3">
          <h4>@lang( 'lang_v1.access_selling_price_groups' )</h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
              
                {!! Form::checkbox('permissions[]', 'access_default_selling_price', true, 
                [ 'class' => 'custom-control-input']); !!}
                <label  class="custom-control-label" for="defaultsellingprice"> 
                {{ __('lang_v1.default_selling_price') }}
              </label>
            </div>
          </div>
          @if(count($selling_price_groups) > 0)
          @foreach($selling_price_groups as $selling_price_group)
          <div class="col-md-12">
            <div  class="custom-control custom-checkbox">
          
                {!! Form::checkbox('spg_permissions[]', 'selling_price_group.' . $selling_price_group->id, false, 
                [ 'class' => 'custom-control-input','id'=>'sellingpricegroup']); !!} 
                <label  class="custom-control-label" for="sellingpricegroup">
                {{ $selling_price_group->name }}

              </label>
            </div>
          </div>
          @endforeach
          @endif
        </div>
        </div>
        @if(in_array('tables', $enabled_modules))
          <div class="row">
            <div class="col-md-3">
              <h4>@lang( 'restaurant.restaurant' )</h4>
            </div>
            <div class="col-md-9">
              <div class="col-md-12">
                <div  class="custom-control custom-checkbox">
                  
                    {!! Form::checkbox('permissions[]', 'access_tables', false, 
                    [ 'class' => 'custom-control-input','id'=>'accesstables']); !!} 
                    <label  class="custom-control-label" for="accesstables">
                    {{ __('lang_v1.access_tables') }}
                  </label>
                </div>
              </div>
            </div>
          </div>
        @endif
        
        @include('role.partials.module_permissions')
        <div class="row">
        <div class="col-md-12">
           <button type="submit" class="btn btn-primary pull-right">@lang( 'messages.save' )</button>
        </div>
        </div>

        {!! Form::close() !!}
    @endcomponent
</section>
<!-- /.content -->
@endsection