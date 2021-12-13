@extends('layouts.site')

@section('content')
<div class="news-content">

    <span class="news-date">{{$new->created_at->format('d F')}}</span>
    <span class="sm-title text-center news-title">{{$new->title1}}</span>
    <div class="news-img-wrp text-center">
        <img src="{{$new->image ? '/img/' . $new->image :'/img/img_vo_4(2x)@2x.jpg'}}" alt="new" class="/img-fluid">
    </div>
    <div class="news-text">
        {!!$new->textarea1!!}
    </div>
    <div class="news-social_block">
        <a href="#" class="news-social-link">
            <img src="/img/vk.svg" alt="social" class="news_social-icon">
        </a>
        <a href="#" class="news-social-link">
            <img src="/img/fb.svg" alt="social" class="news_social-icon">
        </a>
        <a href="#" class="news-social-link">
            <img src="/img/tw.svg" alt="social" class="news_social-icon">
        </a>
        <a href="#" class="news-social-link">
            <img src="/img/tel.svg" alt="social" class="news_social-icon">
        </a>
    </div>
</div>
@if(count($news) > 0)
<div class="news">
    <span class="sm-title news_title">Новости за неделю</span>

    <div class="swiper-container news-slider">
        <div class="swiper-wrapper">
            @foreach($news as $nov)
            <div class="swiper-slide">
                <a href="{{route('posts.show', $nov->id)}}" style="text-decoration: none;">
                <div class="news_block" style="background-image: url('{{ $nov->image ? '/img/' . $nov->image :'/img/img_vo_4(2x)@2x.jpg'}}')">
                    <div class="news_content">
                        <span class="news_block_title">{{ $nov->title1 }}</span>
                        <span class="news_block_text">{{$nov->created_at->format('d F')}}</span>
                    </div>
                </div>
                </a>
            </div>
             @endforeach
        </div>
        
    </div>
    <div class="swiper-button-next-news">
        <div class="news-slider-arr"></div>
    </div>
    <div class="swiper-button-prev-news">
        <div class="news-slider-arr-prev"></div>
    </div>
</div>
@endif
@stop