@extends('layouts.app')
@section('content')
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Event</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li class="current">Event</li>
      </ol>
    </nav>
  </div>
</div>
<section id="courses-events" class="courses-events section">
   <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row">
          <div class="col-lg-8">
            @foreach($event as $dt)
            <article class="event-card" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-0">
                  <div class="col-md-4">
                    <div class="event-image">
                      <img src="{{ asset('storage/'.$dt->thumbnail) }}" class="img-fluid" alt="Event Image">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="event-content">
                      <div class="event-meta">
                        <span class="time"><i class="bi bi-clock"></i> {{ $dt->FormattedSchedule }}</span>
                        <span class="location"><i class="bi bi-geo-alt"></i> {{ $dt->location }}</span>
                      </div>
                      <h3 class="event-title">
                        <a href="{{ route('fe.event.detail',['slug'=>$dt->slug])}}">{{$dt->title}}</a>
                      </h3>
                      <p class="event-description">{{ \Illuminate\Support\Str::limit(strip_tags($dt->description), 255, '...') }}</p>
                      <div class="event-footer">
                        <div class="instructor">
                          <!-- <img src="assets/img/person/person-f-8.webp" alt="Instructor" class="instructor-avatar"> -->
                          <span>{{ $dt->organizer->name}}</span>
                        </div>
                        <div class="event-price">
                          <span class="price">Free</span>
                        </div>
                      </div>
                      <div class="event-actions">
                        <a href="#" class="btn btn-primary">Register Now</a>
                        <a href="{{ route('fe.event.detail',['slug'=>$dt->slug])}}" class="btn btn-outline">Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
              @endforeach
  {{ $event->links('pagination::bootstrap-5') }}

          </div>
          <div class="col-lg-4">
            <div class="sidebar-widget search-widget" data-aos="fade-up" data-aos-delay="200">
              <h4 class="widget-title">Search Events</h4>
              <form class="search-form" action="{{ route('fe.event') }}" method="GET">
                <input type="text" placeholder="Search events..." class="form-control" name="search" value="{{ request('search') }}">
                <button type="submit" class="search-btn">
                  <i class="bi bi-search"></i>
                </button>
              </form>
            </div>
            <div class="sidebar-widget filter-widget" data-aos="fade-up" data-aos-delay="300">
              <h4 class="widget-title">Filter Events</h4>
              <div class="filter-content">
                <form action="{{ route('fe.event') }}" method="GET">
                      <div class="filter-group">
                          <label class="filter-label">Event Category</label>
                          <select class="form-select" name="category">
                              <option value="">All Types</option>
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                      {{ $category->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <div class="filter-group">
                          <label class="filter-label">Date Range</label>
                          <select class="form-select" name="date_range">
                              <option value="">All Dates</option>
                              <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Today</option>
                              <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>This Week</option>
                              <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>This Month</option>
                              <option value="quarter" {{ request('date_range') == 'quarter' ? 'selected' : '' }}>Next 3 Months</option>
                          </select>
                      </div>

                      <div class="filter-group">
                          <label class="filter-label">Price</label>
                          <select class="form-select" name="price">
                              <option value="">All Prices</option>
                              <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>Free</option>
                              <option value="paid" {{ request('price') == 'paid' ? 'selected' : '' }}>Paid</option>
                          </select>
                      </div>

                      <button type="submit" class="btn btn-primary filter-apply-btn">Apply Filters</button>
                  </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection