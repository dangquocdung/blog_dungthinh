<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
    
    

	<main class="main-wrapper-inner" id="container">

            	<div class="container">

                    <div class="wrapper-inner">

<div class="clearfix"></div>
    <div class="pagetitle" align="center">
        
           
               
           <h2 class="text-center">Forgot Password?</h2>
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	<div class="clear height40"></div>
	
	
	<div class="">
    <div class="">
     <div class="col-md-2"></div> 
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Forgot Password</div>
                <div class="panel-body">
                    @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('forgot-password') }}" id="formID">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label para black">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input radiusoff" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="customsubmit">
                                    Send Password Reset Link
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
</body>
</html>