@extends('layouts.app')
@section('content')
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0"></h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="#">Partner With Us</a></li>
      </ol>
    </nav>
  </div>
</div>
<section id="contact" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="contact-content">
            <div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">
              <p>Please fill your information.</p>
              <form action="{{route('partner-us-url')}}" method="post" class="php-email-form">
                @csrf
                <div class="row">
                  <div class="col-md-4 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required="">
                  </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
                  </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required="">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="organization_name" id="organization_name" placeholder="Organization Name" required="">
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
                </div>

                <div class="form-submit justify-content-end">
                  <button type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection