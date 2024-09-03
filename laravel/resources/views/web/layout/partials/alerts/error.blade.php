@if(session()->has('error_message'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <div class="alert-message">
        <span><strong><i class="fa fa-times"></i> @lang('WAIT')!</strong> {{ session()->get('error_message') }}</span>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="alert alert-danger d-none" role="alert"  id="{{$elError ?? 'error'}}">
    <div class="alert-message">
        <span><strong><i class="fa fa-times"></i> @lang('WAIT')!</strong> <span class="error-message"></span></span>
    </div>
</div>