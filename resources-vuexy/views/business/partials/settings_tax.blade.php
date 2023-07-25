<div class="pos-tab-content">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_label_1', __('business.tax_1_name') . ':') !!}
                <!-- <div class="input-group">
                    <span class="input-group-addon" style="margin-top:7px; margin:5px;">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_label_1', $business->tax_label_1, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div> -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-info"></i></span>
                    </div>
                    {!! Form::text('tax_label_1', $business->tax_label_1, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_number_1', __('business.tax_1_no') . ':') !!}
                <!-- <div class="input-group">
                    <span class="input-group-addon" style="margin-top:7px; margin:5px;">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_number_1', $business->tax_number_1, ['class' => 'form-control']); !!}
                </div> -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-info"></i></span>
                    </div>
                    {!! Form::text('tax_number_1', $business->tax_number_1, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_label_2', __('business.tax_2_name') . ':') !!}
                <!-- <div class="input-group">
                    <span class="input-group-addon" style="margin-top:7px; margin:5px;">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_label_2', $business->tax_label_2, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div> -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-info"></i></span>
                    </div>
                    {!! Form::text('tax_label_2', $business->tax_label_2, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_number_2', __('business.tax_2_no') . ':') !!}
                <!-- <div class="input-group">
                    <span class="input-group-addon" style="margin-top:7px; margin:5px;">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_number_2', $business->tax_number_2, ['class' => 'form-control']); !!}
                </div> -->
                {!! Form::text('tax_number_2', $business->tax_number_2, ['class' => 'form-control']); !!}
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    {!! Form::checkbox('enable_inline_tax', 1, $business->enable_inline_tax , 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.enable_inline_tax' ) }}
                  </label>
                </div>
            </div>
        </div>
    </div>
</div>