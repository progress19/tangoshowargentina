<div class="modal-header bg-custom-color">
    <h5 class="modal-title text-white">@lang('EDIT IMAGE')</h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form id="form-image-edit">
    <div class="modal-body">
        @include('back.partials.alerts.error', ['elError' => 'error-image-edit'])

        {{ csrf_field() }}
        <input type="hidden" name="imagen_id" value="{{ $imagen->id }}">
        <div class="form-group">
            <label>@lang('IMAGE NAME')</label>
            <input type="text" class="form-control" name="denominacion" value="{{$imagen->denominacion}}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-round btn-danger waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i> @lang('CLOSE')</button>
        <button class="btn btn-round btn-success waves-effect waves-light"><i class="fa fa-save"></i> @lang('SAVE')</button>
    </div>
</form>