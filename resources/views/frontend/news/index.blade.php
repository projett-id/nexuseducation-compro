@extends('layouts.app')
@section('content')
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">News</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li class="current">News</li>
      </ol>
    </nav>
  </div>
</div>
<section id="courses-2" class="courses-2 section">
   <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-3">
            <form id="newsFilterForm" action="{{ route('fe.news') }}" method="GET" class="course-filters" data-aos="fade-right" data-aos-delay="100">
                <h4 class="filter-title">Filter News</h4>
                <div class="filter-group">
                  <h5>Category</h5>
                  <div class="filter-options">
                    <label class="filter-checkbox">
                      <input type="checkbox" checked="">
                      <span class="checkmark"></span>
                      All Categories
                    </label>
                    @foreach($categories as $category)
                      <label class="filter-checkbox">
                          <input 
                              type="checkbox" 
                              name="categories[]" 
                              value="{{ $category->id }}"
                              {{ in_array($category->id, request()->get('categories', [])) ? 'checked' : '' }}
                              onchange="document.getElementById('newsFilterForm').submit();">
                          <span class="checkmark"></span>
                          {{ $category->name }}
                      </label>
                    @endforeach
                  </div>
                </div>
                <div class="filter-group">
                  <h5>Tag</h5>
                  <div class="filter-options">
                    <label class="filter-checkbox">
                      <input type="checkbox" checked="">
                      <span class="checkmark"></span>
                      All Levels
                    </label>
                      @foreach($tags as $tag)
                          <label class="filter-checkbox">
                              <input 
                                  type="checkbox" 
                                  name="tags[]" 
                                  value="{{ $tag->id }}"
                                  {{ in_array($tag->id, request()->get('tags', [])) ? 'checked' : '' }}
                                  onchange="document.getElementById('newsFilterForm').submit();">
                              <span class="checkmark"></span>
                              {{ $tag->name }}
                          </label>
                      @endforeach
                  </div>
                </div>
            </form>
          </div>
          <div class="col-lg-9">
            <div class="courses-header" data-aos="fade-left" data-aos-delay="100">
              <form action="{{ route('fe.news') }}" method="GET" class="search-box-form">
                  <div class="search-box">
                      <i class="bi bi-search"></i>
                      <input 
                          type="text" 
                          name="search" 
                          placeholder="Search news..." 
                          value="{{ request('search') }}">
                  </div>
              </form>
            </div>

            <div class="courses-grid" data-aos="fade-up" data-aos-delay="200">
              <div class="row">
                @foreach($news as $dt)
                  <div class="col-md-6">
                    <div class="course-card">
                      <div class="course-image">
                        <img src="{{ asset('storage/'.$dt->thumbnail) }}" alt="Course" class="img-fluid">
                        <div class="course-price">{{$dt->status}}</div>
                      </div>
                      <div class="course-content">
                        <h3>{{$dt->title}}</h3>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($dt->description), 255, '...') }}</p>
                        <div class="instructor-info">
                          <img src="assets/img/person/png-clipart-user-computer-icons-person-icon-cdr-logo.png" alt="Instructor" class="instructor-avatar">
                          <span class="instructor-name">{{ $dt->author->name}}</span>
                        </div>
                        <a href="{{ route('fe.news.detail',['slug'=>$dt->slug])}}" class="btn-course">Detail</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            {{ $news->links('pagination::bootstrap-5') }}
      </div>
</section>
@endsection