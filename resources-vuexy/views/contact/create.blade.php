<div class="modal-dialog modal-lg" style="margin-top:40px" role="document">
  <div class="modal-content">
  @php
    $form_id = 'contact_add_form';
    if(isset($quick_add)){
      $form_id = 'quick_add_contact';
    }

    if(isset($store_action)) {
      $url = $store_action;
      $type = 'lead';
      $customer_groups = [];
    } else {
      $url = action('ContactController@store');
      $type = isset($selected_type) ? $selected_type : '';
      $sources = [];
      $life_stages = [];
      $users = [];
    }
  @endphp
    {!! Form::open(['url' => $url, 'method' => 'post', 'id' => $form_id ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang('contact.add_contact')</h4>
    </div>

    <div class="modal-body">
        <div class="row">            
            <div class="col-md-4 contact_type_div">
                <div class="form-group">
                    {!! Form::label('type', __('contact.contact_type') . ':*' ) !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        {!! Form::select('type', $types, $type , ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"> <i class="fa fa-user"></i></span>
                        </div>
                        {!! Form::select('type', $types, $type , ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-15">
                <label class="radio-inline">
                    <input type="radio" name="contact_type_radio" id="inlineRadio1" value="individual">
                    @lang('lang_v1.individual')
                </label>
                <label class="radio-inline">
                    <input type="radio" name="contact_type_radio" id="inlineRadio2" value="business">
                    @lang('business.business')
                </label>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('contact_id', __('lang_v1.contact_id') . ':') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-id-badge"></i>
                        </span>
                        {!! Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">  <i class="fa fa-id-badge"></i></span>
                        </div>
                        {!! Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]); !!}
                    </div>
                    <p class="help-block">
                        @lang('lang_v1.leave_empty_to_autogenerate')
                    </p>
                </div>
            </div>
            <div class="col-md-12 customer_fields">
                <div class="form-group">
                  {!! Form::label('customer_group_id', __('lang_v1.customer_group') . ':') !!}
                  <!-- <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fa fa-users"></i>
                      </span>
                      {!! Form::select('customer_group_id', $customer_groups, '', ['class' => 'form-control']); !!}
                  </div> -->
                  <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"> <i class="fa fa-users"></i></span>
                        </div>
                        {!! Form::select('customer_group_id', $customer_groups, '', ['class' => 'form-control']); !!}
                    </div>
                </div>
            </div>
            <div class="clearfix customer_fields"></div>
            <div class="col-md-12 business" style="display: none;">
                <div class="form-group">
                    {!! Form::label('supplier_business_name', __('business.business_name') . ':') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        {!! Form::text('supplier_business_name', null, ['class' => 'form-control', 'placeholder' => __('business.business_name')]); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"> <i class="fa fa-briefcase"></i></span>
                        </div>
                        {!! Form::text('supplier_business_name', null, ['class' => 'form-control', 'placeholder' => __('business.business_name')]); !!}
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('prefix', __( 'business.prefix' ) . ':') !!}
                    {!! Form::text('prefix', null, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]); !!}
                </div>
            </div>
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('first_name', __( 'business.first_name' ) . ':*') !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]); !!}
                </div>
            </div>
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('middle_name', __( 'lang_v1.middle_name' ) . ':') !!}
                    {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.middle_name' ) ]); !!}
                </div>
            </div>
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('last_name', __( 'business.last_name' ) . ':') !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]); !!}
                </div>
            </div>
            <div class="clearfix"></div>
        
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('mobile', __('contact.mobile') . ':*') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-mobile"></i>
                        </span>
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile"></i></span>
                        </div>
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]); !!}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('alternate_number', __('contact.alternate_contact_number') . ':') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        {!! Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                        {!! Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('landline', __('contact.landline') . ':') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        {!! Form::text('landline', null, ['class' => 'form-control', 'placeholder' => __('contact.landline')]); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                        {!! Form::text('landline', null, ['class' => 'form-control', 'placeholder' => __('contact.landline')]); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('email', __('business.email') . ':') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        {!! Form::email('email', null, ['class' => 'form-control','placeholder' => __('business.email')]); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        {!! Form::email('email', null, ['class' => 'form-control','placeholder' => __('business.email')]); !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4 individual" style="display: none;">
                <div class="form-group">
                    {!! Form::label('dob', __('lang_v1.dob') . ':') !!}
                    <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        
                        {!! Form::text('dob', null, ['class' => 'form-control dob-date-picker','placeholder' => __('lang_v1.dob'), 'readonly']); !!}
                    </div> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                        </div>
                        {!! Form::text('dob', null, ['class' => 'form-control dob-date-picker','placeholder' => __('lang_v1.dob'), 'readonly']); !!}
                    </div>
                </div>
            </div>

            <!-- lead additional field -->
            <div class="col-md-4 lead_additional_div">
              <div class="form-group">
                  {!! Form::label('crm_source', __('lang_v1.source') . ':' ) !!}
                  <!-- <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa fa-search"></i>
                      </span>
                      {!! Form::select('crm_source', $sources, null , ['class' => 'form-control', 'id' => 'crm_source','placeholder' => __('messages.please_select')]); !!}
                  </div> -->
                  <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa fa-search"></i></span>
                        </div>
                        {!! Form::select('crm_source', $sources, null , ['class' => 'form-control', 'id' => 'crm_source','placeholder' => __('messages.please_select')]); !!}
                    </div>
              </div>
            </div>
            
            <div class="col-md-4 lead_additional_div">
              <div class="form-group">
                  {!! Form::label('crm_life_stage', __('lang_v1.life_stage') . ':' ) !!}
                  <!-- <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa fa-life-ring"></i>
                      </span>
                      {!! Form::select('crm_life_stage', $life_stages, null , ['class' => 'form-control', 'id' => 'crm_life_stage','placeholder' => __('messages.please_select')]); !!}
                  </div> -->
                  <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa fa-life-ring"></i></span>
                        </div>
                        {!! Form::select('crm_life_stage', $life_stages, null , ['class' => 'form-control', 'id' => 'crm_life_stage','placeholder' => __('messages.please_select')]); !!}
                    </div>
              </div>
            </div>
            <div class="col-md-6 lead_additional_div">
                  <div class="form-group">
                      {!! Form::label('user_id', __('lang_v1.assigned_to') . ':*' ) !!}
                      <!-- <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-user"></i>
                          </span>
                          {!! Form::select('user_id[]', $users, null , ['class' => 'form-control select2', 'id' => 'user_id', 'multiple', 'required', 'style' => 'width: 100%;']); !!}
                      </div> -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        {!! Form::select('user_id[]', $users, null , ['class' => 'form-control select2', 'id' => 'user_id', 'multiple', 'required', 'style' => 'width: 100%;']); !!}
                    </div>
                  </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <!-- <div class="col-md-12">
                <button type="button" class="btn btn-primary center-block more_btn" data-target="#more_div">@lang('lang_v1.more_info') <i class="fa fa-chevron-down"></i></button>
            </div> -->
            <div id="headingCollapse1" class="card-header btn btn-primary" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                <span class="lead collapse-title"> More Information</span>
            </div>
            <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                    <div class="form-group">
                    {!! Form::label('tax_number', __('contact.tax_no') . ':') !!}
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-info"></i></span>
                            </div>
                        {!! Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]); !!}
                    </div>
                    </div>
                    </div> 
                </div> 
                </div>
            </div>
            <div class="col-md-4 opening_balance">
                  <div class="form-group">
                      {!! Form::label('opening_balance', __('lang_v1.opening_balance') . ':') !!}
                      <!-- <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fas fa-money-bill-alt"></i>
                          </span>
                          {!! Form::text('opening_balance', 0, ['class' => 'form-control input_number']); !!}
                      </div> -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill-alt"></i></span>
                        </div>
                        {!! Form::text('opening_balance', 0, ['class' => 'form-control input_number']); !!}
                    </div>
                  </div>
                </div>
    <!--end collpase -->           
        </div> 
</div>
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}
  
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->