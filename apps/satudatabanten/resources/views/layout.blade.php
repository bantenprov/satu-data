<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>@yield('title')</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/bootstrap.css') }}" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/style.css') }}">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/responsive.css') }}">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/colors/color1.css') }}" id="colors">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/animate.css') }}">

    <!-- Favicon and touch icons  -->
    <link href="{{ asset('assets/icon/apple-touch-icon-48-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="{{ asset('assets/icon/apple-touch-icon-32-precomposed.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('assets/icon/favicon.png') }}" rel="shortcut icon">

    <style>
        .cover > img{
            filter: brightness(70%);
            -webkit-filter: brightness(70%);
            -moz-filter: brightness(70%);
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="header-sticky page-loading">
<div class="loading-overlay">
</div>

<!-- Boxed -->
<div class="boxed">
    <div id="site-header">
        <div class="flat-top">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="custom-info">
                            <span>Ada pertanyaan?</span>
                            <span><i class="fa fa-phone"></i>(0254) 200123</span>
                            <span><i class="fa fa-envelope"></i>admin@bantenprov.go.id</span>
                        </div>

                        <div class="social-links">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-behance"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-spotify"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-rss"></i>
                            </a>
                        </div>
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-top -->

        <header id="header" class="header clearfix">
            <div class="header-wrap clearfix">
                <div class="container">
                    <div class="row">
                        <div class="flat-wrapper">
                            <div id="logo" class="logo">
                                <a href="index.html">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="images">
                                </a>
                            </div><!-- /.logo -->
                            <div class="btn-menu">
                                <span></span>
                            </div><!-- //mobile menu button -->

                            <div class="nav-wrap">
                                <nav id="mainnav" class="mainnav">
                                    <ul class="menu">
                                        <li class="home"><a href="#">Beranda</a></li>
                                        <li><a href="#">Data</a></li>
                                        <li><a href="#">Berita</a></li>
                                        <li><a href="#">Aplikasi</a></li>
                                        <li><a href="#">Organisasi</a></li>
                                        <li><a href="#">Tentang</a></li>
                                    </ul><!-- /.menu -->
                                </nav><!-- /.mainnav -->
                            </div><!-- /.nav-wrap -->
                        </div><!-- /.flat-wrapper -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-inner -->
        </header><!-- /.header -->
    </div><!-- /.site-header -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="widget widget_text style_1">
                            <div class="textwidget">
                                <h1><strong>Fusion</strong> a model Business wp theme</h1>
                            </div>
                        </div><!-- /.widget_text -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <div class="widget widget_recent_entries">
                            <h3 class="widget-title"><span class="style_1">R</span>ecent News</h3>
                            <ul>
                                <li>
                                    <a href="blog-single.html">3 Reasons Your Business Needs A Budget Now</a>
                                    <span class="post-date">January 26, 2016</span>
                                </li>
                                <li>
                                    <a href="#">2016 Queensland Small Business Week</a>
                                    <span class="post-date">January 26, 2016</span>
                                </li>
                                <li>
                                    <a href="blog-single.html">The Tax Office doesn’t always get it right</a>
                                    <span class="post-date">January 26, 2016</span>
                                </li>
                            </ul>
                        </div><!-- /.widget .widget_recent_entries -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <div class="widget widget_text information style_1">
                            <h3 class="widget-title"><span class="style_1">C</span>ontact Us</h3>
                            <div class="textwidget">
                                <p><strong>Headquarters:</strong><br>66 Nicholson Street Buffalo New York US 14214</p>
                                <p>
                                    <i class="fa fa-phone ft-widget-margin-right-12"></i> 001-123-456-7890<br>
                                    <i class="fa fa-envelope-o ft-widget-margin-right-10"></i> support@linethemes.com
                                </p>
                                <p>
                                    <i class="fa fa-phone ft-widget-margin-right-12"></i> 001-123-456-7890<br>
                                    <i class="fa fa-envelope-o ft-widget-margin-right-10"></i> manager@linethemes.com
                                </p>
                                <p>
                                    <i class="fa fa-calendar ft-widget-margin-right-12"></i> Mon - Sat: 8:00 Am - 18:00 Pm<br>
                                    <span class="ft-widget-margin-left-28">Sunday: Closed</span>
                                </p>
                            </div>
                        </div><!-- /.widget .widget_text information -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <div class="widget widget_text style_1">
                            <h3 class="widget-title"><span class="style_1">G</span>et in Touch</h3>
                            <div class="textwidget">
                                <form id="contactform" method="post" action="./contact/contact-process.php">
                                    <p><input id="name" name="name" type="text" value="" placeholder="Name" required="required"></p>

                                    <p><input id="email" name="email" type="email" value="" placeholder="Email" required="required"></p>

                                    <p><textarea name="message" placeholder="Comment" required="required"></textarea></p>
                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit rounded" value="Send Mail">
                                    </p>
                                </form>
                            </div><!-- /.textwidget -->
                        </div><!-- /.widget .widget_text -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-content -->

        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="ft-wrap clearfix">
                            <div class="social-links">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-spotify"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                            <div class="copyright">
                                <div class="copyright-content">
                                    Copyright © 2017 Satu Data Banten <a href="#" target="_blank">Pemerintah Provinsi Banten</a>
                                </div>
                            </div>
                        </div><!-- /.ft-wrap -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-content -->
    </footer>

    <!-- Go Top -->
    <a class="go-top">
    </a>

</div>

<!-- Javascript -->
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery-waypoints.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/imagesloaded.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery-countTo.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.flexslider-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/gmap3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery-validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/main.js') }}"></script>

<!-- Revolution Slider -->
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/javascript/slider.js') }}"></script>

</body>
</html>
