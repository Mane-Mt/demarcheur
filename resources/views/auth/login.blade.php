@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container pb-5">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">
                <div class="row">

                    <div class="col-6 text-left mb-2">
                        <a href="{{ route('register') }}" class="text-light">
                            <div class="font-weight-bold">{{ __('S\'inscrire') }}</div>
                        </a>
                    </div>
                    <div class="col-6 text-right"></div>
                </div>
                <div class="card bg-secondary shadow border-0">
                    {{-- <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                        <div class="btn-wrapper text-center">
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div> --}}


                    <div class="card-body px-lg-5 py-lg-5">

                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-phone-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" type="phone" name="phone" value="{{ old('phone') }}" value="admin@argon.com" required autofocus>
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password"  required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    {{-- <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Mot de passe oublié?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light">
                            <small>{{ __('S\'inscrire') }}</small>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
