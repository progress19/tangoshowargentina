@if(session()->has('error_message'))
<div class="alert alert-danger alert-dismissible animated bounceInRight">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <div class="alert-icon contrast-alert">
        <i class="fa fa-times"></i>
    </div>
    <div class="alert-message">
        <span><strong>@lang('WAIT')!</strong> {{ session()->get('error_message') }}</span>
    </div>
</div>
@endif
<div class="alert alert-danger d-none animated bounceInRight" id="{{$elError ?? 'error'}}">
    <div class="alert-icon contrast-alert">
        <i class="fa fa-times"></i>
    </div>
    <div class="alert-message">
        <span><strong>@lang('WAIT')!</strong> <span id="error-message" class="error-message"></span></span>
    </div>
</div>
