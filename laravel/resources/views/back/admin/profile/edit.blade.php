@extends('back.layout.default')
@section('title', __('PROFILE'))
@section('button_in_title_section')
<button type="button" class="btn btn-round btn-custom-color waves-effect waves-light m-1" data-toggle="modal" data-target="#modalLogo"><i class="fa fa-image"></i> @lang('EDIT LOGO')</button>
<button type="button" class="btn btn-round btn-custom-color waves-effect waves-light m-1" data-toggle="modal" data-target="#modalPassword"><i class="fa fa-lock"></i> @lang('EDIT PASSWORD')</button>
@endsection
@section('styles')
@endsection
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @include('back.partials.alerts.success')
                @include('back.partials.alerts.error')
                <form id="form-profile">
                    @if($admin)
                    <input type="hidden" name="id" value="{{ $admin->id }}">
                    @endif
                    <div class="row">
                        <div class="col">
                            <label>@lang('USERNAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" value="{{ ($admin)? $admin->user->username : '' }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('NAME')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ ($admin)? $admin->nombre : '' }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('EMAIL')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" value="{{ ($admin)? $admin->user->email : '' }}">
                            </div>
                        </div>
                        <div class="col">
                            <label>@lang('TELEPHONE')</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ ($admin)? $admin->telefono : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('OBSERVATIONS')</label>
                        <textarea class="form-control" id="observaciones" name="observaciones">{{ ($admin)? $admin->observaciones : '' }}</textarea>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('back.admin.home.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
                            <i class="fa fa-window-close"></i> @lang('CLOSE')
                        </a>
                        <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-profile">
                            <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal logo -->
@include('back.admin.profile.modals.logo')
<!-- Modal pass -->
@include('back.admin.profile.modals.password')


@endsection
@section('scripts')
<script>
    $(document).ready(function ()
    {
        $('#form-profile').on('submit', function (e)
        {
            e.preventDefault();
            hideAlerts();
            var request = $.ajax({
                url: '<?= ($admin) ? route('back.admin.profile.update') : route('back.admin.profile.store')?>',
                type: "POST",
                data: $(this).serialize()
            });
            handleRequestDone(request);
            handleRequestFailAndAlways(request);
        });
    });
//    $('#modalLogo').on('shown.bs.modal', function ()
//    {
        $('#form-logo').on('submit', function (e)
        {
            e.preventDefault();
            hideAlerts();
            var formData = new FormData(this);
            var request = $.ajax({
                url: '<?= route('back.admin.profile.logo.save')?>',
                type: "POST",
                processData: false,
                contentType: false,
                data: formData
            });
            handleRequestDone(request);
            request.done(function (data)
            {
                $('.user-image').attr('src', data.logo);
            });
            handleRequestFailAndAlways(request, $('#modalLogo'));
        });
//    });
//    $('#modalPassword').on('shown.bs.modal', function ()
//    {
        $('#form-password').on('submit', function (e)
        {
            e.preventDefault();
            hideAlerts();
            var request = $.ajax({
                url: '<?= route('back.admin.profile.password.save')?>',
                type: "POST",
                data: $(this).serialize()
            });
            handleRequestDone(request);
            handleRequestFailAndAlways(request, $('#modalPassword'));
        });
//    });
</script>
@endsection