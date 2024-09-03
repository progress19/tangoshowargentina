@extends('web.layout.default')
@section('title', __($casa->nombre))
@section('content')
@include('web.layout.partials.nav')
@include('web.layout.partials.header')
<section class="section-shows pb-4">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col">
                <div style="position: absolute; left: 50%; top: -50px; margin-left: -60px;">
                    <img class="img-fluid img-logo-circle" src="{{asset('/public/img/logo/' . $casa->logo)}}">
                </div>
                <h3 class="text-center p-4 bold"><span style="visibility: hidden">@lang($casa->nombre)</span>
                    @if($casa->rating)
                    <br><br>
                    {!! $casa->renderStars($casa->rating)!!}
                    @endif
                </h3>
                <div class="pb-4">
                    {!! nl2br($casa->descripcion, false) !!}
                </div>
            </div>
        </div>
        @include('web.layout.partials.show.shows', ['espectaculos' => $casa->espectaculosActivos])
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