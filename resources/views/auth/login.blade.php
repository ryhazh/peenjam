@extends('layouts.admin')
@section('title', 'Login')
@section('content')
    <div class="container d-flex position-fixed top-50 start-50 translate-middle">
        <div class="row justify-content-center align-items-center w-100">
            <div class="card d-flex flex-column col-10">
                <div class="row row-0 flex-fill">
                    <div class="col-md-6 d-none d-md-block">
                        <a href="#">
                            <img src="https://eyeondesign.aiga.org/wp-content/uploads/2021/12/EOD-corporatememphis-final.png"
                                class="w-100 h-100 object-cover rounded rounded-end-0" style="margin-left: -8px"
                                alt="Card side image" />
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body h-100 d-flex flex-column justify-content-center">
                            <div class="text-center">
                                <h1>Sign in to your account</h1>
                            </div>
                            @if ($errors->has('login'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('login') }}
                                </div>
                            @endif
                            <form action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <div class="mt-3">
                                    <div class="mb-2">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                                    </div>
                                </div>
                                <div class="justify-content-center pt-4">
                                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
