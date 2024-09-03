@extends('web.layout.default')
@section('title', __('CONTACT'))
@section('content')
@include('web.layout.partials.nav')
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col">
            <img src="{{asset('web/img/FT-show-banner-contact.jpg')}}" class="img-fluid-custom">
        </div>
    </div>
</div>
<section class="section-page-aboutus">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col">
                <h3 class="text-center p-4 bold">@lang('CONTACT')<br><small class="hide-done">@lang('PLEASE FILL BELLOW FORM')</small></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form id="form-contact" class="clearfix pb-4 hide-done">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>@lang('FULLNAME')</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>@lang('COUNTRY')</label>
                        <input type="text" class="form-control" name="pais">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>@lang('EMAIL')</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>@lang('WHATSAPP')</label>
                        <input type="text" class="form-control" name="telefono">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>@lang('MESSAGE')</label>
                        <textarea class="form-control" name="mensaje"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-custom-color float-right" >@lang('SEND')</button>
        </form>
        <div id="contact-response" class="d-none pb-4 text-center">
            @lang('YOUR MESSAGE HAS BEEN SUCCESSFULLY SENT')!<br>
            @lang('WE WILL CONTACT YOU AS SOON AS POSSIBLE')!<br><br>
            <img src="{{asset('/web/img/FT-show-logo-black.png')}}" style="max-height: 65px">
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
<script>
    $('#form-contact').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var that = $(this);
        var request = $.ajax({
            url: '<?= route('web.page.contact.send')?>',
            type: "POST",
            data: that.serialize()
        });
        request.done(function (data)
        {
            $('#error').addClass('d-none');
            that.find('button').attr('disabled', true);
            $('.hide-done').addClass('d-none');
            $('#contact-response').removeClass('d-none');
        });
        handleRequestFail(request);
    });
</script>
@endsection