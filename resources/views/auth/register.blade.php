@extends('layouts.master')

@section('content')

    <h1>Registration</h1>

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
                    <form action="/register" method="post">
                        @csrf

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Name</label>
                            <input type="text" id="form1Example13" class="form-control form-control-lg" name="name" />
                            {{-- <label class="form-label" for="form1Example13">Name</label> --}}
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email</label>
                            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Confirm password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password_confirmation" />
                        </div>

                        <div style="margin-top: 36px;">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                            <span class="mx-4">OR</span>
                            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
