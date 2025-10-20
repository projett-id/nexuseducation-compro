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

    .clickable-section {
        cursor: pointer;
        transition: all 0.3s ease;
    }

</style>

@endpush
@section('content')
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">{{$country->name}}</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="#">Country</a></li>
        <li><a href="#">Detail</a></li>
        <li class="current">{{$country->name}}</li>
      </ol>
    </nav>
  </div>
</div>
<section id="blog-details" class="blog-details section">
   <div class="container" data-aos="fade-up">
        <article class="article">
            <div class="article-wrapper">
                <aside class="table-of-contents" data-aos="fade-left">
                    <h3>Table of Contents</h3>
                    <nav>
                        <ul>
                            @foreach($country->sections as $sec)
                            <li class="clickable-section" data-section="intro-{{ $sec->id }}">{{ $sec->section_name }}</li>
                            @endforeach
                            @if($country->partnerSchools->count() > 0)
                            <li class="clickable-section" data-section="partner-school"> Partner Schools</li>
                            @endif
                            @if($country->visas->count() > 0)

                                <li>Visa</li>
                                <ul>
                                    @foreach($country->visas as $visa)
                                        <li><a href="#visa-{{$visa->id}}">{{ $visa->title }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($country->programs->count() > 0)
                            <li>Program</li>
                            <ul>
                                @foreach($country->programs as $program)
                                    <li><a href="#program-{{$program->id}}">{{ $program->title }}</a></li>  
                                @endforeach
                            </ul>
                            @endif
                        </ul>
                    </nav>
                </aside>
                <div class="article-content">
                    @foreach($country->sections as $sec)
                        <div class="content-section" id="intro-{{ $sec->id }}" data-aos="fade-up">
                            <h1>{{$sec->section_name}}</h1>
                            {!! $sec->description !!}
                        </div>
                    @endforeach
                    @if($country->partnerSchools->count() > 0)
                        <div class="content-section" id="partner-school" data-aos="fade-up">
                            <h1>Our Partner School</h1>
                            <div class="col-md-12 row mb 2">
                                @foreach($country->partnerSchools as $school)
                                <div class="col-md-3">
                                    <div class="card partner-school-card h-100">
                                        <div class="card-body text-center">
                                            <div class="school-logo mb-3">
                                                @if($school->logo)
                                                    <img src="{{ asset('storage/'.$school->logo) }}" alt="{{ $school->name }}" class="img-fluid" style="max-height: 100px;">
                                                @else
                                                    <img src="{{ asset('images/default-school-logo.png') }}" alt="Default Logo" class="img-fluid" style="max-height: 100px;">
                                                @endif
                                            </div>
                                            <small><a href="{{ route('fe.school.detail', ['name' => $school->slug]) }}" class="btn btn-sm">Detail</a></small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @foreach($country->visas as $visa)
                        <div class="content-section" id="visa-{{ $visa->id }}" data-aos="fade-up">
                             {!! $visa->content !!}
                        </div>
                    @endforeach
                    <br><br>
                    @foreach($country->programs as $program)
                        <div class="content-section" id="program-{{ $program->id }}" data-aos="fade-up">
                            {!! $program->content !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
</section>
@endsection
@push('scripts')
<script>
document.querySelectorAll('.clickable-section').forEach(item => {
    item.addEventListener('click', function() {
        const sectionId = this.getAttribute('data-section');
        const element = document.getElementById(sectionId);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});
</script>
@endpush