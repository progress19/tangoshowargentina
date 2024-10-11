<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FAMILIA TANGO SHOW ARGENTINA - Tango - Tango Show - Dinner Tango Show - Buenos Aires Tango Show - Jantar Tango
        Show - La Ventana Tango - Michelangelo Tango - Gala Tango - Aljibe Tango</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('web/img/favicon.jpg') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&family=Roboto:wght@100;300;400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="{{ asset('/web/css/ekko-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/lazyPro.css') }}">

    @yield('styles')
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K3VGGL2');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3VGGL2" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <main role="main" style="width: 100% !important">
        <section class="section-landing p-5" style="background-color: #000; text-align: center;">
            <img src="{{ asset('/web/img/F&F-show-logo.png') }}" class="img-fluid">
        </section>
        <section class="section-landing">

            <div class="image-container mh-houses">
                <div class="skeleton-overlay">
                    <div class="skeleton-image"></div>
                </div>
                <a href="https://www.michelangeloweb.com" target="_blank">
                    <img data-src="{{ asset('/web/img/landing1/michelangelo.jpg') }}"
                        class="img-fluid-custom lazy-image">
                </a>
            </div>

            <div class="image-container mh-houses">
                <div class="skeleton-overlay">
                    <div class="skeleton-image"></div>
                </div>
                <a href="http://www.laventanaweb.com" target="_blank">
                    <img data-src="{{ asset('/web/img/landing1/laventana.jpg') }}" class="img-fluid-custom lazy-image">
                </a>
            </div>

            <div class="image-container mh-houses">
                <div class="skeleton-overlay">
                    <div class="skeleton-image"></div>
                </div>
                <a href="http://www.galatango.com" target="_blank">
                    <img data-src="{{ asset('/web/img/landing1/galatango.jpg') }}" class="img-fluid-custom lazy-image">
                </a>
            </div>

            <div class="image-container mh-houses">
                <div class="skeleton-overlay">
                    <div class="skeleton-image"></div>
                </div>
                <a href="http://www.aljibetango.com" target="_blank">
                    <img data-src="{{ asset('/web/img/landing1/aljibetango.jpg') }}"
                        class="img-fluid-custom lazy-image">
                </a>
            </div>

            <!-- <a href="https://laventanaweb.com/estudio" target="_blank"><img src="{{ asset('/web/img/landing1/escuela.jpg') }}" class="img-fluid-custom"></a>
                <a href="https://laventanaweb.com/cava" target="_blank"><img src="{{ asset('/web/img/landing1/cava.jpg') }}" class="img-fluid-custom"></a>
                <a href="https://laventanaweb.com/terraza" target="_blank"><img src="{{ asset('/web/img/landing1/terraza.jpg') }}" class="img-fluid-custom"></a>-->

        </section>

        <section class="section-landing">
            <div class="py-3" style="background-color: #000">
                <h3 class="text-center text-white">@lang('MORE ACTIVITIES IN BUENOS AIRES')</h3>
            </div>
            <div class="row no-gutters">

                <div class="col-md-3 col-6">
                    <a href="https://player.vimeo.com/video/386222955?autoplay=1&loop=1&autopause=0"
                        data-rel="lightcase:myCollection:escuela">
                        <div class="image-container mh-activities">
                            <div class="skeleton-overlay">
                                <div class="skeleton-image"></div>
                            </div>
                            <img data-src="{{ asset('/web/img/landing1/escuela-1.jpg') }}"
                                class="img-fluid-custom lazy-image">
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-6">
                    <a href="https://player.vimeo.com/video/851764714?autoplay=1&loop=1&autopause=0"
                        data-rel="lightcase:myCollection:cava">

                        <div class="image-container mh-activities">
                            <div class="skeleton-overlay">
                                <div class="skeleton-image"></div>
                            </div>
                            <img data-src="{{ asset('/web/img/landing1/cava-1.jpg') }}"
                                class="img-fluid-custom lazy-image">
                        </div>

                    </a>
                </div>

                <div class="col-md-3 col-6">
                    <a href="https://player.vimeo.com/video/386224584?autoplay=1&loop=1&autopause=0"
                        data-rel="lightcase:myCollection:terraza">
                        <div class="image-container mh-activities">
                            <div class="skeleton-overlay">
                                <div class="skeleton-image"></div>
                            </div>
                            <img data-src="{{ asset('/web/img/landing1/terraza-2.jpg') }}"
                                class="img-fluid-custom lazy-image">
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-6">
                    <a href="https://player.vimeo.com/video/851778001?autoplay=1&loop=1&autopause=0"
                        data-rel="lightcase:myCollection:dante">
                        <div class="image-container mh-activities">
                            <div class="skeleton-overlay">
                                <div class="skeleton-image"></div>
                            </div>
                            <img data-src="{{ asset('/web/img/landing1/dante-bar.jpg') }}" alt=""
                                class="img-fluid-custom lazy-image">
                        </div>
                    </a>
                </div>

            </div>
        </section>

        <section
            style="background-color: #202020; display: flex; justify-content: center; align-items: center; height: 10vh;">
            <a href="https://tangoshowargentina.grapesforce.com/" target="blank"
                style="background-color: #f5bc65; color: black; padding: 15px 25px; text-decoration: none; font-size: 16px; ">AGENCY
                ACCESS</a>
        </section>

        <section class="p-5 text-center" style="background-color: #000; color: white !important">
            <img src="{{ asset('/web/img/F&F-show-logo.png') }}" class="img-fluid">
            <br>
            <br>
            <i class="fas fa-2x fa-phone-alt"></i><br><a class="text-white" href="tel:+541132203300"
                target="_blank">(+5411) 3220 3300</a>
            <br>
            <br>
            <i class="fab fa-2x fa-whatsapp"></i><br><a class="text-white"
                href="https://api.whatsapp.com/send?phone=+5491168759015&amp;text=CONSULTA DESDE WEBSITE!"
                target="_blank">(+54911) 6875-9015</a>
            <br>
            <br>
            <i class="fas fa-2x fa-envelope"></i><br><a href="mailto: info@grupotangoshow.com"
                style="color: white !important">info@grupotangoshow.com</a>
        </section>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('/web/js/lazyPro.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.0/umd/popper.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="{{ asset('/web/js/scripts.js') }}"></script>
    <script src="{{ asset('/web/js/lightcase.js') }}"></script>

    <script>
        var grid = $('body').width();
        var off_md = 0;
        var div_md = 1;
        var rel_md = 1.777777;

        var off_sm = 0;
        var div_sm = 1;
        var rel_sm = 1.77;
        var classs = '.mh-houses';
        lazyPro(grid, off_md, div_md, rel_md, off_sm, div_sm, rel_sm, classs);

        var grid = $('body').width();
        var off_md = 0;
        var div_md = 4;
        var rel_md = 0.900900901;

        var off_sm = 0;
        var div_sm = 2;
        var rel_sm = 0.900900901;
        var classs = '.mh-activities';
        lazyPro(grid, off_md, div_md, rel_md, off_sm, div_sm, rel_sm, classs);

        jQuery(document).ready(function($) {

            $('a[data-rel^=lightcase]').lightcase({
                swipe: true,
                transition: 'scrollHorizontal',
                speedIn: 1000,
                speedOut: 500,
                showSequenceInfo: false,
                fullScreenModeForMobile: true,
                timeout: 5000,
                closeOnOverlayClick: true,
            });

        });
    </script>

</body>

</html>
