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
        <span style='color:#023382;font-weight:bold'>Nexus</span> <span style='color:#fdb515;font-weight:bold'>Education</span> is not new to the game, only to the name. Led by a core team with over 27 years in the industry, we’ve supported thousands of Indonesian students in securing placements at top global institutions.
        <br>
        <br>
        Now, as <span style='color:#023382;font-weight:bold'>Nexus</span> <span style='color:#fdb515;font-weight:bold'>Education</span>, we are renewing our brand to better reflect the next generation of students we serve, while maintaining the same trusted commitment to families, schools, and partners. We bring together deep experience with a modern approach to make global education more accessible, personal, and effective.
      </p>
    </div>
  </div>
</section>

<section id="course-categories" class="course-categories section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">
      <!-- <div class="row mt-5 pt-4"> -->
      <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
        <div class="mission-card">
          <h3 class="text-center">Mission</h3>
          <p>
            At <span style='color:#023382;font-weight:bold'>Nexus</span> <span style='color:#fdb515;font-weight:bold'>Education</span>, our mission is to empower Indonesian students to pursue their academic aspirations with clarity, care, and confidence. We provide personalized guidance, expert advice, and end-to-end support to help each student access the right global education pathway.
            <br><br>By working closely with families and schools, we ensure every journey is well-informed, well-prepared, and aligned with each student’s potential and purpose.
          </p>
        </div>
      </div>
      <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
        <div class="mission-card">
          <h3 class="text-center">Vision</h3>
          <p>To become the most trusted guide connecting Indonesian students to global education, ensuring every journey begins with clarity, care, and confidence.</p>
        </div>
      </div>
      <div class="col-lg-8 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
        <div class="mission-card text-center row">
          <h3>Values</h3>
          <p class="mb-5">What matters to us, and to you?</p>
          <div class="col-md-4">
            <img src="https://icons-pbl.davooda.com/basic3d-icons/png-256px/b3d-storage-portfolio-dark-design-icon.png" style="width: 60%;height:130px">
            <h5 class="mt-3">Professionalism</h5>
          </div>
          <div class="col-md-4">
            <img src="https://www.nicepng.com/png/full/35-355140_graduation-hat-png-free-graduation-cap-png-vector.png" style="width: 50%;height:130px">
            <h5 class="mt-3">Student-Centricity</h5>
          </div>
          <div class="col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/256/4450/4450698.png" style="width: 50%;height:130px">
            <h5 class="mt-3">Integrity</h5>
          </div>
        </div>
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
            Ruko Beryl 2 No.9, Jl. Gading Golf Boulevard, <br>Gading Serpong, Tangerang - 15810
          </p>
          <ul class="justify-text" style="list-style-type: none; padding: 0;">
            <li>Company Name: CV Nexus Education</li>
            <li>Company Registration No. : 0107250093682</li>
            <li>Key Person/ Proprietor: Ms. Siti Suwarni (I-ing) - Director</li>
            <li>Contact No. : +62 815 999 3255</li>
            <li>Email : iing@nexuseducation.id</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="cta-image">
          <div class="embed-map-responsive"><div class="embed-map-container">
            <iframe class="embed-map-frame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&height=400&hl=en&q=Ruko%20Beryl%202&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe><a href="https://sprunkiretake.net" style="font-size:2px!important;color:gray!important;position:absolute;bottom:0;left:0;z-index:1;max-height:1px;overflow:hidden">sprunki retake</a></div><style>.embed-map-responsive{position:relative;text-align:right;width:100%;height:0;padding-bottom:66.66666666666666%;}.embed-map-container{overflow:hidden;background:none!important;width:100%;height:100%;position:absolute;top:0;left:0;}.embed-map-frame{width:100%!important;height:100%!important;position:absolute;top:0;left:0;}</style>
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