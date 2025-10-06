@extends('layouts.app')
@section('content')
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">About</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="current">About</li>
            </ol>
        </nav>
    </div>
</div>

<section id="course-categories" class="course-categories section" >
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">
      <p style="text-align: justify">
        {!! nl2br(e($data->about)) !!}
      </p>
    </div>
  </div>
</section>

<section id="course-categories" class="course-categories section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Vision & Mission </h2>
    <p>What drives us to do this work?</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">
      <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
        <div class="mission-card">
          <h3 class="text-center">Vision</h3>
          {!! nl2br(e($data->vision)) !!}
        </div>
      </div>
      <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
        <div class="mission-card">
          <h3 class="text-center">Mission</h3>
          {!! nl2br(e($data->mission)) !!}
        </div>
      </div>
    </div>
  </div>
</section>
<section id="course-categories" class="course-categories section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Values </h2>
    <p>What matters to us, and to you?</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">
      <div class="col-md-8 row">
        @foreach($data->values as $vl)
          <div class="col-md-4 text-center">
              <img src="{{ asset('storage/values/'.$vl['img']) }}" style="width: 60%;height:150px">
              <h5 class="mt-3">{{$vl['name']}}</h5>
          </div>
          @endforeach
      </div>
    </div>
    <!-- </div> -->
  </div>
</section>
<section id="cta" class="cta section light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">

      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="cta-content">
          <h2>Our Head Office Location</h2>
          <p>
            {{$data->address}}
          </p>
          <ul class="justify-text" style="list-style-type: none; padding: 0;">
            <li>Company Name: {{$data->company_name}}</li>
            <li>Company Registration No: 0107250093682</li>
            <li>Key Person/ Proprietor: {{$data->proprietor}}</li>
            <li>Contact No : {{$data->contact_no}}</li>
            <li>Email : {{$data->email}}</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="cta-image">
          <div class="embed-map-responsive"><div class="embed-map-container">
            <iframe class="embed-map-frame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{$data->link_maps}}"></iframe><a href="https://sprunkiretake.net" style="font-size:2px!important;color:gray!important;position:absolute;bottom:0;left:0;z-index:1;max-height:1px;overflow:hidden">sprunki retake</a></div><style>.embed-map-responsive{position:relative;text-align:right;width:100%;height:0;padding-bottom:66.66666666666666%;}.embed-map-container{overflow:hidden;background:none!important;width:100%;height:100%;position:absolute;top:0;left:0;}.embed-map-frame{width:100%!important;height:100%!important;position:absolute;top:0;left:0;}</style>
        </div>
          <!-- <div class="floating-element student-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card-content">
              <i class="bi bi-person-check-fill"></i>
              <div class="text">
                <span class="number">2,450</span>
                <span class="label">New Students This Month</span>
              </div>
            </div>
          </div>
          <div class="floating-element course-card" data-aos="zoom-in" data-aos-delay="700">
            <div class="card-content">
              <i class="bi bi-play-circle-fill"></i>
              <div class="text">
                <span class="number">50+</span>
                <span class="label">Hours of Content</span>
              </div>
            </div>
          </div> -->
        </div>
      </div>

    </div>

  </div>

</section>
@endsection