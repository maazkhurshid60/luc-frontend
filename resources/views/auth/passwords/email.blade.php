@extends('layouts.app')

@section('content')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>{{ __('RS-POS') }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ __('Reset Password') }}</p>
        <form method="POST"  class="form-element" action="{{ route('password.email') }}">
        @csrf
        @if (session('status'))
             <div class="alert alert-danger">
                 <small>{{ session('status') }}</small>
             </div>
         @endif
     

        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control"  placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus >
            <span class="ion ion-email form-control-feedback"></span>                     
        </div>

   

      <div class="row">
        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block btn-flat margin-top-10">{{ __('Send Password Reset Link') }}</button>
        </div>
        <!-- /.col -->
       
            <div class="col-6 margin-top-10">
             <div class="fog-pwd">
                <a href="{{ route('login') }}"><i class="ion ion-locked"></i> {{ __('Login Here') }}</a><br>
              </div>
            </div>
                                    
      
        
      </div>
    </form>



    

  </div>
  <!-- /.login-box-body -->
</div>

</body>

@endsection
