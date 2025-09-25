@extends('layouts.app')
@push('styles')
<style>
    .blog-details .article-wrapper .table-of-contents nav ul {
        list-style-type: none; /* remove default bullets */
        padding-left: 0;      /* remove default padding */
    }
    .blog-details .article-wrapper .table-of-contents nav ul ul {
        list-style-type: none;
    }

    .table-of-contents li a {
       display: block;      /* makes the anchor behave like a block */
        margin: 4px 0;       /* vertical spacing */
        padding: 4px 8px;    /* clickable area bigger */
        text-decoration: none;
    }

</style>

@endpush
@section('content')
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">{{$data->name}}</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="#">Partner School</a></li>
        <li class="current">{{$data->name}}</li>
      </ol>
    </nav>
  </div>
</div>
<section id="course-details" class="course-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            @if($data->banner_header)
                <div class="col-md-12 mb-4" style="text-align:center">
                        <img src="{{ asset('storage/'.$data->banner_header) }}" class="mt-2">
                </div>
            @endif
            <div class="col-md-3">
                <div class="enrollment-card aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        <div class="enrollment-count">
                            <img src="{{ asset('storage/'.$data->logo) }}" class="mt-2" style="width:100%">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="course-highlights">
                            <div class="highlight-item">
                                <i class="bi bi-trophy"></i>
                                <span>{{$data->name}}</span>
                            </div>
                            <div class="highlight-item">
                                <i class="bi bi-flag"></i>
                                <span>{{$data->country->name}}</span>
                            </div>
                            <div class="highlight-item">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{$data->location}}</span>
                            </div>
                            <div class="highlight-item">
                                <i class="bi bi-link"></i>
                                <span><a href="{{$data->website}}" target="_blank">Website</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="course-nav-tabs" data-aos="fade-up" data-aos-delay="300">
                    <ul class="nav nav-tabs" id="course-detailsCourseTab" role="tablist">
                        @foreach($data->sections as $sc)
                            <li class="nav-item">
                                <button class="nav-link" id="course-{{$sc->id}}-tab" data-bs-toggle="tab" data-bs-target="#course-{{$sc->id}}" type="button" role="tab">
                                    {{$sc->title}}
                                </button>
                            </li>
                        @endforeach
                    </ul>  
                    <div class="tab-content" id="course-detailsCourseTabContent">
                         @foreach($data->sections as $sc)
                            <div class="tab-pane fade" id="course-{{$sc->id}}" role="tabpanel">
                                <div class="overview-section">
                                   {!!$sc->content!!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection