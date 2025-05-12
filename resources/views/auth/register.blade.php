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
                            <div class="mt-3">
                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="">
                                </div>
                                <div class="mb-2">
                                    <label for="email">Password</label>
                                    <input type="password" name="email" class="form-control" id="">
                                </div>
                                <div>
                                    <p>Already have an account? <a href="/login">Sign In</a></p>
                                </div>
                            </div>
                            <div class="justify-content-center pt-4">
                                <button class="btn btn-primary w-100">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
