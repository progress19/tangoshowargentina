<div class="modal fade" id="modalLogo">
    <div class="modal-dialog">
        <div class="modal-content border-info animated fadeInLeftBig">
            <div class="modal-header bg-custom-color">
                <h5 class="modal-title text-white">@lang('EDIT LOGO')</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-logo" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('CHOOSE IMAGE')</label>
                        <input type="file" name="logo" id="logo" class="file" data-preview-file-type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-danger waves-effect waves-light m-1" data-dismiss="modal">
                        <i class="fa fa-window-close"></i> @lang('CLOSE')
                    </button>
                    <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-logo">
                        <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>