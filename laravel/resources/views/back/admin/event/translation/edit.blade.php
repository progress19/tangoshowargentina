@extends('back.layout.default')
@section('title', __('EDIT TRANSLATION') . ': ' . $evento->denominacion . ' - ' . $lang)
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
                    @if($traduccion)
                    <input type="hidden" name="id" value="{{$traduccion->id}}">
                    @endif
                    <input type="hidden" name="evento_id" value="{{$evento->id}}">
                    <input type="hidden" name="lang" value="{{$lang}}">
                    <div class="row">
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pen"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{$evento->denominacion}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pen"></i></span>
                                </div>
                                <input type="text" class="form-control" name="denominacion" id="denominacion" value="{{$traduccion ? $traduccion->denominacion: ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('back.admin.event.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
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
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
$(document).ready(function ()
{
    $('#form-save').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.event.translation.update')?>',
            type: "POST",
            data: $(this).serialize(),
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request);
    });
});
</script>
@endsection