@if(session()->has('success_message'))
<div class="alert alert-success alert-dismissible animated bounceInRight">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <div class="alert-icon contrast-alert">
        <i class="fa fa-check"></i>
    </div>
    <div class="alert-message">
        <span><strong>@lang('DONE')!</strong> {{ session()->get('success_message') }}</span>
    </div>
</div>
@endif
<div class="alert alert-success d-none animated bounceInRight" id="success">
    <div class="alert-icon contrast-alert">
        <i class="fa fa-check"></i>
    </div>
    <div class="alert-message">
        <span><strong>@lang('DONE')!</strong> <span id="success-message"></span></span>
    </div>
</div>