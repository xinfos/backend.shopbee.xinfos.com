@extends('layouts.auth')

@section('auth_content')
<div class="col-lg-5">
    <div class="card">
        <div class="card-header pt-4 pb-4 text-center bg-primary">
            <a href="index.html">
                <span><img src="/assets/images/logo.png" alt="" height="60"></span>
            </a>
        </div>
        <div class="card-body p-4">
            <div class="text-center m-auto">
                <img src="/assets/images/mail_sent.svg" alt="mail sent image" height="64">
                <h4 class="text-dark-50 text-center mt-4 font-weight-bold">Please check your email</h4>
                <p class="text-muted mb-4">
                    A email has been send to <b>youremail@domain.com</b>.
                    Please check for an email from company and click on the included link to
                    reset your password.
                </p>
            </div>
            <form action="index.html">
                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-home mr-1"></i> Back to Home</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection