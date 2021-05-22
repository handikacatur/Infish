<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/emblem-infish.svg') }}" type="image/x-icon">

    <!-- Fonts
    ============================================= -->
    <link href='{{ url('https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700') }}' rel='stylesheet' type='text/css'>

    <!-- Stylesheets
    ============================================= -->
    <link href="{{ asset('assets/css/external.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="body-scroll">
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        
        <!-- Slider #1
        ============================================= -->
        <section id="hero" class="hero pt-100 pb-100" style="background-color: rgba(115, 171, 255, 0.308);">
            <div class="container">
                <div class="flex flex-wrap-reverse">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="hero-headline">Mulai berinvestasi atau mencari investor</div>
                        <div class="hero-bio">Bersama turut serta kontribusi membantu negeri melalui sektor perikanan.</p> </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <!--    CONTENT
                        ============================================== -->
                        {{ $slot }}
                        <!--    END CONTENT
                        ============================================== -->
                    </div>
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #slider end -->
        <!-- Footer
============================================= -->
        <footer id="footer" class="footer">
            <div class="footer-top pt-3 pb-1">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="footer-logo">
                                <img class="inline-block" src="{{ URL('https://immense-fortress-65298.herokuapp.com/assets/images/logo/logo-unej-baru.png') }}" alt="logo-unej" style="max-width: 67px;">
                                <img class="inline-block" src="{{ URL('https://immense-fortress-65298.herokuapp.com/assets/images/logo/infish.svg') }}" alt="Infish-logo" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="footer-info">
                                <p>support@infish.com</p>
                                <p>+61 525 240 310</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="footer-social">
                                <a class="twitter" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="dribbble" href="#">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                                <a class="google" href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>

            <div class="footer-bottom pt-1 pb-1">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <hr>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="footer-copyright">
                                <span>© 2020 Dibuat dengan ❤️ oleh Fasilkom Unej</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-bottom end -->
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
	============================================= -->
    <script src="{{ ASSET('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ ASSET('assets/js/plugins.js')}}"></script>
    <script src="{{ ASSET('assets/js/functions.js')}}"></script>
</body>

</html>