@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="wrapper fadeInDown">
             <div id="formContent">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" id="login" value="{{ old('email') }}" class="fadeIn second @error('email') is-invalid @enderror" name="email" placeholder="{{__('text.email')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password" id="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{__('text.password')}}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                   <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            remember me
                        </label>
                    </div>
                    <input type="submit" class="fadeIn fourth" value="log_in">
                    @if (Route::has('password.request'))
                        <div id="formFooter">
                           <a class="underlineHover" href="{{route('password.request')}}">forget password</a>
                        </div>
                    @endif
                </form>
             </div>
         </div>
    </div>
</div>
@endsection
