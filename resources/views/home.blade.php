@extends('layouts.app')
@section('content')
<section id="courses-hero" class="courses-hero section light-background">
  <div class="hero-content">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
          <div class="hero-text text-center">
            <h1>Empowering Global Education for Indonesian Students</h1>
            <div class="hero-stats">
            </div>
            <div class="row">
                <div class="hero-buttons" style="display:inline">
                  <a href="{{ route('start-your-journey-url') }}" class="btn btn-primary" style="margin-top:5px">Start Your Journey</a>
                  <a href="{{ route('partner-us-url') }}" class="btn btn-primary" style="margin-top:5px">Partner with Us</a>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-background">
    <div class="bg-shapes">
      <div class="shape shape-1"></div>
      <div class="shape shape-2"></div>
      <div class="shape shape-3"></div>
    </div>
  </div>

</section>

<section id="course-categories" class="course-categories section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Who We Are</h2>
    <p>Looking to grow your international student base in Indonesia?</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">
      <p style="text-align: justify;">
        <span style='color:#023382;font-weight:bold'>Nexus</span> <span style='color:#fdb515;font-weight:bold'>Education</span> is not new to the game, only to the name. Led by a core team with over 27 years in the industry, we’ve supported thousands of Indonesian students in securing placements at top global institutions.
        <br>
        Now, as <span style='color:#023382;font-weight:bold'>Nexus</span> <span style='color:#fdb515;font-weight:bold'>Education</span>, we are renewing our brand to better reflect the next generation of students we serve, while maintaining the same trusted commitment to families, schools, and partners. We bring together deep experience with a modern approach to make global education more accessible, personal, and effective.
      </p>
    </div>
  </div>
</section>

<section id="course-categories" class="course-categories section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Mission & Vision</h2>
    <p>What drives us to do this work?</p>
  </div>
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

<section id="course-categories" class="course-categories section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">
      <div class="col-md-6 cta">
        <h4 class="text-center mb-3">Student Segments We Serve</h4>
        <div class="features-list">
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <span>Secondary School</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="350">
              <i class="bi bi-check-circle-fill"></i>
              <span>Foundation & Diploma Pathway Programs</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-check-circle-fill"></i>
              <span>Vocational & Skills-Based Programs</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Undergraduate, Postgraduate, & Doctoral/PhD Programs</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Short-Term & Long-Term Language Programs</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Student Exchange Opportunities</span>
            </div>
          </div>
      </div>
      <div class="col-md-6 cta">
        <h4 class="text-center mb-3">End-to-End Student </h4>
        <div class="features-list">
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <span>Personalized Academic Counseling</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="350">
              <i class="bi bi-check-circle-fill"></i>
              <span>Program & University Selection</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-check-circle-fill"></i>
              <span>Application & Documentation Support</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Visa Guidance & Processing</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Pre-Departure Briefings</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Accommodation & Arrival Support</span>
            </div>
            <div class="feature-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Institutional Representation & Promotion</span>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

<section id="course-categories" class="course-categories section">
  <div class="container section-title" data-aos="fade-up">
    <h2>WORLDWIDE LINKS OF NEXUS EDUCATION</h2>
    <p>Nexus Education assists the recruitment of students for various types of institutions in the following countries:</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 justify-content-center">
      @foreach($countries as $country)
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
        <a href="{{route('fe.country.detail',['name'=>$country->name]) }}" class="category-card category-tech">
          <div class="category-icon" style="
                background: url('{{asset('storage/'.$country->flag)}}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: contain;">
          </div>
          <h5>{{ $country->name }}</h5>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- <section id="featured-instructors" class="featured-instructors section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Partnership University</h2>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-2.webp" class="img-fluid" alt="">
          </div>
          <div class="instructor-info">
            <h5>University A</h5>
            <p class="description">Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">2.1k</span>
                <span class="label">Students</span>
              </div>
              <div class="stat">
                <span class="number">8</span>
                <span class="label">Majors</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">View Detail</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-7.webp" class="img-fluid" alt="">
          </div>
          <div class="instructor-info">
            <h5>University B</h5>
            <p class="description">Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed nisi.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">3.5k</span>
                <span class="label">Students</span>
              </div>
              <div class="stat">
                <span class="number">4</span>
                <span class="label">Majors</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">View Detail</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-4.webp" class="img-fluid" alt="">
          </div>
          <div class="instructor-info">
            <h5>University C</h5>
            <p class="description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">1.8k</span>
                <span class="label">Students</span>
              </div>
              <div class="stat">
                <span class="number">6</span>
                <span class="label">Majors</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">View Detail</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
        <div class="instructor-card">
          <div class="instructor-image">
            <img src="assets/img/education/teacher-9.webp" class="img-fluid" alt="">
          </div>
          <div class="instructor-info">
            <h5>University D</h5>
            <p class="description">Vivamus magna justo lacinia eget consectetur sed convallis at tellus curabitur non nulla.</p>
            <div class="stats-grid">
              <div class="stat">
                <span class="number">2.9k</span>
                <span class="label">Students</span>
              </div>
              <div class="stat">
                <span class="number">7</span>
                <span class="label">Majors</span>
              </div>
            </div>
            <div class="action-buttons">
              <a href="#" class="btn-view">View Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section> -->
<section id="featured-courses" class="featured-courses section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Event</h2>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      @foreach($event as $dt)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="course-card">
            <div class="course-image">
              <img src="{{ asset('storage/'.$dt->thumbnail) }}" alt="Course" class="img-fluid">
              <div class="price-badge">{{$dt->status}}</div>
            </div>
            <div class="course-content">
              <h3><a href="{{ route('fe.event.detail',['slug'=>$dt->slug]) }}">{{$dt->title}}</a></h3>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($dt->description), 255, '...') }}</p>
              <div class="instructor">
                <img src="assets/img/person/png-clipart-user-computer-icons-person-icon-cdr-logo.png" alt="Instructor" class="instructor-img">
                <div class="instructor-info">
                  <h6>{{ $dt->organizer->name}}</h6>
                </div>
              </div>
              <!-- <div class="course-stats">
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <span>(4.5)</span>
                </div>
                <div class="students">
                  <i class="bi bi-people-fill"></i>
                  <span>342 students</span>
                </div>
              </div>
              <a href="#" class="btn-course">Regist Now</a>
            </div> -->
          </div>
        </div>
      </div>
      @endforeach      

    <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
      <a href="{{ route('fe.event') }}" class="btn-more">View All Event</a>
    </div>
  </div>
