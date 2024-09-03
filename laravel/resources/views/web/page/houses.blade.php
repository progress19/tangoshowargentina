@extends('web.layout.default')
@section('title', __('TANGO HOUSES'))
@section('styles')

@endsection
@section('content')
@include('web.layout.partials.nav')
<div style="padding-top: 7rem !important; background-color: #FFFBDB"></div>
@include('web.layout.partials.house.houses')
@include('web.layout.partials.alerts.error')
@include('web.layout.partials.alerts.success')
@include('web.layout.partials.suscribe')
@include('web.layout.partials.bannerfoot')
@include('web.layout.partials.footer')
@include('web.layout.partials.copy')
@endsection
@section('scripts')

@endsection