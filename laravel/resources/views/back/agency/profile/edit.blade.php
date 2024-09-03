@extends('back.layout.default')
@section('title', __('PROFILE'))
@section('button_in_title_section')
<button type="button" class="btn btn-round btn-custom-color waves-effect waves-light m-1" data-toggle="modal" data-target="#modalPassword"><i class="fa fa-lock"></i> @lang('EDIT PASSWORD')</button>
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
                                <input type="text" class="form-control" id="username" value="{{ $agencia->user->username }}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('COMPANY NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $agencia->nombre }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('EMAIL')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $agencia->user->email }}">
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
                                    <option value="{{ $pais->id }}" {{ ($agencia->pais_id == $pais->id) ? 'selected' : '' }}>
                                        {{ $pais->denominacion }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('CITY')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="localidad" id="localidad" value="{{ $agencia->localidad }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('ADDRESS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                                </div>
                                <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $agencia->direccion }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>@lang('TELEPHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $agencia->telefono }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('MOBILE PHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="movil" id="movil" value="{{ $agencia->movil }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('WEBSITE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-laptop-code"></i></span>
                                </div>
                                <input type="text" class="form-control" name="web" id="web" value="{{ $agencia->web }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('STATUS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check"></i></span>
                                </div>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $agencia->status == 1 ? 'selected' : '' }}>@lang('AVAILABLE')</option>
                                    <option value="0" {{ $agencia->status == 0 ? 'selected' : '' }}>@lang('NOT AVAILABLE')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('back.agency.home.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
                            <i class="fa fa-window-close"></i> @lang('CLOSE')
                        </a>
                        <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-save">
                            <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal pass -->
@include('back.agency.profile.modals.password')


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
                url: '<?= route('back.agency.profile.update')?>',
                type: "POST",
                data: $(this).serialize()
            });
            handleRequestDone(request);
            handleRequestFailAndAlways(request);
        });
    });

    $('#form-password').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.agency.profile.password.save')?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request, $('#modalPassword'));
    });
</script>
@endsection