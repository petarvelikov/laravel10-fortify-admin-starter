@extends('layouts.master')

@section('content')

    <h1>Login</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="/login" method="post">
                        @csrf

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email</label>
                            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" name="remember" />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Login</button>

                        <span class="mx-4">OR</span>

                        <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection






