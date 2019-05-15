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
    <script src="{{ asset('js/news.js') }}"></script>

    <!-- Include Quill stylesheet -->
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">

    <!-- Include TagsScript stylesheet -->
    <link href="{{ asset('css/jquery.tagsinput.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.tagsinput.js') }}"></script>


</head>
<body>
<div class="container-fluid page">

    @if(session('warning'))
        <div class="js-flash-alert alert alert-warning">{{session('warning')}}</div>
    @endif

    @if(session('message'))
        <div class="js-flash-alert alert alert-success">{{session('message')}}</div>
    @endif

    @if(session('error'))
        <div class="js-flash-alert alert alert-danger">{{session('error')}}</div>
    @endif

    <div class="container page">
        {{--Header--}}
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-header-title">
                                <a class="page-news-link" href="{{URL::route('index')}}">Лента новостей</a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="page-header-user">
                                @if(isset($user))
                                    {{$user}}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="page-header-create-news  pt-1">
                                @if(\Request::route()->getName() == 'index')
                                <a class="page-news-link" href="{{URL::route('create.news')}}">Добавить новость</a>
                                @endif
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
