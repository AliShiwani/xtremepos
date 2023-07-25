@extends('layouts.auth2')
@section('title', __('lang_v1.login'))

@section('content')
<div class="d-flex col-lg-7 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">@lang('lang_v1.login')🚀</h2>
                                <p class="card-text mb-2"></p>
                                <form class="auth-register-form mt-2" method="POST" action="{{ route('login') }}" method="POST">
                                {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                    @php
                    $username = old('username');
                    $password = null;
                    if(config('app.env') == 'demo'){
                        $username = 'admin';
                        $password = '123456';

                        $demo_types = array(
                            'all_in_one' => 'admin',
                            'super_market' => 'admin',
                            'pharmacy' => 'admin-pharmacy',
                            'electronics' => 'admin-electronics',
                            'services' => 'admin-services',
                            'restaurant' => 'admin-restaurant',
                            'superadmin' => 'superadmin',
                            'woocommerce' => 'woocommerce_user',
                            'essentials' => 'admin-essentials',
                            'manufacturing' => 'manufacturer-demo',
                        );

                        if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){
                            $username = $demo_types[$_GET['demo_type']];
                        }
                    }
                @endphp
                                        <label class="form-label" for="register-username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" value="{{ $username }}" required autofocus placeholder="@lang('lang_v1.username')" aria-describedby="register-username" autofocus="" tabindex="1" />
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="form-label" for="register-password">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" class="form-control" name="password" value="{{ $password }}" required placeholder="@lang('lang_v1.password')" aria-describedby="register-password" tabindex="3" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="register-privacy-policy" {{ old('remember') ? 'checked' : '' }} type="checkbox" tabindex="4" />
                                            <label class="custom-control-label" for="register-privacy-policy">@lang('lang_v1.remember_me')<a href="javascript:void(0);">&nbsp;privacy policy & terms</a></label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="5">@lang('lang_v1.login')</button>
                                    @if(config('app.env') != 'demo')
                        <a href="{{ route('password.request') }}" class="pull-right">
                             @lang('lang_v1.forgot_your_password')
                        </a>
                              @endif
                                </form>
                                <p class="text-center mt-2"><span>Already have an account?</span><a href="{{ route('business.getRegister') }}"><span>&nbsp;Sign in instead</span></a></p>
                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
                            </div>
                        </div>
@stop
@section('javascript')
<script type="text/javascript">
   $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('login') }}?lang=" + $(this).val();
        });

        $('a.demo-login').click( function (e) {
           e.preventDefault();
           $('#username').val($(this).data('admin'));
           $('#password').val("{{$password}}");
           $('form#login-form').submit();
        });
    })
</script>
@endsection
