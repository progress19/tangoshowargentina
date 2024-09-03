@foreach($notificaciones as $key => $value)
@php 
$label = __($value[0]);
$cantidad_con_notas = $value[1];
$cantidad_recontactar = $value[2];
$notificacion_estado_id = $value[3];
$cantidad_eventos = $cantidad_recontactar + $cantidad_con_notas;
@endphp
<li class="nav-item dropdown-lg">
    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
        <i class="fa fa-bell"></i><span class="badge badge-{{ $key }} badge-up">{{$cantidad_eventos}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @if($cantidad_eventos)
                @lang('YOU HAVE :xxxxxx EVENTS TO SOLVE ON', ['xxxxxx' => $cantidad_eventos]):
                @else
                @lang('YOU HAVE NO EVENTS TO SOLVE ON'):
                @endif
                <span class="badge badge-{{$key}}">@lang($label)</span>
            </li>
            @if($cantidad_recontactar)
            <li class="list-group-item">
                <a href="{{route('back.agent.salesorder.index', [
                    'search_recontact_date' => date('d/m/Y'),
                            'search_status_type' => $notificacion_estado_id ]
                        )}}">
                    <div class="media">
                        <i class="fa fa-phone-alt fa-2x mr-3 text-{{ $key }}"></i>
                        <div class="media-body">
                            <h6 class="mt-0 msg-title">@lang('YOU MUST RECONTACT')</h6>
                            <p class="msg-info">{{ $cantidad_recontactar }} @lang('SALES ORDERS') <span class="badge badge-danger"><i class="fa fa-phone-alt"></i> @lang('TODAY')</span></p>
                        </div>
                    </div>
                </a>
            </li>
            @endif
            @if($cantidad_con_notas)
            <li class="list-group-item">
                <a href="{{route('back.agent.salesorder.index', [
                    'search_note_date' => date('d/m/Y'),
                            'search_status_type' => $notificacion_estado_id ]
                        )}}">
                    <div class="media">
                        <i class="fa fa-sticky-note fa-2x mr-3 text-{{ $key }}"></i>
                        <div class="media-body">
                            <h6 class="mt-0 msg-title">@lang('YOU LEFT NOTES')</h6>
                            <p class="msg-info">{{ $cantidad_con_notas }} @lang('SALES ORDERS') <span class="badge badge-danger"><i class="fa fa-sticky-note"></i> @lang('TODAY')</span></p>
                        </div>
                    </div>
                </a>
            </li>
            @endif
        </ul>
    </div>
</li>
@endforeach