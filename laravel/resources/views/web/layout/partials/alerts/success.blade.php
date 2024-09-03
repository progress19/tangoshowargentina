@if(session()->has('success_message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <div class="alert-message">
        <span><strong><i class="fa fa-check"></i> @lang('DONE')!</strong> {{ session()->get('success_message') }}</span>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="alert alert-success d-none" role="alert" id="success">
    <div class="alert-message">
        <span><strong><i class="fa fa-check"></i> @lang('DONE')!</strong> <span id="success-message"></span></span>
    </div>
</div>