@extends('web.layout.default')
@section('title', __('AGENCIES'))
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
                                            <option value="{{$pais->id}} {{$pais->denominacion === 'ARGENTINA' ? 'selected' : ''}}">{{$pais->denominacion}}</option>
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
@endsection