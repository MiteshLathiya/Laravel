<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset ('style/admin') }}/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset ('style/admin') }}/css/style.css" rel='stylesheet' type='text/css' />
<link href="{{ asset ('style/admin') }}/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset ('style/admin') }}/css/font.css" type="text/css"/>
<link href="{{ asset ('style/admin') }}/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{ asset ('style/admin') }}/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3"><br>
   
<div class="w3layouts-main">
	<h2>Log In Now</h2>
   
		<form action="{{ ('/Login') }}" method="post">
        @csrf
			<input type="email" class="ggg"  name="email" placeholder="E-MAIL" >
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
			<input type="password" class="ggg"  name="password" placeholder="PASSWORD">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- <div>
               
                <label for="">Remember Me</label>
                <input type="checkbox" name="remember_me" value="1">
            </div> --}}
            
            @if ($errors->has('loginfailed'))
            <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><a class="fa fa-times" href="javascript:;" style="color: black;"></a></button>
         <strong>{{ $errors->first('loginfailed') }}</strong> 
      </div>
    
@endif
				<div class="clearfix"></div>
				<input type="submit" value="Log in" name="login">
		</form>
        <a href="{{ ('/') }}" style="color: black"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;Home Page</h4></a>
</div>
</div>
<script src="{{ asset ('style/admin') }}/js/bootstrap.js"></script>
<script src="{{ asset ('style/admin') }}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{ asset ('style/admin') }}/js/scripts.js"></script>
<script src="{{ asset ('style/admin') }}/js/jquery.slimscroll.js"></script>
<script src="{{ asset ('style/admin') }}/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{ asset ('style/admin') }}/js/jquery.scrollTo.js"></script>
</body>
</html>
