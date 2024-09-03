@extends('back.layout.default')
@section('title', __('EDIT TRANSLATION') . ': ' . $casa->nombre . ' - ' . $lang)
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
                    <input type="hidden" name="casa_id" value="{{$casa->id}}">
                    <input type="hidden" name="lang" value="{{$lang}}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('DESCRIPTION')</label>
                                <textarea class="form-control editor-disabled">{{$casa->descripcion}}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('DESCRIPTION')</label>
                                <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                            </div>
                        </div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
$(document).ready(function ()
{
    $('#form-save').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.house.translation.update')?>',
            type: "POST",
            data: $(this).serialize(),
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request);
    });
});
ClassicEditor
        .create(document.querySelector('#descripcion'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList'],
        })
        .then(editor => {
            editor.ui.view.element.classList.add("form-control");
                    editor.setData("{!! str_replace(array("\n", "\r"), '', addslashes($traduccion ? $traduccion->descripcion: '')) !!}");
        })
        .catch(error => {
//            console.error(error);
        });
ClassicEditor
        .create(document.querySelector('.editor-disabled'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList'],
        })
        .then(editor => {
            editor.ui.view.element.classList.add("form-control");
            editor.isReadOnly = true;
                    editor.setData("{!! str_replace(array("\n", "\r"), '', addslashes($casa->descripcion)) !!}");
        })
        .catch(error => {
//            console.error(error);
        });
</script>
@endsection