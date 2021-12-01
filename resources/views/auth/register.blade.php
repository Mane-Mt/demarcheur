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
                        
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">

                                    <label for="password_confirmation">Numéro de Telephone</label>

                                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('ex: 90 00 00 00') }}" type="phone" name="phone" value="{{ old('phone') }}" required>
                                    <p class="text-danger"> * Ce numéro sera mis à la disponibinilité des utilisateurs pour vous contacter !!!</p>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('usertype') ? ' has-danger' : '' }}">

                                <label  for="usertype"> Type de compte</label>

                                 <select class="form-control" name="usertype" id="usertype" required>
                                    <option {{old('usertype') == "Simple" ? 'select' : '' }} value="Simple">Simple</option>
                                    <option {{old('usertype') == "Demarcheur" ? 'select' : '' }} value="Demarcheur">Demarcheur</option>
                                </select>
                                <p class="text-danger"> * Bientôt le compte demarcheur sera payant </p>
                            @if ($errors->has('usertype'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('usertype') }}</strong>
                                </span>
                            @endif
                        </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">

                                    <label for="password_confirmation">Mot de Passe</label>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">

                                    <label for="password_confirmation">Confirmer mot de passe</label>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>

                            </div>



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

