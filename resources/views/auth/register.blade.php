@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">

                    </div>
                    <div class="card-body px-lg-5 "><!--py-lg-5-->
                        <div class="text-center text-muted mb-4">
                            {{-- <small>{{ __('Or sign up with credentials') }}</small> --}}
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-phone-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" type="phone" name="phone" value="{{ old('phone') }}" required>
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
                                        <span class="input-group-text"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            {{-- <div class="text-muted font-italic">
                                <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                            </div> --}}
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="privacyPolicy" >
                                        <label class="custom-control-label" for="privacyPolicy">
                                            <span class="text-muted">{{ __('J\'accepte') }} <a href="#!">{{ __('les conditions d\'utilisation') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="form-submit" class="btn btn-primary mt-4" >{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
{{-- <script>


    // $(document).ready(function () {

    //     $('#privacyPolicy').click(function (e) {
    //         e.preventDefault();
    //         var checkbox =document.getElementById("privacyPolicy");
    //         var submit = document.getElementById("form-submit");
    //         if(checkbox.checked == true){

    //             submit.disabled = false;
    //         }else{
    //             alert(submit)
    //             submit.disabled = true;
    //         }
    //     });

    // });
</script>
@endpush --}}

