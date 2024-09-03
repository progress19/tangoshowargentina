@extends('web.layout.default')
@section('title', __('SHOWS'))
@section('content')
@include('web.layout.partials.nav')
<div style="padding-top: 7rem !important"></div>
@include('web.layout.partials.show.shows')
@include('web.layout.partials.alerts.error')
@include('web.layout.partials.alerts.success')
@include('web.layout.partials.suscribe')
@include('web.layout.partials.bannerfoot')
@include('web.layout.partials.footer')
@include('web.layout.partials.copy')
@endsection
@section('scripts')
@endsection