@extends('layouts.applogin')

@section('content')
<div class="container-fluid">
    <div class="login-form-bg h-1000">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="card login-form mb-0">
                    <div class="card-body pt-5">
                        <h2 class="text-center">Login</h2>

                        <form method="POST" class="mt-5 mb-4 login-input" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Saya') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn login-form__btn submit w-50">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                        
                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-12 text-center">
                                <a href="{{ url('auth/google') }}" >
                                    <img src="{{URL::asset('assets/images/btn_google_signin_dark_focus_web.png')}}" alt="" class="img-fluid">
                                </a> 
                            </div>
                        </div>
                        @if (Route::has('register'))
                        <p class="login-form__footer">Belum Mempunyai Akun? <a class="text-primary" href="{{ route('register') }}">Buat Akun</a> Sekarang</p>
                                 
                        @endif
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
