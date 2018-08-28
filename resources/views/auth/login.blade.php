@extends('layouts.app')

@section('content')

	


<main class="main-wrapper-inner" id="container">

            	<div class="container">

                    <div class="wrapper-inner">

<div class="clearfix"></div>
<div class="pagetitle" align="center">
        
           
               
           <h2 class="text-center">Login</h2>
       
    </div>


<div class="height30"></div>
<div>
    <div class="">
	
	
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	 <div class="col-md-2"></div> 
 	
	
	
        <div class="col-md-8">
        <div>
        @if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
    </div>
        
        
            <div class="panel panel-default ">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4">Username / Email</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control radiusoff" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label class="para black">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                               
                                <input name="" type="submit" value="Login" class="customsubmit">

                                <a class="btn btn-link para gold" href="{{ route('forgot-password') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
       <div class="col-md-2"></div> 
        
        
    </div>
</div>



</div>
</div>
<div class="clearfix height50"></div>
</main>


	
	
	
@include('footer')
@endsection
