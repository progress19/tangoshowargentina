<!--Start content-wrapper-->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <!-- Page title-->
            <div class="col-sm-9">
                <h4 class="page-title">
                    @yield('title')
                    @yield('button_in_title_section')
                </h4>
                {{-- @include('dashboard.b2b.layout.partials.breadcrumb') --}}

                @yield('breadcrumbs')
            </div>
            <!-- End Page title-->
            <!-- Page title rightbar-->
            <div class="col-sm-3">
                @include('back.layout.partials.rightbar')
            </div>
            <!-- End Page title rightbar-->
        </div>
        @yield('content')
    </div>
    <!-- End container-fluid-->
</div>
<!--End content-wrapper-->