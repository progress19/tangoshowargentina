<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>ADMIN</title>
        <!--favicon-->
        <link rel="icon" type="image/png" href="{{ asset('web/img/F&F-show-favicon.png') }}">
        <!-- Bootstrap core CSS-->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Icons CSS-->
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <!-- Custom Style-->
        <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet">
        <link href="{{ asset('back/css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="pageloader-overlay" class="visible incoming">
            <div class="loader-wrapper-outer">
                <div class="loader-wrapper-inner" >
                    <div class="loader">                
                    </div>
                </div>
            </div>
        </div> 
        <div id="wrapper">
            <div class="card card-authentication1 mx-auto my-5">
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <div class="alert-icon contrast-alert">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="alert-message">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $indexKey=>$error)
                                <li><i>{{ $error }}</i></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="card-content p-2">
                        <div class="text-center">
                            <img src="{{$img}}" alt="logo icon" class="img-fluid">
                            <div class="py-3">
                                @lang('ADMIN')
                            </div>
                        </div>
                        <form action="{{ route('back.access.login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="username" class="sr-only">@lang('USERNAME')</label>
                                <div class="position-relative has-icon-right">
                                    <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="@lang('USERNAME')" value="{{old('username')}}">
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">@lang('PASSWORD')</label>
                                <div class="position-relative has-icon-right">
                                    <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="@lang('PASSWORD')">
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">@lang('ENTER')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/app-script.js') }}"></script>
        <script src="{{ asset('back/js/scripts.js') }}"></script>
    </body>
</html>
