@extends('back.layout.default')
@section('title', __('NEW SHOW'))
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @include('back.partials.alerts.success')
                @include('back.partials.alerts.error')
                <form id="form-save">
                    <div class="row">
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('PRICE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-money-check-alt"></i></span>
                                </div>
                                <input type="text" class="form-control mask_valor" name="precio" id="precio" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('DISCOUNT')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-comment-dollar"></i></span>
                                </div>
                                <select class="form-control" name="descuento" id="descuento">
                                    <option value="0">@lang('NO DISCOUNT')</option>
                                    @for($i = 1; $i <= 100; $i++)
                                    <option value="{{$i}}">{{$i}}%</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>@lang('HOUR')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control mask_hora_min" name="horario" id="horario" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('DURATION')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control mask_hora_min" name="duracion" id="duracion" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('SPECIAL DATE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control mask_fecha" name="fecha_especial" id="fecha_especial" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('STATUS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check"></i></span>
                                </div>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">@lang('AVAILABLE')</option>
                                    <option value="0">@lang('NOT AVAILABLE')</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <label>@lang('DESCRIPTION')</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                        </div>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>

                    <div class="float-right">
                        <a href="{{ route('back.house.show.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
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
@endsection
@section('scripts')
<script src="{{ asset("/back/js/jquery.mask.min.js") }}"></script>
<script src="{{ asset("/back/js/jquery.maskMoney.min.js") }}"></script>
<!--Switchery Js-->
<script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}"></script>
<script>
$(document).ready(function ()
{
    $('#form-save').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.house.show.store')?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        request.done(function ()
        {
            $('#btn-form-save').prop('disabled', true);
        });
        handleRequestFailAndAlways(request);
    });
});
$('.js-switch').each(function ()
{
    new Switchery($(this)[0], $(this).data());
});
doMask();
</script>
@endsection