@extends('back.layout.default')
@section('title')
@lang('SERVICES')
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('button_in_title_section')
<a class="btn btn-round btn-custom-color waves-effect waves-light btn-preload" href="{{ route('back.admin.service.create') }}"><i class="fa fa-plus"></i> @lang('NEW SERVICE')</a>
@endsection
@section('content')
<div class="row">
    <div class="col">
        @include('back.partials.alerts.success')
        @include('back.partials.alerts.error')
        <div class="card">
            <div class="card-header">
                @lang('SEARCH')
            </div>
            <div class="card-body">
                <form action="{{ route('back.admin.service.index') }}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('NAME')</label>
                                <input type="text" name="search_name" id="search_name" class="form-control" value="{{ request()->input('search_name') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('STATUS')</label>
                                <select name="search_status" id="search_status" class="form-control">
                                    <option value="" {{ request()->input('search_status') === '' ? 'selected' : '' }}></option>
                                    <option value="1" {{ request()->input('search_status') === '1' ? 'selected' : '' }}>@lang('AVAILABLE')</option>
                                    <option value="0" {{ request()->input('search_status') === '0' ? 'selected' : '' }}>@lang('NOT AVAILABLE')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-round btn-custom-color waves-effect waves-light float-right btn-preload"><i class="fa fa-search"></i> @lang('SEARCH')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if($servicios->total())
        <div class="card">
            <div class="card-header">
                @if(request()->input())
                @lang('SEARCH RESULTS'): {{ $servicios->total() }}
                @else
                @lang('SERVICES') ({{ $servicios->total() }})
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('NAME')</th>
                                <th>@lang('ICON')</th>
                                <th>@lang('TRANSLATION')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicios as $servicio)
                            <tr id="{{ $servicio->id }}">
                                <th scope="row">{{ $servicio->id }}</th>
                                <td>{{ $servicio->denominacion }}</td>
                                <td><i class="fa {{ $servicio->icono }}"></i></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-custom-color waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach (config('languages') as $lang => $language)
                                            @if ($lang != 'en')
                                            <form action="{{ route('back.admin.service.translation.edit', ['id' => $servicio->id, 'lang' => $lang]) }}">
                                                <button class="dropdown-item btn-preload">{{__($language)}}</button>
                                            </form>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form>
                                        <input type="hidden" name="id" value="{{ $servicio->id }}">
                                        <input type="checkbox" name="status" class="js-switch" data-color="#02BA5A" data-size="small" {{ $servicio->status ? 'checked' : '' }}>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer" style="margin-bottom: 0">
                <!--<div class="text-center">-->
                {{ $servicios->appends(request()->input())->links() }}
                <!--</div>-->
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-body">
                @lang('NO RESULTS FOUND')
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<!--Switchery Js-->
<script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}"></script>
<script>
function changeStatus(checkbox)
{
    var form = checkbox.closest('form');
    form.one('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.service.status.save')?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request);
    });
    form.trigger('submit');
}

$('.js-switch').each(function ()
{
    new Switchery($(this)[0], $(this).data());
});
$('.js-switch').on('change', function ()
{
    var checkbox = $(this);
    changeStatus(checkbox);
});
</script>
@endsection