</section>
  
<section id="recent-blog-posts" class="recent-blog-posts section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Recent News Posts</h2>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      @foreach($news as $news) 
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card">
            <div class="card-top d-flex align-items-center">
              <span class="author-name">{{$news->published_at}}</span>
              <span class="ms-auto likes"><i class="bi bi-eye"></i> 65</span>
            </div>
            <div class="card-img-wrapper">
              <img src="{{ asset('storage/'.$news->thumbnail) }}" alt="Post Image">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="#">{{ $news->title }}</a></h5>
              <p class="card-text">
                {{ \Illuminate\Support\Str::limit(strip_tags($news->content), 100, '...') }}
              </p>
            </div>
          </div>
      </div>
      @endforeach
      <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
        <a href="{{ route('fe.news') }}" class="btn-more">View All News</a>
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimonials</h2>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-12">
        <div class="critic-reviews" data-aos="fade-up" data-aos-delay="300">
          <div class="row">
            <div class="col-md-4">
              <div class="critic-review">
                <div class="review-quote">"</div>
                <div class="stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <p>Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
                <div class="critic-info">
                  <div class="critic-name">The New York Times</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="critic-review">
                <div class="review-quote">"</div>
                <div class="stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                </div>
                <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat.</p>
                <div class="critic-info">
                  <div class="critic-name">Washington Post</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="critic-review">
                <div class="review-quote">"</div>
                <div class="stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                <div class="critic-info">
                  <div class="critic-name">The Guardian</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonials-container">
          <div class="swiper testimonials-slider init-swiper" data-aos="fade-up" data-aos-delay="400">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 1,
                "spaceBetween": 30,
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "768": {
                    "slidesPerView": 2
                  },
                  "992": {
                    "slidesPerView": 3
                  }
                }
              }
            </script>

            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    Proin eget tortor risus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-f-1.webp" alt="Reviewer" class="img-fluid rounded-circle">
                    <div>
                      <h3>Jane Smith</h3>
                      <h4>Book Enthusiast</h4>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-m-2.webp" alt="Reviewer" class="img-fluid rounded-circle">
                    <div>
                      <h3>Michael Johnson</h3>
                      <h4>Sci-Fi Blogger</h4>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                  </div>
                  <p>
                    Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-f-3.webp" alt="Reviewer" class="img-fluid rounded-circle">
                    <div>
                      <h3>Emily Davis</h3>
                      <h4>Book Club President</h4>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Lorem ipsum dolor sit amet, consectetur.
                  </p>
                  <div class="testimonial-profile">
                    <img src="assets/img/person/person-m-4.webp" alt="Reviewer" class="img-fluid rounded-circle">
                    <div>
                      <h3>Robert Wilson</h3>
                      <h4>Literary Reviewer</h4>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-12 text-center" data-aos="fade-up">
        <div class="overall-rating">
          <div class="rating-number">4.8</div>
          <div class="rating-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
          </div>
          <p>Based on 230+ reviews</p>
          <div class="rating-platforms">
            <span>Goodreads</span>
            <span>Amazon</span>
            <span>Barnes &amp; Noble</span>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</section>

<section id="cta" class="cta section light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">

      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="cta-content">
          <h2>Why Partner with us?</h2>
          <p>
            At <span style='color:#023382;font-weight:bold'>Nexus</span> <span style='color:#fdb515;font-weight:bold'>Education</span>, we understand that choosing the right education consultancy is not about numbers, it’s about trust, shared values, and a commitment to quality.
            <br><br>Here's why institutions around the world choose to collaborate with us:
          </p>

          <div class="features-list">
            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-check-circle-fill"></i>
              <span>Strategic Market Access</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="350">
              <i class="bi bi-check-circle-fill"></i>
              <span>Proven Success</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-check-circle-fill"></i>
              <span>Expert Counseling Team</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Robust Marketing Capability</span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
              <i class="bi bi-check-circle-fill"></i>
              <span>Sustainable Partnerships</span>
            </div>
          </div>

          <!-- <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
            <a href="#" class="btn btn-primary">Browse Courses</a>
            <a href="#" class="btn btn-outline">Regist Now</a>
          </div> -->

          <!-- <div class="stats-row" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="2" class="purecounter"></span>+</h3>
              <p>Students Enrolled</p>
            </div>
            <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="2" class="purecounter"></span>+</h3>
              <p>Courses Available</p>
            </div>
            <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2" class="purecounter"></span>%</h3>
              <p>Success Rate</p>
            </div>
          </div> -->
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="cta-image">
          <img src="https://jacksonstone.co.nz/wp-content/uploads/2024/06/hero_why-partner-with-us.jpg.webp" alt="Online Learning Platform" class="img-fluid">
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