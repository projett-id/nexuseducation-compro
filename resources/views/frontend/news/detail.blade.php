@extends('layouts.app')
@section('content')
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0"></h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('fe.event')}}">News</a></li>
        <li><a href="#">Detail</a></li>
        <li class="current">{{$news->title}}</li>
      </ol>
    </nav>
  </div>
</div>
<section id="blog-details" class="blog-details section">
   <div class="container" data-aos="fade-up">
        <article class="article">
            <div class="article-header">
                <div class="meta-categories" data-aos="fade-up">
                    <span class="category">{{ $news->category->name }}</span>
                    @foreach($news->tags as $tag)
                            <span class="category mb-1">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <h1 class="title" data-aos="fade-up" data-aos-delay="100">{{ $news->title }}</h1>
                <div class="article-meta" data-aos="fade-up" data-aos-delay="200">
                    <div class="author">
                        <div class="author-info">
                            <!-- <span><i class="bi bi-geo-alt"></i> {{ $news->published_at }}</span> -->
                        </div>
                    </div>
                    <div class="post-info">
                            <span><i class="bi bi-calendar4-week"></i> {{ $news->published_at }}</span>
                    </div>
                </div>
            </div>
            <div class="article-featured-image" data-aos="zoom-in">
                <img src="{{ asset('storage/'.$news->thumbnail) }}" alt="" class="img-fluid">
            </div>
            <div class="row col-md-12">
                        {!! $news->content !!}
            </div>
        </article>

</section>
@endsection