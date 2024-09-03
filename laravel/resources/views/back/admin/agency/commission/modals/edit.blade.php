<div class="modal-header bg-custom-color">
    <h5 class="modal-title text-white">@lang('EDIT COMMISSION FEE'): {{$comision->casa->nombre}}</h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form id="form-commission-edit">
    <input type="hidden" name="id" value="{{$comision->id}}">
    <div class="modal-body">
        @include('back.partials.alerts.error', ['elError' => 'error-commission-edit'])
        <div class="form-group">
            <label>@lang('COMMISSION FEE')</label>
            <select name="porcentaje" id="porcentaje" class="form-control">
                @for($i = 0; $i <= 100; $i++ )
                <option value="{{$i}}" {{$i == $comision->porcentaje ? 'selected' : ''}}>{{$i}}%</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-round btn-danger waves-effect waves-light m-1" data-dismiss="modal">
            <i class="fa fa-window-close"></i> @lang('CLOSE')
        </button>
        <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-commission-edit">
            <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
        </button>
    </div>
</form>