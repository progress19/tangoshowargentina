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
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <img src="{{asset('web/img/FT-show-banner-about-us.jpg')}}" class="img-fluid-custom">
                    </div>
                </div>
            </div>
            <section class="section-page-aboutus">
                <div class="container-fluid">
                    <div class="row no-gutters">
                        <div class="col">
                            <h3 class="text-center p-4 bold">@lang('AGENCIES ACCESS')</h3>
                        </div>
                    </div>
                    <div class="row no-gutters">

                        <div class="col-sm-3 mx-auto mb-4">
                            <form id="form-login" class="clearfix text-center">
                                <div class="form-group">
                                    <label>@lang('USERNAME')</label>
                                    <input type="text" class="form-control" name="username" style="text-transform: lowercase;">
                                </div>
                                <div class="form-group">
                                    <label>@lang('PASSWORD')</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <a href="javascript:void(0)" class="btn btn-custom-color mt-1" data-toggle="modal" data-target="#modal-account">@lang('CREATE AN ACCOUNT')</a> <button class="btn btn-custom-color mt-1" id="btn-form-login">@lang('LOGIN')</button>
                            </form>                                            
                            <div class="alert alert-danger d-none mt-2" role="alert" id="error-form-login">
                                <div class="alert-message">
                                    <span><strong><i class="fa fa-times"></i> @lang('WAIT')!</strong> <span class="error-message"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-account">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="text-center font-weight-light m-0 mb-3">@lang('CREATE AN ACCOUNT')</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col mb-4">
                                    <form id="form-register" class="clearfix text-center">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('USERNAME')</label>
                                                    <input type="text" class="form-control" name="username" style="text-transform: lowercase;">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('PASSWORD')</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('COMPANY NAME')</label>
                                                    <input type="text" class="form-control" name="nombre">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('ADDRESS')</label>
                                                    <input type="text" class="form-control" name="direccion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('TELEPHONE')</label>
                                                    <input type="text" class="form-control" name="telefono">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('MOBILE')</label>
                                                    <input type="text" class="form-control" name="movil">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('EMAIL')</label>
                                                    <input type="text" class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('WEBSITE')</label>
                                                    <input type="text" class="form-control" name="web">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('COUNTRY')</label>
                                                    <select class="form-control" name="pais_id">
                                                        @foreach($paises as $pais)
                                                        <option value="{{$pais->id}}" {{$pais->denominacion === 'Argentina' ? 'selected' : ''}}>{{$pais->denominacion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>@lang('CITY')</label>
                                                    <input type="text" class="form-control" name="localidad">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-custom-color" id="btn-form-register">@lang('SEND')</button>
                                    </form>                                            
                                    <div class="alert alert-danger d-none mt-2" role="alert" id="error-form-register">
                                        <div class="alert-message">
                                            <span><strong><i class="fa fa-times"></i> @lang('WAIT')!</strong> <span class="error-message"></span></span>
                                        </div>
                                    </div>
                                    <div id="register-response" class="d-none text-center">
                                        @lang('YOUR REQUEST HAS BEEN SUCCESSFULLY SENT')!<br>
                                        @lang('WE WILL CONTACT YOU AS SOON AS POSSIBLE')!<br><br>
                                        <img src="{{asset('/web/img/FT-show-logo-black.png')}}" style="max-height: 65px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="p-5 text-center" style="background-color: #000; color: white !important">
                    <img src="{{asset('/web/img/F&F-show-logo.png')}}" class="img-fluid">
                    <br>
                    <br>
                    TEL: (+5411) 4334 1314/ 15 / 16
                    <br>
                    <br>
                    Whatsapp: (+54911) 6875-9015
                    <br>
                    <br>
                    <a href="mailto:info@tangoshowargentina.com" style="color: white !important">info@tangoshowargentina.com</a>
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

        <script>
            $('#form-register').on('submit', function (e)
            {
                e.preventDefault();
                hideAlerts();
                var that = $(this);
                var request = $.ajax({
                    url: '<?= route('web.register')?>',
                    type: "POST",
                    data: that.serialize()
                });
                request.done(function (data)
                {
                    that.addClass('d-none');
                    $('#register-response').removeClass('d-none');
                });
                handleRequestFail(request, $('#error-form-register'));
            });
            $('#form-login').on('submit', function (e)
            {
                e.preventDefault();
                hideAlerts();
                var that = $(this);
                var request = $.ajax({
                    url: '<?= route('back.access.login')?>',
                    type: "POST",
                    data: that.serialize()
                });
                request.done(function (data)
                {
                    that.addClass('d-none');
                    window.location = data.redirect;
                });
                handleRequestFail(request, $('#error-form-login'));
            });
        </script>
    </body>
</html>