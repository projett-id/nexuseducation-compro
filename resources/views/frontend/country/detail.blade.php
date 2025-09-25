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
                            <li>Partner Schools</li>
                            <li>Visa</li>
                            <ul>
                                @foreach($country->visas as $visa)
                                    <li><a href="#visa-{{$visa->id}}">{{ $visa->title }}</a></li>
                                @endforeach
                            </ul>

                            <li>Program</li>
                            <ul>
                                @foreach($country->programs as $program)
                                    <li><a href="#program-{{$program->id}}">{{ $program->title }}</a></li>  
                                @endforeach
                            </ul>
                        </ul>
                    </nav>
                </aside>
                <div class="article-content">
                    <div class="content-section" id="partner-school" data-aos="fade-up">
                        <h1>Our Partner School</h1>
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Website</th>
                                <th>Location</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($country->partnerSchools as $school)
                                <tr>
                                    <td>{{ $school->name }}</td>
                                    <td><a href="{{ $school->website }}" target="_blank" style="color:black">{{ $school->website }}</a></td>
                                    <td>{{ $school->location }}</td>
                                    <td><a href="{{ route('fe.school.detail',['name'=>$school->slug]) }}" style="color:black">Detail</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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