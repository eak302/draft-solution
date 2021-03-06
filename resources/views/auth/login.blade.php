@extends('auth.layouts.main')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><strong>Log in</strong> your account</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection