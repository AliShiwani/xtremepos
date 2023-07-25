@extends('layouts.auth2')
@section('title', __('lang_v1.register'))

@section('content')
<div class="d-flex col-lg-8 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-8 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1"></h2>
            
                                <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Register and Get Started in minutes 🚀</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather="home"></i> @if(empty($is_admin))
                                                <h3>@lang('business.business')</h3>
                                             @endif
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><i data-feather="tool"></i> @if(empty($is_admin))
                                                <h3>@lang('business.business_settings')</h3>
                                            @endif</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="aboutIcon-tab" data-toggle="tab" href="#aboutIcon" aria-controls="about" role="tab" aria-selected="false"><i data-feather="user"></i> @if(empty($is_admin))
                                        <h3>@lang('business.owner')</h3>
@endif</a>
                                        </li>
                                    </ul>
        {!! Form::open(['url' => route('business.postRegister'), 'method' => 'post', 'id' => 'business_register_form','files' => true ]) !!}
            @include('business.partials.register_form')
        {!! Form::hidden('package_id', $package_id); !!}
    {!! Form::close() !!}
                                   
 

@endsection
@section('javascript')
<script>
$(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('business.getRegister') }}?lang=" + $(this).val();
        });
    });
</script>
@endsection
@extends('layouts.auth2')
@section('title', __('lang_v1.register'))

@section('content')
<div class="d-flex col-lg-8 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-8 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1"></h2>
            
                                <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Register and Get Started in minutes 🚀</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather="home"></i>
                                             @if(empty($is_admin))
                                                <h3>@lang('business.business')</h3>
                                             @endif
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><i data-feather="tool"></i>
                                             @if(empty($is_admin))
                                                <h3>@lang('business.business_settings')</h3>
                                            @endif</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="aboutIcon-tab" data-toggle="tab" href="#aboutIcon" aria-controls="about" role="tab" aria-selected="false"><i data-feather="user"></i> 
                                            @if(empty($is_admin))
                                                <h3>@lang('business.owner')</h3>
                                            @endif</a>
                                        </li>
                                    </ul>
        {!! Form::open(['url' => route('business.postRegister'), 'method' => 'post', 'id' => 'business_register_form','files' => true ]) !!}
            @include('business.partials.register_form')
        {!! Form::hidden('package_id', $package_id); !!}
    {!! Form::close() !!}
                                   
 

@endsection
@section('javascript')
<script>
$(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('business.getRegister') }}?lang=" + $(this).val();
        });
    });
</script>
@endsection