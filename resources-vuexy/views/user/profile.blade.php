@extends('layouts.app')
@section('title', __('lang_v1.my_profile'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('lang_v1.my_profile')</h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url' => action('UserController@updatePassword'), 'method' => 'post', 'id' => 'edit_password_form',
              'class' => 'form-horizontal' ]) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-solid"> <!--business info box start-->
                        <div class="card-header">
                            <div class="card-header">
                                <h3 class="card-title"> @lang('user.change_password')</h3>
                            </div>
                        </div>
                        <div class="box-body row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                {!! Form::label('current_password', __('user.current_password') . ':', ['class' => 'control-label']) !!}
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <div class="input-group">
                                        {!! Form::password('current_password', ['class' => 'form-control','placeholder' => __('user.current_password'), 'required']); !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                {!! Form::label('new_password', __('user.new_password') . ':', ['class' => 'control-label']) !!}
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <div class="input-group">
                                        {!! Form::password('new_password', ['class' => 'form-control','placeholder' => __('user.new_password'), 'required']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                {!! Form::label('confirm_password', __('user.confirm_new_password') . ':', ['class' => 'control-label']) !!}
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <div class="input-group">
                                        {!! Form::password('confirm_password', ['class' => 'form-control','placeholder' =>  __('user.confirm_new_password'), 'required']); !!}
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">@lang('messages.update')</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

{!! Form::open(['url' => action('UserController@updateProfile'), 'method' => 'post', 'id' => 'edit_user_profile_form', 'files' => true ]) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-solid"> <!--business info box start-->
                    <div class="card-header">
                        <div class="card-header">
                            <h3 class="card-title"> @lang('user.edit_profile')</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('surname', __('business.prefix') . ':') !!}
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            <div class="input-group">
                                {!! Form::text('surname', $user->surname, ['class' => 'form-control','placeholder' => __('business.prefix_placeholder')]); !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('first_name', __('business.first_name') . ':') !!}
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            <div class="input-group">
                                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control','placeholder' => __('business.first_name'), 'required']); !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('last_name', __('business.last_name') . ':') !!}
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            <div class="input-group">
                                {!! Form::text('last_name', $user->last_name, ['class' => 'form-control','placeholder' => __('business.last_name')]); !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('email', __('business.email') . ':') !!}
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            <div class="input-group">
                                {!! Form::email('email',  $user->email, ['class' => 'form-control','placeholder' => __('business.email') ]); !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('language', __('business.language') . ':') !!}
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            <div class="input-group">
                                {!! Form::select('language',$languages, $user->language, ['class' => 'form-control select2']); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                @component('components.widget', ['title' => __('lang_v1.profile_photo')])
                    @if(!empty($user->media))
                        <div class="col-md-12 text-center">
                            {!! $user->media->thumbnail([150, 150], 'img-circle') !!}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('profile_photo', __('lang_v1.upload_image') . ':') !!}
                            {!! Form::file('profile_photo', ['id' => 'profile_photo', 'accept' => 'image/*']); !!}
                            <small><p class="help-block">@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])</p></small>
                        </div>
                    </div>
                @endcomponent
            </div>
        </div>
    </div>
</div>

@include('user.edit_profile_form_part', ['bank_details' => !empty($user->bank_details) ? json_decode($user->bank_details, true) : null])
<div class="row">
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-big">@lang('messages.update')</button>
    </div>
</div>
{!! Form::close() !!}

</section>
<!-- /.content -->
@endsection