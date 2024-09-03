<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
    </head>
    <body>
        <!-- start loader -->
        <div class="loader-overlay">
            <div class="loader">Loading...</div>
        </div>
        <!-- end loader -->
        <main role="main">
            @yield('content')
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
$('#form-suscribe').on('submit', function (e)
{
    e.preventDefault();
    hideAlerts();
    var request = $.ajax({
        url: '<?= route('web.page.suscribe')?>',
        type: "POST",
        data: $(this).serialize()
    });
    handleRequestDone(request);
    handleRequestFailAndAlways(request);
});
        </script>
        <script src="{{asset('/web/js/ekko-lightbox.min.js')}}"></script>
        <script>
$(document).on("click", '[data-toggle="lightbox"]', function (event)
{
    event.preventDefault();
    $(this).ekkoLightbox();
});
$('a[href*="/pickup"]').on("click", function (event)
{
    event.preventDefault();
    $('#modal-pickup').modal('show');
});
        </script>
        @yield('scripts')
    </body>
    <div class="modal" tabindex="-1" role="dialog" id="modal-pickup">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid-custom" src="{{asset('/web/img/map-pickup-zone.jpg')}}">
                </div>
            </div>
        </div>
    </div>
</html>
