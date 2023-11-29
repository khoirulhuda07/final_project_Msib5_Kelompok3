@extends('layouts.app')

@section('content')

<main id="main">
    <section class="vh-100">
<div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 " data-aos="fade-right" data-aos-delay="100">
                    <img src="{{asset('homepage/img/login/login1.jpg')}}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 " data-aos="fade-left" data-aos-delay="200">
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <!-- <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label> -->
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter a valid email address">
                            <label class="form-label" for="form3Example3">Email address</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <!-- <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label> -->
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                            placeholder="Password">
                            <label class="form-label" for="form3Example4">Password</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                             <!-- Checkbox -->
                            <!-- <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me -->
                                <!-- </label> -->
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>
                            <!-- <a href="#!" class="text-body">Forgot password?</a> -->
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <!-- <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button> -->
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                    {{ __('Login') }}
                                </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{('register')}}" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </section>
</main>


@endsection