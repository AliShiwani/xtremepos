@extends('layouts.busines-auth')
@section('title', __('lang_v1.register'))
@include('layouts.partials.css')
@section('content')
<div class="login-form col-md-9 col-xs-12 right-col-content-register">
<h2 class="card-title font-weight-bold mb-1">Register🚀</h2>
    <p class="form-header text-white">@lang('business.register_and_get_started_in_minutes')</p>
    {!! Form::open(['url' => route('business.postRegister'), 'method' => 'post', 
                            'id' => 'business_register_form','files' => true ]) !!}
        @include('business.partials.register_form')
        {!! Form::hidden('package_id', $package_id); !!}
    {!! Form::close() !!}
</div>
@stop
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('business.getRegister') }}?lang=" + $(this).val();
        });
    })
</script>
@endsection