<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" class="bg-theme bg-theme2" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{route($ruta_home)}}" class="btn-preload">
            <img src="{{asset('/back/img/logo.png')}}" class="logo-icon" alt="logo icon">
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
            <div class="avatar"><img class="mr-3 side-user-img user-image" src="{{$imagen_perfil}}" alt="user avatar"></div>
            <div class="media-body">
                <h6 class="side-user-name">
                    {{$nombre}}<br>
                    <small>{{ $tipo }}</small>
                </h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href="{{ route($ruta_perfil) }}" class="btn-preload"><i class="icon-user"></i>  @lang('PROFILE')</a></li>
                <li><a href="{{ route('back.access.logout') }}" class="btn-preload" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power"></i> @lang('LOGOUT')</a></li>
            </ul>
        </div>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        @hasrole('house')
        @include('back.layout.partials.sidebar.house')
        @endhasrole
        @hasrole('admin')
        @include('back.layout.partials.sidebar.admin')
        @endhasrole
        @hasrole('agency')
        @include('back.layout.partials.sidebar.agency')
        @endhasrole
    </ul>
</div>
<!--End sidebar-wrapper-->