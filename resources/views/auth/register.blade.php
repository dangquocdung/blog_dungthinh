@extends('layouts.app')

@section('content')




<main class="main-wrapper-inner" id="container">

            	<div class="container">

                    <div class="wrapper-inner">

<div class="clearfix"></div>
<div class="pagetitle" align="center">
        
           
                <h2 class="text-center">Register</h2>
           
       
    </div>

	 
<div class="height30"></div>

<div class="">
    <div class="">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                
				<div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label para black">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control radiusoff" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label para black">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control radiusoff" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label para black">Password</label>

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
                            <label for="password-confirm" class="col-md-4 control-label para black">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control radiusoff" name="password_confirmation" required>
                            </div>
                        </div>
						
						
						
						 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phoneno" class="col-md-4 control-label para black">Phone No</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control radiusoff" name="phone" required>
								@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label para black">Gender</label>

                            <div class="col-md-6">
							<select name="gender" class="form-control radiusoff" required>
							  
							  <option value=""></option>
							   <option value="male">Male</option>
							   <option value="female">Female</option>
							</select>
                               
                            </div>
                        </div>
						
                        
                        <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label para black">Captcha</label>

                            <div class="col-md-6">
						{!! NoCaptcha::display() !!}
						@if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>The captcha field is required or invalid.</strong>
                            </span>
                        @endif
						 </div>
                        </div>
						
						
						<input type="hidden" name="usertype" value="0">
						
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="customsubmit">
                                    Register
                                </button>
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
