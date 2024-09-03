@extends('back.layout.default')
@section('title', __('PROFILE'))
@section('button_in_title_section')
<button type="button" class="btn btn-round btn-custom-color waves-effect waves-light" data-toggle="modal" data-target="#modalLogo"><i class="fa fa-image"></i> @lang('EDIT LOGO')</button>
<button type="button" class="btn btn-round btn-custom-color waves-effect waves-light" data-toggle="modal" data-target="#modalPassword"><i class="fa fa-lock"></i> @lang('EDIT PASSWORD')</button>
@endsection
@section('styles')
@endsection
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @include('back.partials.alerts.success')
                @include('back.partials.alerts.error')
                <form id="form-profile">
                    <div class="row">
                        <div class="col">
                            <label>@lang('USERNAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" value="{{ $casa->user->username }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $casa->nombre }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('EMAIL')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $casa->user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>@lang('COUNTRY')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <select class="form-control" id="pais_id" name="pais_id">
                                    <option value="">@lang('CHOOSE')...</option>
                                    @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}" {{ ($casa->pais_id == $pais->id) ? 'selected' : '' }}>
                                        {{ $pais->denominacion }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('PROVINCE / STATE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="provincia" id="provincia" value="{{ $casa->provincia }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('CITY')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="localidad" id="localidad" value="{{ $casa->localidad }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('LATITUDE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="latitud" id="latitud" value="{{ $casa->latitud }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('LONGITUDE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="longitud" id="longitud" value="{{ $casa->longitud }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>@lang('ADDRESS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                                </div>
                                <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $casa->direccion }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('TELEPHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $casa->telefono }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('MOBILE PHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="movil" id="movil" value="{{ $casa->movil }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('WEBSITE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-laptop-code"></i></span>
                                </div>
                                <input type="text" class="form-control" name="web" id="web" value="{{ $casa->web }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('STATUS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check"></i></span>
                                </div>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $casa->status == 1 ? 'selected' : '' }}>@lang('AVAILABLE')</option>
                                    <option value="0" {{ $casa->status == 0 ? 'selected' : '' }}>@lang('NOT AVAILABLE')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>@lang('OBSERVATIONS')</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                        </div>
                        <textarea class="form-control" id="observaciones" name="observaciones">{{ $casa->observaciones }}</textarea>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('back.house.home.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
                            <i class="fa fa-window-close"></i> @lang('CLOSE')
                        </a>
                        <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-profile">
                            <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal logo -->
@include('back.house.profile.modals.logo')
<!-- Modal pass -->
@include('back.house.profile.modals.password')


@endsection
@section('scripts')
<script>
    $(document).ready(function ()
    {
        $('#form-profile').on('submit', function (e)
        {
            e.preventDefault();
            hideAlerts();
            var request = $.ajax({
                url: '<?= ($casa) ? route('back.house.profile.update') : route('back.house.profile.store')?>',
                type: "POST",
                data: $(this).serialize()
            });
            handleRequestDone(request);
            handleRequestFailAndAlways(request);
        });
    });
//    $('#modalLogo').on('shown.bs.modal', function ()
//    {
    $('#form-logo').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var formData = new FormData(this);
        var request = $.ajax({
            url: '<?= route('back.house.profile.logo.save')?>',
            type: "POST",
            processData: false,
            contentType: false,
            data: formData
        });
        handleRequestDone(request);
        request.done(function (data)
        {
            $('.user-image').attr('src', data.logo);
        });
        handleRequestFailAndAlways(request, $('#modalLogo'));
    });
//    });
//    $('#modalPassword').on('shown.bs.modal', function ()
//    {
    $('#form-password').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.house.profile.password.save')?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request, $('#modalPassword'));
    });
//    });
</script>
@endsection