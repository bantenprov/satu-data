@extends('layout')

@section('title', 'Satu Data Banten | Beranda')

@section('content')
    <!-- Slider -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="{{ asset('assets/images/slides/1.jpg') }}" alt="slider-image"/>
                    <div class="pixel-overlay"></div>
                    <div class="tp-caption sfl title-slide text-center" data-x="center" data-y="203" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        Beragam Tempat Wisata <br> Adalah Sejarah Yang Kami Jaga.
                    </div>

                    <div class="tp-caption sfl flat-button-slider bg-button-slider-333333" data-x="398" data-y="473" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Read More</a></div>

                    <div class="tp-caption sfr flat-button-slider" data-x="588" data-y="473" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Contact Us</a></div>

                    <div class="tp-caption sfb flat-down" data-x="center" data-y="bottom" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut">
                        <a href="#"><img src="{{ asset('assets/images/slides/button1.png') }}" alt="slider-image"></a>
                    </div>
                </li>

                <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="{{ asset('assets/images/slides/2.jpg') }}" alt="slider-image" />
                    <div class="pixel-overlay"></div>
                    <div class="tp-caption sfl title-slide text-center" data-x="center" data-y="203" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        Kami Menyatu Dengan Alam <br> Agar Terjaga Keindahan nya.
                    </div>

                    <div class="tp-caption sfl flat-button-slider bg-button-slider-333333" data-x="398" data-y="473" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Read More</a></div>

                    <div class="tp-caption sfr flat-button-slider" data-x="588" data-y="473" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Contact Us</a></div>
                    <div class="tp-caption sfb flat-down" data-x="center" data-y="bottom" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut">
                        <a href="#"><img src="{{ asset('assets/images/slides/button1.png') }}" alt="slider-image"></a>
                    </div>
                </li>

                <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="{{ asset('assets/images/slides/3.jpg') }}" alt="slider-image"/>
                    <div class="pixel-overlay"></div>
                    <div class="tp-caption sfl title-slide text-center" data-x="center" data-y="203" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        Keindahan Pantai <br> Adalah Kebanggaan Kami.
                    </div>

                    <div class="tp-caption sfl flat-button-slider bg-button-slider-333333" data-x="398" data-y="473" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Read More</a></div>

                    <div class="tp-caption sfr flat-button-slider" data-x="588" data-y="473" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Contact Us</a></div>
                    <div class="tp-caption sfb flat-down" data-x="center" data-y="bottom" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut">
                        <a href="#"><img src="{{ asset('assets/images/slides/button1.png') }}" alt="slider-image"></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Icon box -->
    <div class="flat-row parallax1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget widget_search">
                        <h2>DATA BANTEN DALAM SATU PORTAL</h2>
                        <form class="search-form" action="{{ env('SEARCH_URL') }}" method="get">
                            <input type="text" name="q" class="search-field" placeholder="Cari Data, Tema dan Organisasi  …">
                            <input type="submit" class="search-submit">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="flat-border-bottom">
                            <span class="sep-holder">
                                <span class="sep-line"></span>
                            </span>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-calculator"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Pangan.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href="#"><h5 class="box-title">Pangan</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">The professional management of a business doesn’t live without accurate information and timely.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-layers"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Energi.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Energi</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">For those looking to invest in the<br>growth of your business or create a new business.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-chart"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Infrastruktur.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Infrastruktur</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">Adapt your business to the new market conditions. Redefine your strategy, restructure your debt.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-calculator"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Maritim.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Maritim</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">The professional management of a business doesn’t live without accurate information and timely.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-calculator"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Kesehatan.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Kesehatan</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">The professional management of a business doesn’t live without accurate information and timely.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-1"></div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-calculator"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Pendidikan.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Pendidikan</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">The professional management of a business doesn’t live without accurate information and timely.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-layers"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Ekonomi.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Ekonomi</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">For those looking to invest in the<br>growth of your business or create a new business.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-chart"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Industri.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Industri</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">Adapt your business to the new market conditions. Redefine your strategy, restructure your debt.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-calculator"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Pariwisata.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Pariwisata</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">The professional management of a business doesn’t live without accurate information and timely.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="iconbox style_1 mag-top">
                        <div class="box-header">
                            <div class="box-icon">
                                {{--<i class="fa icons icon-calculator"></i>--}}
                                <a href="#"><img src="{{ asset('assets/images/icon/Reformasi Birokrasi.png') }}" alt=""></a>
                            </div>
                            <br>
                            <a href=""><h5 class="box-title">Reformasi Birokrasi</h5></a>
                        </div>
                        {{--<div class="box-content">--}}
                        {{--<span class="font-size-14px">The professional management of a business doesn’t live without accurate information and timely.</span>--}}
                        {{--<p class="box-readmore">--}}
                        {{--<a href="#">Read More</a>--}}
                        {{--</p>--}}
                        {{--</div>--}}
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-1"></div>
            </div><!-- /.row -->

        </div><!-- /.container -->
    </div><!-- /.flat-row -->

    <!-- Icon box -->
    <div class="flat-row parallax parallax6">
        <div class="overlay"></div>
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="title-section">
                        <h2 class="title"><strong>Since 2001 we have guided the management of SMEs.</strong></h2>
                        <div class="desc">
                            We are at present in companies that are responsible for a total of €85 million and that work with more than 600 employees.<br>We recognize the importance of internationalization for company growth. Approximately 25% of our clients have an international presence.
                        </div>
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <div class="flat-divider d50px"></div>

            <div class="row">
                <div class="col-md-3 col-md-offset-2">
                    <div class="counter">
                        <div class="counter-content">
                            <span class="numb-count" data-to="{{ (!empty($count) ? $count->total_dataset : '0') }}" data-speed="3000" data-waypoint-active="yes">{{ (!empty($count) ? $count->total_dataset : '0') }}</span>
                        </div>
                        <div class="counter-title">DATASET</div>
                    </div><!-- /.counter -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-2">
                    <div class="counter">
                        <div class="counter-content">
                            <span class="numb-count" data-to="{{ (!empty($count) ? $count->total_organization : '0') }}" data-speed="3000" data-waypoint-active="yes">{{ (!empty($count) ? $count->total_organization : '0') }}</span>
                        </div>
                        <div class="counter-title">ORGANISASI</div>
                    </div><!-- /.counter -->
                </div><!-- /.col-md-2 -->
                <div class="col-md-3">
                    <div class="counter">
                        <div class="counter-content">
                            <span class="numb-count" data-to="{{ (!empty($count) ? $count->total_group : '0') }}" data-speed="3000" data-waypoint-active="yes">{{ (!empty($count) ? $count->total_group : '0') }}</span>
                        </div>
                        <div class="counter-title">GRUP</div>
                    </div><!-- /.counter -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->

            <div class="flat-divider d60px"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/icon/button1.png') }}" alt="images">
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.flat-row -->

    <!-- Group button -->
    <div class="flat-row bg-222222">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="title-section style_1">
                        <h3 class="title color-ffffff">Management in hard times.</h3>
                        <div class="desc">
                            Don’t let your business evolve according to the pace of others. Contact us to discover how we can help with the management of your company.
                        </div>
                    </div>
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="group-button text-center">
                        <a class="button white lg rounded" href="#">Read More</a>
                        <a class="button lg rounded" href="contact.html">Contact Us</a>
                    </div>
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.flat-row -->

    <!-- Accordion -->
    <div class="flat-row bg-f7f7f7 pad-top0px pad-bottom0px">
        <div class="image-single style_1 clearfix">
            <div class="item-two-column">
                <div class="flat-single-image-autoheight"></div>
            </div><!-- /.item-two-column -->
            <div class="item-two-column">
                <div class="section-accordion">
                    <div class="title-section style_1">
                        <h3 class="title">Frequently Asked Questions</h3>
                    </div>

                    <div class="flat-divider d30px"></div>

                    <div class="flat-accordion">
                        <div class="flat-toggle">
                            <h6 class="toggle-title active"><i class="fa fa-bar-chart"></i>What are all the different types of accountants?</h6>
                            <div class="toggle-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                            </div>
                        </div><!-- /toggle -->
                        <div class="flat-toggle">
                            <h6 class="toggle-title"><i class="fa fa-line-chart"></i>What Do Accountants Without Their CPA do?</h6>
                            <div class="toggle-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                            </div>
                        </div><!-- /toggle -->

                        <div class="flat-toggle">
                            <h6 class="toggle-title"><i class="fa fa-signal"></i>How do I make a mid-career switch into accounting?</h6>
                            <div class="toggle-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                            </div>
                        </div><!-- /toggle -->
                    </div><!-- /.flat-accordion -->
                </div><!-- /.section-accordion -->
            </div><!-- /.item-two-column -->
        </div><!-- /.image-single -->
    </div><!-- /.flat-row -->

@endsection