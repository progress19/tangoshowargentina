@foreach($notificaciones as $key => $value)
@php 
$label = __($value[0]);
$cantidad_total = $value[1];
$coleccion_n_pedidos_recontactar = $value[2];
$cantidad_recontactar = $coleccion_n_pedidos_recontactar->count();
$notificacion_estado_id = $value[3];
@endphp
<li class="nav-item dropdown-lg">
    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
        <i class="fa fa-bell"></i><span class="badge badge-{{ $key }} badge-up">{{$cantidad_recontactar}}</span></a>
    <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
            @if($cantidad_recontactar)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <i class="fa fa-phone-alt"></i> @lang('RECONTACT TODAY')
                <span class="badge badge-{{ $key }}">{{ $cantidad_recontactar }} @lang('SALES ORDERS')</span>
            </li>
            @foreach($coleccion_n_pedidos_recontactar as $item)
            <li class="list-group-item">
                <a href="{{route('back.agent.salesorder.index', ['search_id' => $item->id])}}">
                    <div class="media">
                        <div class="w-icon"><i class="fa fa-2x fa-file-alt mr-3"></i></div>
                        <div class="media-body">
                            <h6 class="mt-0 msg-title">ID:{{ $item->id }} | {{ $item->titulo }}</h6>
                            <p class="msg-info">{{ $item->pasajero->nombre . ' ' . $item->pasajero->apellido }}</p>
                            <!--<small>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</small>-->
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
            <li class="list-group-item text-center">
                <a href="{{route('back.agent.salesorder.index', [
                    'search_recontact_date' => date('d/m/Y'),
                            'search_status_type' => $notificacion_estado_id ]
                        )}}">@lang('SEE ALL') <span class="badge badge-{{ $key }}">{{$label}}</span></a>
            </li>
            @endif
        </ul>
    </div>
</li>
@endforeach