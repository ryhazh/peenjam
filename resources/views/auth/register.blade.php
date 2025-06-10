@extends('layouts.admin')
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
                        <div class="card-body h-100 py-5 d-flex flex-column justify-content-center">
                            <div class="text-right">
                                <h1>Sign up</h1>
                            </div>
                            <form action="{{ route('auth.register') }}" method="POST">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                </div>
                                <div class="mb-2">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        required>
                                </div>


                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                </div>
                                <div class="mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>
                                <div>
                                    <p>Already have an account? <a href="/login">Sign In</a></p>
                                </div>
                                <div class="justify-content-center pt-4">
                                    <button class="btn btn-primary w-100">Sign Up</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
