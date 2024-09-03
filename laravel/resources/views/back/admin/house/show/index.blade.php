@extends('back.layout.default')
@section('title')
@lang('SHOWS')
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('button_in_title_section')
<a class="btn btn-round btn-custom-color waves-effect waves-light btn-preload" href="{{ route('back.admin.house.show.create') }}"><i class="fa fa-plus"></i> @lang('NEW SHOW')</a>
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
                <form action="{{ route('back.admin.house.show.index') }}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('TANGO HOUSE')</label>
                                <select name="search_house" id="search_house" class="form-control">
                                    <option value="">@lang('ALL')</option>
                                    @foreach($casas as $casa)
                                    <option value="{{$casa->id}}" {{ request()->input('search_house') == $casa->id ? 'selected' : '' }}>{{$casa->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                                <th>@lang('NAME')</th>
                                <th>@lang('PRICE')</th>
                                <th>@lang('HIGHLIGHTS')</th>
                                <th>@lang('TANGO HOUSE')</th>
                                <th>@lang('IMAGES')</th>
                                <th>@lang('EDIT')</th>
                                <th>@lang('TRANSLATION')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            @foreach($espectaculos as $espectaculo)
                            <tr id="{{ $espectaculo->id }}">
                                <td>{{ $espectaculo->nombre }}</td>
                                <td>{{ $espectaculo->precio }}</td>
                                <td>{{ $espectaculo->destacado ? __('YES') : __('NO') }}</td>
                                <td>{{ $espectaculo->casa->nombre }}</td>
                                <td>
                                    <form action="{{route('back.admin.house.show.image.index', ['espectaculo_id' => $espectaculo->id])}}">
                                        <button class="btn btn-round btn-custom-color waves-effect waves-light btn-preload"><i class="fa fa-image"></i> {{ $espectaculo->imagenes()->count() }}</button>
                                    </form>                                    
                                </td>
                                <td>
                                    <form action="{{ route('back.admin.house.show.edit', $espectaculo->id) }}">
                                        <button type="submit" class="btn btn-round btn-custom-color waves-effect waves-light btn-preload"><i class="fa fa-pencil-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-custom-color waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach (config('languages') as $lang => $language)
                                            @if ($lang != 'en')
                                            <form action="{{ route('back.admin.house.show.translation.edit', ['id' => $espectaculo->id, 'lang' => $lang]) }}">
                                                <button class="dropdown-item btn-preload">{{__($language)}}</button>
                                            </form>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
function changeStatus(checkbox)
{
    var form = checkbox.closest('form');
    form.one('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.house.show.status.save')?>',
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

$(".row_position").sortable({
    delay: 150,
    stop: function ()
    {
        var selectedData = [];
        $('.row_position>tr').each(function ()
        {
            selectedData.push($(this).attr("id"));
        });
        updateOrder(selectedData);
    }
});


function updateOrder(selectedData)
{
    console.log(selectedData);
    var request = $.ajax({
        url: '<?= route('back.admin.house.show.sort')?>',
        type: "POST",
        data: {positions: selectedData},
    });
    handleRequestDone(request);
    handleRequestFailAndAlways(request);
}
</script>
@endsection