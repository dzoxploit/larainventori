@extends('layouts.app')

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <a href="{{url('/dashboard')}}">
      <img src="{{ asset("image/lara.png") }}" id='logo1'>
    </a><br/>
    <p class="login-box-msg">Applikasi inventori barang</p>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
      {{ csrf_field() }}
      
      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me<br/><br/>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/password/reset')}}">
             Forgot password
              </a
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
@endsection
