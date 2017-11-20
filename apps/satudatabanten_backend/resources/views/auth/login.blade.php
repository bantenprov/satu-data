<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<!-- Mirrored from byrushan.com/projects/ma/1-5-1/jquery/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2015 09:35:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Material Admin</title>

    <!-- Vendor CSS -->
    <link href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icon/favicon.png') }}" rel="shortcut icon">

    <!-- CSS -->
    <link href="{{ asset('css/app.min.1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.2.css') }}" rel="stylesheet">
</head>

<body class="login-content">
<!-- Login -->
<div class="lc-block toggled" id="l-login">
    <h3><i class="zmdi zmdi-square-right"></i> LOGIN</h3>
    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
            <div class="fg-line">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
            <div class="fg-line">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="">
                <i class="input-helper"></i>
                Keep me signed in
            </label>
        </div>

        <button type="submit" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
        @if(Session::has('errors'))
        <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 20px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
    <ul class="login-navigation">
        <li data-block="#l-register" class="bgm-red">Register</li>
        <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
    </ul>
</div>

<!-- Register -->
<div class="lc-block" id="l-register">
    <h3><i class="zmdi zmdi-accounts-add"></i> REGISTRASI</h3>
    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Username">
        </div>
    </div>

    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Email Address">
        </div>
    </div>

    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
        <div class="fg-line">
            <input type="password" class="form-control" placeholder="Password">
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="checkbox">
        <label>
            <input type="checkbox" value="">
            <i class="input-helper"></i>
            Accept the license agreement
        </label>
    </div>

    <a href="#" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

    <ul class="login-navigation">
        <li data-block="#l-login" class="bgm-green">Login</li>
        <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
    </ul>
</div>

<!-- Forgot Password -->
<div class="lc-block" id="l-forget-password">
    <h3><i class="zmdi zmdi-help-outline"></i> FORGOT PASSWORD</h3>
    <p class="text-left">Masukkan e-mail anda agar kami dapat mengirimkan pesan perubahan password ke email anda.</p>

    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Email Address">
        </div>
    </div>

    <a href="#" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

    <ul class="login-navigation">
        <li data-block="#l-login" class="bgm-green">Login</li>
        <li data-block="#l-register" class="bgm-red">Register</li>
    </ul>
</div>

<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1 class="c-white">Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ asset('img/browsers/chrome.png') }}" alt="">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ asset('img/browsers/firefox.png') }}" alt="">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ asset('img/browsers/opera.png') }}" alt="">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ asset('img/browsers/safari.png') }}" alt="">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ asset('img/browsers/ie.png') }}" alt="">
                    <div>IE (New)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript Libraries -->
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('vendors/bower_components/Waves/dist/waves.min.js') }}"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="{{ asset('vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js') }}"></script>
<![endif]-->

<script src="{{ asset('js/functions.js') }}"></script>

</body>

<!-- Mirrored from byrushan.com/projects/ma/1-5-1/jquery/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2015 09:35:49 GMT -->
</html>