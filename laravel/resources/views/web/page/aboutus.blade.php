@extends('web.layout.default')
@section('title', __('ABOUT US'))
@section('content')
@include('web.layout.partials.nav')
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
                <h3 class="text-center p-4 bold">@lang('ABOUT US')</h3>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col">
                <div class="pb-4">
                    TANGO & FOLKLORE – ARGENTINE EXPERIENCE it was created for offering tourists visiting Argentina, the same Market Place including the most viewed Tango and Folklore Shows around the world.
                    <br>
                    <br>


                    When visiting Buenos Aires, tourists just can’t miss going to a Tango Show or Houses, where they will enjoy the truly spirit of Tango and its traditions. The excursion starts with a gourmet regional dinner served with wines from the most prestigious Argentine wineries. Later on, a show will start, offering the guests the opportunity of listening to a live Tango orchestra, singers performing the Classic Argentinean Tango music, dancing couples showing their talent, artists from the North Region doing a demonstration with their “bombos” (regional bass drums), ponchos, bowlers and traditional music instruments, among other surprises on one same stage
                    <br>
                    <br>

                    Based on our experience in the market, our mission is to ensure that the guests and their families and friends enjoy a memorable time, living an unforgettable night in Buenos Aires
                    <br>
                    <br>


                    We look forward to meet you in the only city where Tango is a lifestyle
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layout.partials.alerts.error')
@include('web.layout.partials.alerts.success')
@include('web.layout.partials.suscribe')
@include('web.layout.partials.bannerfoot')
@include('web.layout.partials.footer')
@include('web.layout.partials.copy')
@endsection
@section('scripts')
@endsection