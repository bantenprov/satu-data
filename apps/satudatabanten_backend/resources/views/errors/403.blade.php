<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.multipurposethemes.com/html-templates/bootstrap-4/admin/aproadmin/pages/examples/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 05:52:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Apro Admin - 403 Forbidden </title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/font-awesome/css/font-awesome.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/Ionicons/css/ionicons.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/master_style.css') }}">

    <!-- apro_admin Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition">
<div class="error-body">
    <div class="error-page">

        <div class="error-content">
            <div class="container">

                <h2 class="headline text-yellow"> 403</h2>

                <h3 class="margin-top-0"><i class="fa fa-warning text-yellow"></i> FORBIDDEN !</h3>

                <p>
                    YOU SEEM TO BE TRYING TO FIND HIS WAY HOME
                </p>
                <div class="text-center">
                    <a href="{{ route('home') }}" class="btn btn-info btn-block btn-flat margin-top-10">Back to dashboard</a>
                </div>
                <h5>or <br>Try using the search form.</h5>

                <form class="search-form form-element">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
        </div>
        <!-- /.error-content -->
        <footer class="main-footer">
            Copyright &copy; 2017 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
        </footer>

    </div>
    <!-- /.error-page -->
</div>




<!-- jQuery 3 -->
<script src="{{ asset('assets/vendor_components/jquery/dist/jquery.min.js') }}"></script>

<!-- popper -->
<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>

<!-- Bootstrap 4.0-->
<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>


</body>

<!-- Mirrored from www.multipurposethemes.com/html-templates/bootstrap-4/admin/aproadmin/pages/examples/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 05:52:33 GMT -->
</html>
