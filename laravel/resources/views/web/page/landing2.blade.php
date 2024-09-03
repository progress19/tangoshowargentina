<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="carp-favicon.png">
        <title>TANGO AND FOLKLORE</title>
        <style>
            body, html {
                height: 100%;
            }

            .bg {
                background-image: url("{{asset('/web/img/salon.jpg')}}");
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .box{
                background-color: rgba(255,255,255, 0.5);
                border-radius: 15px;
                max-width: 330px;
                max-height: 330px;
            }
            .minh-100 {
                height: 100vh;
            }
            .font24{
                font-size: 24px;
            }
            .btn-danger:hover{
                background-color: #fff;
                border-color: #dc3545;
                color: #dc3545;
            }
        </style>
    </head>
    <body>
        <div class="bg">
            <div class="container">
                <div class="row justify-content-center align-items-center minh-100">
                    <div class="col-lg-12">
                        <div class="box p-3 mx-auto">
                            <div class="mb-5 mt-5">
                                <img class="img-fluid rounded mx-auto d-block" src="{{asset('/web/img/F&F-show-logo-2.svg')}}">
                            </div>
                            <div class="text-center font24">
                                COMING SOON
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>