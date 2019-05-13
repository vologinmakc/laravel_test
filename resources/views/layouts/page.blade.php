<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Лента Новостей</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid page">
    <div class="container page">
        {{--Header--}}
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="page-header-title">
                                Лента новостей
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="page-header-create-news pt-1">
                                Добавить новость
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{--Header--}}

        @yield('content')

        {{--footer--}}
        <div class="row page-footer">
            <div class="col-md-12">
                <div class="pt-2">
                    Create Laravel!
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
