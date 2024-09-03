<div class="modal-header bg-custom-color">
    <h5 class="modal-title text-white">{{ $imagen->denominacion }}
    </h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col">
            <img src="{{ asset('/public/img/shows/'.$imagen->nombre) }}" class="img-fluid">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-round btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> @lang('CLOSE')</button>
</div>