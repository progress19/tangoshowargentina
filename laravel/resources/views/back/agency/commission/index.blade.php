@extends('back.layout.default')
@section('title')
@lang('AVAILABLE SHOWS'): {{auth()->user()->agencia->nombre}}
@endsection
@section('content')
<div class="row">
    <div class="col">
        @if(auth()->user()->agencia->comisiones()->where('status', true)->exists() && $espectaculos->isNotEmpty())
        <div class="card">
            <div class="card-header">
                @lang('AVAILABLE SHOWS') ({{ $espectaculos->count() }})
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('TANGO HOUSE')</th>
                                <th>@lang('SHOW')</th>
                                <th>@lang('PUBLIC PRICE')</th>
                                <th>@lang('YOUR PRICE')</th>
                                <th>@lang('PROFIT')</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            @foreach($espectaculos as $espectaculo)
                            <tr id="{{ $espectaculo->id }}">
                                <td>{{ $espectaculo->casa->nombre }}</td>
                                <td>{{ $espectaculo->nombre }}</td>
                                <td>{{$espectaculo->moneda->codigo}} {{$espectaculo->precio}}</td>
                                <td>{{$espectaculo->moneda->codigo}} {{$espectaculo->precioAgencia}}</td>
                                <td>{{$espectaculo->moneda->codigo}} {{$espectaculo->precio - $espectaculo->precioAgencia}}</td>
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
@endsection