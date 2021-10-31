@extends('auth.base')

@section('content')
    <div class="card overflow-hidden">
        <div class="bg-primary bg-soft">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-4">
                        <h5 class="text-primary">Xoş Gəlmisiz !</h5>
                        <p>Sign in to continue to  Admin.</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="auth-logo">
                <a href="index.html" class="auth-logo-light">
                    <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" class="rounded-circle" height="34">
                    </span>
                    </div>
                </a>

                <a href="index.html" class="auth-logo-dark">
                    <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" class="rounded-circle" height="44">
                    </span>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                    </div>
                    <div class="mt-3 d-grid">
                        <a href="/register" class="btn btn-secondary waves-effect waves-light" >Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
