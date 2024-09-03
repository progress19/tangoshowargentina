<div class="header fixed-top">
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg navbar-default">
            <a class="navbar-brand" href="{{route('web.page.home')}}">
                <img src="{{asset('/web/img/FT-show-logo-white.png')}}" style="max-height: 65px">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-default">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <ul class="navbar-nav ml-auto">
                    <!--                    <li class="nav-item">
                                            <a class="nav-link" href="{{route('web.page.houses')}}">
                                                @lang('TANGO HOUSES')
                                            </a>
                                        </li>-->
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">@lang('TANGO HOUSES')</a>
                        <ul class="dropdown-menu">
                            @foreach($casas as $casa)
                            <li class="dropdown-item"> 
                                <a href="{{route('web.page.house', ['casa_id' => $casa->identity, 'slug' => $casa->slug])}}">{{$casa->nombre}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('web.page.shows')}}">
                            @lang('SHOWS BOOKING')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('web.page.aboutus')}}">
                            @lang('ABOUT US')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('web.page.contact')}}">
                            @lang('CONTACT')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('web.page.agency')}}">
                            @lang('TRAVEL AGENCIES')
                        </a>
                    </li>
                    <li class="nav-item language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @foreach (config('languages') as $lang => $language)
                            @if ($lang != app()->getLocale())
                            <li class="dropdown-item"> 
                                <a href="{{ route('lang.switch', $lang) }}">
                                    <i class="flag-icon flag-icon-{{ $lang }} mr-2"></i>  {{__($language)}}
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>