@extends('back.layout.default')
@section('title')
@lang('COMMISSION FEES'): {{$agencia->nombre}}
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col">
        @include('back.partials.alerts.success')
        @include('back.partials.alerts.error')
        @if($agencia->comisiones()->exists())
        <div class="card">
            <div class="card-header">
                @lang('COMMISSION FEES') ({{ $agencia->comisiones()->count() }})
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('TANGO HOUSE')</th>
                                <th>@lang('COMMISSION FEE')</th>
                                <th>@lang('EDIT')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            @foreach($agencia->comisiones as $comision)
                            <tr id="{{ $comision->id }}">
                                <td>{{ $comision->casa->nombre }}</td>
                                <td>{{ $comision->porcentaje }}%</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-round btn-custom-color waves-effect waves-light btn-commission-edit" data-commission="{{$comision->id}}"><i class="fa fa-pencil-alt"></i></a>
                                </td>
                                <td>
                                    <form>
                                        <input type="hidden" name="id" value="{{ $comision->id }}">
                                        <input type="checkbox" name="status" class="js-switch" data-color="#02BA5A" data-size="small" {{ $comision->status ? 'checked' : '' }}>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
<div class="modal fade" id="modal-commission-edit">
    <div class="modal-dialog">
        <div class="modal-content border-info animated fadeInLeftBig"></div>
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
            url: '<?= route('back.admin.agency.commission.status.save')?>',
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

$(document).on('click', ".btn-commission-edit", function (e)
{
    e.preventDefault();
    var id = $(this).data('commission');
    var request = $.ajax({
        url: '<?= route('back.admin.agency.commission.edit')?>',
        type: "GET",
        data: {
            id: id,
        }
    });
    request.done(function (data)
    {
        var modal = $('#modal-commission-edit');
        modal.find('.modal-content').html(data);
        modal.modal('show');
    });
});

$(document).on('submit', '#form-commission-edit', function (e)
{
    e.preventDefault();
    var request = $.ajax({
        url: "<?= route('back.admin.agency.commission.update')?>",
        type: "POST",
        data: $(this).serialize()
    });
    handleRequestDone(request);
    request.done(function (data)
    {
        $('#modal-commission-edit').modal('hide');
        window.location.reload();
    });
    handleRequestFailAndAlways(request, null, $('#error-commission-edit'));
});


</script>
@endsection