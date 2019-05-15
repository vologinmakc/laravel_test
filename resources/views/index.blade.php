@extends('layouts.page')

@section('content')
    <div class="row news-block">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body">
                            @if($news->count() > 0)
                                @foreach($news as $news_item)
                                    <div class="card-header"><h5>{{$news_item->title}}</h5></div>
                                    <div class="card-body"><img src="/storage/{{ $news_item->img_url }}" height="150px"></div>
                                    <div class="card-body">{!! $news_item->text !!}</div>
                                    <div class="">Разместил: {{$news_item->user()->first()->name}}</div>
                                    <div class="">Дата создания:
                                        {{ \Carbon\Carbon::parse($news_item->created_at)->format('d.m.Y')}}</div>
                                    <div class="page-tags">Tags:
                                        @if($news_item->tags->count() > 0)
                                                @foreach($news_item->tags as $tag)
                                                <a href="{{URL::route('index', ['tag' => $tag])}}">{{$tag->name}}</a>
                                                @endforeach
                                        @endif
                                    </div>
                                    <hr>

                                @endforeach
                                    {{ $news->links() }}
                            @else
                                <div class="alert alert-warning">
                                    <h4>Новостей не найдено</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

