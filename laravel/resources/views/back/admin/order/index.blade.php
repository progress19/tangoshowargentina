@extends('back.layout.default')
@section('title')
@lang('BOOKINGS')
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('button_in_title_section')
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
                <form action="{{ route('back.admin.order.index') }}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('SURNAME')</label>
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
        @if($ordenes->total())
        <div class="card">
            <div class="card-header">
                @if(request()->input())
                @lang('SEARCH RESULTS'): {{ $ordenes->total() }}
                @else
                @lang('BOOKINGS') ({{ $ordenes->total() }})
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('PAYPAL ID')</th>
                                <th>@lang('TANGO HOUSE')</th>
                                <th>@lang('SHOW')</th>
                                <th>@lang('MAIN')</th>
                                <th>@lang('DATE')</th>
                                <th>@lang('PEOPLE')</th>
                                <th>@lang('TRANSFER AMOUNT')</th>
                                <th>@lang('SHOW AMOUNT')</th>
                                <th>@lang('TOTAL AMOUNT')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ordenes as $orden)
                            <tr id="{{ $orden->id }}">
                                <th scope="row">{{ $orden->id }}</th>
                                <td>{{ $orden->orderId }}<br>
                                <a href="{{route('back.admin.order.pdf.show', ['order_id' => $orden->id])}}" class="btn btn-round btn-custom-color waves-effect waves-light btn-sm"><i class="fas fa-file-pdf"></i> @lang('VOUCHER')</a>
                                </td>
                                <td>{{ $orden->espectaculo->casa->nombre }}</td>
                                <td>{{ $orden->espectaculo->nombre }}</td>
                                <td>{{ $orden->nombre . ' ' . $orden->apellido }}</td>
                                <td>{{ $orden->fecha->format('d/m/Y') }}</td>
                                <td>{{ $orden->cantidad }}</td>
                                <td>USD {{ $orden->total_traslado }} <br>{{ $orden->tipo_traslado }}</td>
                                <td>USD {{ $orden->total_show }}</td>
                                <td>USD {{ $orden->total }}</td>
                                <td>
                                    <form>
                                        <input type="hidden" name="id" value="{{ $orden->id }}">
                                        <input type="checkbox" name="status" class="js-switch" data-color="#02BA5A" data-size="small" {{ $orden->status ? 'checked' : '' }}>
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
                    {{ $ordenes->appends(request()->input())->links() }}
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
            url: '<?= route('back.admin.order.status.save')?>',
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