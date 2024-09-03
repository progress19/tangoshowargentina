@extends('back.layout.default')
@section('title', __('EDIT SHOW'))
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
                            <div class="form-group">
                                <label>@lang('TANGO HOUSE')</label>
                                <select name="casa_id" id="casa_id" class="form-control">
                                    @foreach($casas as $casa)
                                    <option value="{{$casa->id}}" {{ $casa->id == $espectaculo->casa_id ? 'selected' : '' }}>{{$casa->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$espectaculo->nombre}}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('PRICE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-money-check-alt"></i></span>
                                </div>
                                <input type="text" class="form-control mask_valor" name="precio" id="precio" value="{{$espectaculo->precio}}">
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
                                    <option value="{{$i}}" {{ $espectaculo->descuento == $i ? 'selected' : '' }}>{{$i}}%</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('HIGHLIGHTS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check"></i></span>
                                </div>
                                <select class="form-control" id="destacado" name="destacado">
                                    <option value="1" {{ $espectaculo->destacado == 1 ? 'selected' : '' }}>@lang('YES')</option>
                                    <option value="0" {{ $espectaculo->destacado == 0 ? 'selected' : '' }}>@lang('NO')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>@lang('DINNER HOUR')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control mask_hora_min" name="horario_cena" id="horario_cena" value="{{$espectaculo->horario_cena}}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('SHOW HOUR')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control mask_hora_min" name="horario" id="horario" value="{{$espectaculo->horario}}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('DURATION')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control mask_entero" name="duracion" id="duracion" value="{{$espectaculo->duracion}}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('SPECIAL DATE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control mask_fecha" name="fecha_especial" id="fecha_especial" value="{{($espectaculo->fecha_especial)? $espectaculo->fecha_especial->format('d/m/Y') : null}}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('STATUS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check"></i></span>
                                </div>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $espectaculo->status == 1 ? 'selected' : '' }}>@lang('AVAILABLE')</option>
                                    <option value="0" {{ $espectaculo->status == 0 ? 'selected' : '' }}>@lang('NOT AVAILABLE')</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <label>@lang('DESCRIPTION')</label>
                    <textarea class="form-control" id="descripcion" name="descripcion">{{ $espectaculo->descripcion }}</textarea>

                    @if($servicios->isNotEmpty())
                    <div class="card-title">
                        @lang('SERVICES')
                    </div>
                    @foreach($servicios as $servicio)
                    <div class="form-check form-check-inline">
                        <label>{{ __($servicio->denominacion) }}
                            <input type="checkbox" name="servicios[]" class="js-switch" data-color="#02BA5A" data-size="small" value="{{ $servicio->id }}" 
                                   {{in_array($servicio->id, $servicios_del_espectaculo) ? 'checked' : ''}}>
                        </label>
                    </div>
                    @endforeach
                    @endif

                    @if($eventos->isNotEmpty())
                    <div class="card-title">
                        @lang('EVENTS')
                    </div>
                    @foreach($eventos as $evento)
                    <div class="form-check form-check-inline">
                        <label>{{ __($evento->denominacion) }}
                            <input type="checkbox" name="eventos[]" class="js-switch" data-color="#02BA5A" data-size="small" value="{{ $evento->id }}" 
                                   {{in_array($evento->id, $eventos_del_espectaculo) ? 'checked' : ''}}>
                        </label>
                    </div>
                    @endforeach
                    @endif

                    <div class="float-right">
                        <a href="{{ route('back.admin.house.show.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
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
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
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
            url: '<?= route('back.admin.house.show.update', $espectaculo->id)?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request);
    });
});

$('.js-switch').each(function ()
{
    new Switchery($(this)[0], $(this).data());
});
doMask();
ClassicEditor
        .create(document.querySelector('#descripcion'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList'],
        })
        .then(editor => {
            editor.ui.view.element.classList.add("form-control");
            editor.setData("{!! str_replace(array("\n", "\r"), '', addslashes($espectaculo->descripcion)) !!}");
        })
        .catch(error => {
//            console.error(error);
        });
</script>
@endsection