@extends('back.layout.default')
@section('title')
@lang('TANGO HOUSES')
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('button_in_title_section')
<!--<a class="btn btn-round btn-custom-color waves-effect waves-light m-1 btn-preload" href="{{ route('back.admin.house.create') }}"><i class="fa fa-plus"></i> @lang('NEW TANGO HOUSE')</a>-->
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
                <form action="{{ route('back.admin.house.index') }}">
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
        @if($casas->total())
        <div class="card">
            <div class="card-header">
                @if(request()->input())
                @lang('SEARCH RESULTS'): {{ $casas->total() }}
                @else
                @lang('TANGO HOUSES') ({{ $casas->total() }})
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('LOGO')</th>
                                <th>@lang('NAME')</th>
                                <th>@lang('HIGHLIGHTS')</th>
                                <th>@lang('RATING')</th>
                                <th>@lang('IMAGES')</th>
                                <th>@lang('TRANSFER RATES')</th>
                                <th>@lang('EDIT')</th>
                                <th>@lang('TRANSLATION')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            @foreach($casas as $casa)
                            <tr id="{{ $casa->id }}">
                                <td><img src="{{ file_exists(storage_path('app/public/img/logo/' . $casa->logo)) ? asset('public/img/logo/' . $casa->logo): asset('back/img/bannerTF.jpg') }}" class="img-fluid" style="max-height: 30px;"></td>
                                <td>{{ $casa->nombre }}</td>
                                <td>{{ $casa->destacado ? __('YES') : __('NO') }}</td>
                                <td>{{ $casa->rating }}</td>
                                <td>
                                    <form action="{{route('back.admin.house.image.index', ['casa_id' => $casa->id])}}">
                                        <button class="btn btn-round btn-custom-color waves-effect waves-light btn-preload"><i class="fa fa-image"></i> {{ $casa->imagenes()->count() }}</button>
                                    </form>                                    
                                </td>
                                <td>
                                    <form action="{{ route('back.admin.house.transfer.edit', $casa->id) }}">
                                        <button type="submit" class="btn btn-round btn-custom-color waves-effect waves-light btn-preload"><i class="fa fa-money-check-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('back.admin.house.edit', $casa->id) }}">
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
                                            <form action="{{ route('back.admin.house.translation.edit', ['id' => $casa->id, 'lang' => $lang]) }}">
                                                <button class="dropdown-item btn-preload">{{__($language)}}</button>
                                            </form>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form>
                                        <input type="hidden" name="id" value="{{ $casa->id }}">
                                        <input type="checkbox" name="status" class="js-switch" data-color="#02BA5A" data-size="small" {{ $casa->status ? 'checked' : '' }}>
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
                {{ $casas->appends(request()->input())->links() }}
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
            url: '<?= route('back.admin.house.status.save')?>',
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
        url: '<?= route('back.admin.house.sort')?>',
        type: "POST",
        data: {positions: selectedData},
    });
    handleRequestDone(request);
    handleRequestFailAndAlways(request);
}
</script>
@endsection