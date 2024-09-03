@extends('back.layout.default')
@section('title', __('TRANSFER RATES') . ': ' . $casa->nombre)
@section('styles')
@endsection
@section('content')
<div class="row">
    <div class="col">
        @include('back.partials.alerts.success')
        @include('back.partials.alerts.error')
        <form id="form-save">
            <input type="hidden" name="casa_id" value="{{$casa->id}}">
            @foreach($zonas as $zona)
            <div class="card">
                <div class="card-header">
                    @lang($zona->denominacion)
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($traslados as $traslado)
                        @if($zona->id === 3 && $traslado->id === 1)
                        @continue
                        @endif
                        @foreach($tipos_traslado as $tipo_traslado)
                        @if($tipo_traslado->id === 2 && $traslado->id === 2)
                        @continue
                        @endif
                        <div class="col">
                            <label>@lang($traslado->denominacion) | @lang($tipo_traslado->denominacion)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-money-check-alt"></i></span>
                                </div>
                                <input type="text" class="form-control mask_valor" name="{{$zona->id}}|{{$traslado->id}}|{{$tipo_traslado->id}}"  value="{{$casa->recorrido()->exists()
                                    ? $casa->recorrido()->where([['zona_id', $zona->id], ['traslado_id', $traslado->id], ['tipo_traslado_id', $tipo_traslado->id]])->first()->precio
                                    : 0}}">
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            <div class="float-right">
                <a href="{{ route('back.admin.house.index') }}" class="btn btn-round btn-danger btn-preload waves-effect waves-light m-1">
                    <i class="fa fa-window-close"></i> @lang('CLOSE')
                </a>
                <button type="submit" class="btn btn-round btn-success waves-effect waves-light m-1" id="btn-form-save">
                    <i class="zmdi zmdi-rotate-right zmdi-hc-spin icon-loading d-none"></i> <i class="fa fa-save"></i> @lang('SAVE')
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset("/back/js/jquery.mask.min.js") }}"></script>
<script src="{{ asset("/back/js/jquery.maskMoney.min.js") }}"></script>
<script>
$(document).ready(function ()
{
    $('#form-save').on('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.house.transfer.update')  ?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request);
    });
});
doMask();
</script>
@endsection