<!--Start topbar header-->
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
<!--            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>-->
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            @if(auth()->user()->hasRole('agent'))
            @include('back.layout.partials.notification.agent')
            @endif
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
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img src="{{$imagen_perfil}}" class="img-circle user-image" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3 user-image" src="{{$imagen_perfil}}" alt="user avatar"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ $nombre }}</h6>
                                    <p class="user-subtitle">{{ $email }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                        <a href="{{ route($ruta_perfil) }}" class="btn-preload"><i class="icon-user mr-2"></i> @lang('PROFILE')</a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                        <a href="{{ route('back.access.logout') }}" class="btn-preload" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power mr-2"></i> @lang('LOGOUT')</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!--End topbar header-->