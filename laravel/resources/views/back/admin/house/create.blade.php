@extends('back.layout.default')
@section('title', __('NEW TANGO HOUSE'))
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
                            <label>@lang('USERNAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('PASSWORD')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('EMAIL')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('HIGHLIGHTS')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check"></i></span>
                                </div>
                                <select class="form-control" id="destacado" name="destacado">
                                    <option value="1">@lang('YES')</option>
                                    <option value="0" selected>@lang('NO')</option>
                                </select>
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
                                    <option value="{{ $pais->id }}">
                                        {{ $pais->denominacion }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('PROVINCE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="provincia" id="provincia" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('CITY')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control" name="localidad" id="localidad" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('LATITUDE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control mask_lat_long" name="latitud" id="latitud" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('LONGITUDE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                </div>
                                <input type="text" class="form-control mask_lat_long" name="longitud" id="longitud" value="">
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
                                <input type="text" class="form-control" name="direccion" id="direccion" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('TELEPHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('MOBILE PHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="movil" id="movil" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('WEBSITE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-laptop-code"></i></span>
                                </div>
                                <input type="text" class="form-control" name="web" id="web" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('RATING')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-star"></i></span>
                                </div>
                                <select class="form-control" id="rating" name="rating">
                                    <option value="4">4</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5">5</option>
                                </select>
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
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>

                    <label>@lang('OBSERVATIONS')</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                        </div>
                        <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('back.admin.house.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
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
            url: '<?= route('back.admin.house.store')?>',
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
ClassicEditor
        .create(document.querySelector('#descripcion'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList'],
        })
        .then(editor => {
            editor.ui.view.element.classList.add("form-control");
        })
        .catch(error => {
//            console.error(error);
        });
</script>
@endsection