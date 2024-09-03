<div class="modal fade" id="modalPassword">
    <div class="modal-dialog">
        <div class="modal-content border-info animated fadeInLeftBig">
            <div class="modal-header bg-custom-color">
                <h5 class="modal-title text-white">@lang('EDIT PASSWORD')</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-password">
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('PASSWORD')</label>
                        <input type="hidden" name="id" value="{{ $agencia->id }}">
                        <input type="password" name="password" id="password" class="form-control">
                        <span class="form-text text-muted">
                            @lang('ENTER NEW PASSWORD').</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-danger waves-effect waves-light m-1" data-dismiss="modal">
                        <i class="fa fa-window-close"></i> @lang('CLOSE')
                    </button>
                    <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-password">
                        <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>