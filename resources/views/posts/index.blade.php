@extends('layouts.site')

@section('content')
<div class="decor">
    <div class="square" style="height: 472px"></div>
    <div class="header-bg-wave big"></div>
</div>
<div class="news-heading">
    <span class="sm-title text-center clubs-title">Новости Школы мяча</span>
    <div class="clubs-img-wrp">
        <img src="img/news.svg" alt="news">
    </div>
</div>
<div class="clubs-tabs">
    <ul class="nav nav-tabs nav-tabs_news" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active nav-link_news" id="all-tab" data-bs-toggle="tab"
                data-bs-target="#all" type="button" role="tab" aria-controls="all"
                aria-selected="true">Все</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="news-wrp">
                <div class="row news_row">
                    @foreach($news as $new)
                    <div class="col-4 col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                        <a href="{{route('posts.show', $new->id)}}" class="news_block" style="background-image: url('{{ $new->image ? '/img/' . $new->image :'img/img_vo_4(2x)@2x.jpg'}}')">
                            <div class="news_content">
                                <span class="news_block_title">{{$new->title1}}</span>
                                <span class="news_block_text">{{$new->created_at->format('d F')}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
@stop