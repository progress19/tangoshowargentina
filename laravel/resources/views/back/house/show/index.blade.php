@extends('back.layout.default')
@section('title')
@lang('SHOWS')
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('button_in_title_section')
<a class="btn btn-round btn-custom-color waves-effect waves-light btn-preload" href="{{ route('back.house.show.create') }}"><i class="fa fa-plus"></i> @lang('NEW SHOW')</a>
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
                <form action="{{ route('back.house.show.index') }}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('HOUSE NAME')</label>
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
        @if($espectaculos->total())
        <div class="card">
            <div class="card-header">
                @if(request()->input())
                @lang('SEARCH RESULTS'): {{ $espectaculos->total() }}
                @else
                @lang('SHOWS') ({{ $espectaculos->total() }})
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('NAME')</th>
                                <th>@lang('EDIT')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($espectaculos as $espectaculo)
                            <tr id="{{ $espectaculo->id }}">
                                <th scope="row">{{ $espectaculo->id }}</th>
                                <td>{{ $espectaculo->nombre }}</td>
                                <td>
                                    <form action="{{ route('back.house.show.edit', $espectaculo->id) }}">
                                        <button type="submit" class="btn btn-round btn-custom-color waves-effect waves-light btn-preload"><i class="fa fa-pencil-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form>
                                        <input type="hidden" name="id" value="{{ $espectaculo->id }}">
                                        <input type="checkbox" name="status" class="js-switch" data-color="#02BA5A" data-size="small" {{ $espectaculo->status ? 'checked' : '' }}>
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
                    {{ $espectaculos->appends(request()->input())->links() }}
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
            url: '<?= route('back.house.show.status.save')?>',
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