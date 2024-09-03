<section class="section-footer">
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-md">
                <h5>@lang('TANGO HOUSES')</h5>
                @if($casas->isNotEmpty())
                <br>
                <ul class="list-unstyled">
                    @foreach($casas as $casa)
                    @if(!$casa->espectaculo()->exists())
                    @continue
                    @endif
                    <li><a href="{{route('web.page.house', ['casa_id' => $casa->identity, 'slug' => $casa->slug])}}"> <i class="fas fa-angle-right"></i> <b>{{$casa->nombre}}</b> (@lang('FROM') {{$casa->espectaculo->first()->moneda->codigo}} {{$casa->espectaculo->first()->precioConDescuento}})</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md">
                <h5>@lang('OUR COMPANY')</h5>
                <br>
                <ul class="list-unstyled">
                    <li><a href="{{route('web.page.aboutus')}}">@lang('ABOUT US')</a></li>
                    <li><a href="{{route('web.page.contact')}}">@lang('CONTACT')</a></li>
                    <li><a href="{{route('web.page.houses')}}">@lang('TANGO HOUSES')</a></li>
                    <li><a href="{{route('web.page.agency')}}">@lang('TRAVEL AGENCIES')</a></li>
                    <li><a href="{{route('web.page.shows')}}">@lang('SHOWS BOOKING')</a></li>
                    <li><a href="/pickup">@lang('PICKUP ZONE')</a></li>
                </ul>
            </div>
            <div class="col-md">
                <h5>@lang('SECURE PAYMENT')</h5>
                <br>
                <img src="{{asset('web/img/payment.png')}}" class="img-fluid">
            </div>
            <div class="col-md my-4 my-md-0 text-center">
                <img src="{{asset('web/img/bets-seller-tango-show.png')}}" class="img-fluid"><br><br>
                <a href="https://www.tripadvisor.com/Search?q=tango%20show&searchSessionId=120CE75D379F7F6CCE4D18B549D5BA1F1592333078313ssid&searchNearby=false&sid=4FFDD7B31A11FC6A86B868C93CF1D43A1592333084461&blockRedirect=true" target="_blank"><img src="{{asset('web/img/tripadvisor-logo.png')}}" class="img-fluid"></a>
            </div>
            <div class="col-md">
                <div class="text-center">
                    <img src="{{asset('web/img/FT-show-logo-black.png')}}" class="img-fluid" style="max-height: 82px;">
                    <div class="mt-3">
                        <img src="{{asset('web/img/facebook.png')}}" class="">
                        <img src="{{asset('web/img/instagram.png')}}" class="">
                    </div>
                    <div class="mt-3">
                        <a href="mailto:booking@tangoandfolklore.com">booking@tangoandfolklore.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>