@extends('back.layout.default')
@section('title', __('NEW DATE'))
@section('styles')
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
                                    <span class="input-group-text"><i class="fa fa-pen"></i></span>
                                </div>
                                <input type="text" class="form-control" name="denominacion" id="username" value="">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('DATE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control mask_fecha" name="fecha" id="fecha" value="">
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
                    <div class="float-right">
                        <a href="{{ route('back.admin.date.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
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
<script>
$(document).ready(function ()
{
    $('#form-save').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.date.store')?>',
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
doMask();
</script>
@endsection