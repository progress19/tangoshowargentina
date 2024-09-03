<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TANGO SHOW ARGENTINA – Tango Show – Buenos Aires – La Ventana Tango – Gala Tango – Michel Angelo Tango – Aljibe Tango – Dinner Tango Show – Tango Lesson – Wine Tasting – Clase de Tango – Degustacion de Vinos + Tango Show reservas – Tango Show Booking online.</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('web/img/F&F-show-favicon.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <link rel="stylesheet" href="{{asset('/web/css/ekko-lightbox.css')}}">
        <link rel="stylesheet" href="{{asset('/web/css/loader.css')}}">
        <link rel="stylesheet" href="{{asset('/web/css/styles.css')}}">
        @yield('styles')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-205974485-1">;
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag()
            {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-205974485-1');
        </script>
    </head>
    <body>
        <!-- start loader -->
        <div class="loader-overlay">
            <div class="loader">Loading...</div>
        </div>
        <!-- end loader -->
        <main role="main" style="width: 100% !important">
            <div class="header-landing" style="background-color: #000 !important">
                <div class="container-lg">
                    <nav class="navbar navbar-expand-lg navbar-default">
                        <a class="navbar-brand" href="{{route('web.page.landing')}}">
                            <img src="{{asset('/web/img/F&F-show-logo.png')}}" style="max-height: 65px" class="img-fluid">
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-default">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-default">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('web.page.agency')}}">
                                        @lang('TRAVEL AGENCIES')
                                    </a>
                                </li>
                                <li class="nav-item language">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @foreach (config('languages') as $lang => $language)
                                        @if ($lang != app()->getLocale())
                                        <li class="dropdown-item"> 
                                            <a href="{{ route('lang.switch', $lang) }}">
                                                <i class="flag-icon flag-icon-{{ $lang }} mr-2"></i>  {{__($language)}}
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <section class="section-landing">
                <img src="{{asset('/web/img/landing1/TangoShowBA.jpg')}}" class="img-fluid-custom">
                <div class="py-3" style="background-color: #000">
                    <h3 class="text-center text-white">@lang('OUR SERVICES')</h3>
                </div>
                <a href="http://www.laventanaweb.com" target="_blank"><img src="{{asset('/web/img/landing1/laventana.jpg')}}" class="img-fluid-custom"></a>
                <a href="http://www.galatango.com" target="_blank"><img src="{{asset('/web/img/landing1/galatango.jpg')}}" class="img-fluid-custom"></a>
                <a href="http://www.aljibetango.com" target="_blank"><img src="{{asset('/web/img/landing1/aljibetango.jpg')}}" class="img-fluid-custom"></a>
                <a href="https://www.michelangeloweb.com" target="_blank"><img src="{{asset('/web/img/landing1/michelangelo.jpg')}}" class="img-fluid-custom"></a>
                <a href="https://laventanaweb.com/estudio" target="_blank"><img src="{{asset('/web/img/landing1/escuela.jpg')}}" class="img-fluid-custom"></a>
                <a href="https://laventanaweb.com/cava" target="_blank"><img src="{{asset('/web/img/landing1/cava.jpg')}}" class="img-fluid-custom"></a>
                <a href="https://laventanaweb.com/terraza" target="_blank"><img src="{{asset('/web/img/landing1/terraza.jpg')}}" class="img-fluid-custom"></a>
            </section>
            <section class="p-5 text-center" style="background-color: #000; color: white !important">
                <img src="{{asset('/web/img/F&F-show-logo.png')}}" class="img-fluid">
                <br>
                <br>
                <i class="fas fa-2x fa-phone-alt"></i><br><a class="text-white" href="tel:541143341314" target="_blank">(+5411) 4334 1314</a>/ <a class="text-white" href="tel:541143341315" target="_blank">15</a> / <a class="text-white" href="tel:541143341316" target="_blank">16</a>
                <br>
                <br>                
                <i class="fab fa-2x fa-whatsapp"></i><br><a class="text-white" href="https://api.whatsapp.com/send?phone=+5491168759015&amp;text=CONSULTA DESDE WEBSITE!" target="_blank">(+54911) 6875-9015</a>
                <br>
                <br>
                <i class="fas fa-2x fa-envelope"></i><br><a href="mailto:info@tangoshowargentina.com" style="color: white !important">info@tangoshowargentina.com</a>
            </section>

        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.0/umd/popper.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
        <script src="{{asset('/web/js/scripts.js')}}"></script>
        <script>
            const observer = lozad(); // lazy loads elements with default selector as '.lozad'
            observer.observe();
            new WOW().init();
<?php
if(in_array(request()->route()->getName(), ['web.page.houses', 'web.page.shows']))
{
    ?>
                $(".header").addClass("header-collapse");
    <?php
}
else
{
    ?>
                $(window).on("scroll", function ()

                {
                    $(".header").toggleClass("header-collapse", $(this).scrollTop() > 100);

                });
    <?php
}
?>
        </script>
    </body>
</html>
