@extends('home.home_master')
@section('home')

  <div class="breadcrumb-wrapper light-bg">
    <div class="container">

      <div class="breadcrumb-content">
        <h1 class="breadcrumb-title pb-0">About Us</h1>
        <div class="breadcrumb-menu-wrapper">
          <div class="breadcrumb-menu-wrap">
            <div class="breadcrumb-menu">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><img src="{{ asset('frontend/assets/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                <li aria-current="page">About Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End breadcrumb -->

  <div class="lonyo-section-padding10">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <div class="lonyo-about-us-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-about-us-thumb">
              <img src="{{ asset('frontend/assets/images/about-us/img1.png') }}" alt="">
            </div>
            <div class="lonyo-about-us-thumb">
              <img src="{{ asset('frontend/assets/images/about-us/img2.png') }}" alt="">
              <div class="lonyo-about-us-card">
                <img src="{{ asset('frontend/assets/images/about-us/card1.svg') }}" alt="">
              </div>
            </div>
          </div>
          <div class="lonyo-about-us-thumb" data-aos="zoom-in" data-aos-duration="700">
            <img src="{{ asset('frontend/assets/images/about-us/img3.png') }}" alt="">
            <div class="lonyo-about-us-card2">
              <img src="{{ asset('frontend/assets/images/about-us/card2.svg') }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="lonyo-about-us-wrap">
            <div class="lonyo-about-us-thumb" data-aos="zoom-in" data-aos-duration="500">
              <img src="{{ asset('frontend/assets/images/about-us/img4.png') }}" alt="">
            </div>
            <div class="lonyo-about-us-thumb-wrap">
              <div class="lonyo-about-us-thumb">
                <img src="{{ asset('frontend/assets/images/about-us/img5.png') }}" alt="">

              </div>
              <div class="lonyo-about-us-thumb" data-aos="fade-up" data-aos-duration="700">
                <img src="{{ asset('frontend/assets/images/about-us/img6.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end content -->

  <div class="lonyo-section-padding6">
    <div class="container">
      <div class="lonyo-section-title center">
        <p>We already have 25k+ positive reviews and ratings</p>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-6">
          <div class="lonyo-rating-wrap pt-0" data-aos="fade-right" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{ asset('frontend/assets/images/v3/star.svg') }}" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>“Life-changing tool for budgeting! This app has completely transformed how I manage my money. Highly
                recommend!”</p>
              <span>4.5/5 rating from Michael Chen</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="lonyo-rating-wrap pt-24" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{ asset('frontend/assets/images/v3/star.svg') }}" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>“It save money more than I expected! With this software, I can stick to my budget. Goal-setting
                features are highly motivating!”</p>
              <span>4.5/5 rating from Adam Smith</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="lonyo-rating-wrap" data-aos="fade-left" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{ asset('frontend/assets/images/v3/star.svg') }}" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>““Great for tracking and organizing finances! I can see all my expenses in one place and set limits. It
                helped me avoid overspending.”</p>
              <span>4.5/5 rating from David Nguyen</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end rating -->

  @php
    $about = App\Models\About::find(1);
  @endphp

  <div class="lonyo-section-padding3">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="lonyo-about-us-thumb2 pr-51" data-aos="fade-up" data-aos-duration="700">
            <img src="{{ asset($about->image) }}" alt="">
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="lonyo-default-content pl-32" data-aos="fade-up" data-aos-duration="900">
            <h2>{{ $about->title }}</h2>
            {!! $about->description !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end -->

  <section class="lonyo-section-padding3 position-relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="lonyo-default-content pr-50 feature-wrap">
            <h2>Our core values ​​serve as our driving force</h2>
            <p class="max-w616">Our core values ​​are at the core of everything we do. Ensuring the integrity, security
              and privacy of your data. Innovation, providing cutting-edge tools to simplify financial management. </p>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="lonyo-about-us-feature-wrap one" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend/assets/images/about-us/icon1.svg') }}" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>User-Centric Innovation</h4>
              <p>We design our apps and software with our users in mind, constantly evolving to meet their financial
                needs and solutions.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap two" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend/assets/images/about-us/icon2.svg') }}" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Transparency</h4>
              <p>We believe in clear communication and full transparency in all our practices, providing users with
                accurate financial insights.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap three" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend/assets/images/about-us/icon3.svg') }}" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Integrity & Trust</h4>
              <p>We build lasting relationships with our users by consistently delivering reliable, ethical, and also
                trustworthy services.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap mb-0 four" data-aos="fade-up" data-aos-duration="1100">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend/assets/images/about-us/icon4.svg') }}" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Security You Can Trust</h4>
              <p>Your financial data is protected with top-level encryption and security protocols to ensure your
                information is always secure.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="lonyo-feature-shape shape2"></div>
  </section>
  <!-- end feature -->

  <div class="lonyo-section-padding10 team-section">
    <div class="shape">
      <img src="{{ asset('frontend/assets/images/about-us/shape1.svg') }}" alt="">
    </div>
    <div class="container">
      <div class="lonyo-section-title center max-width-750">
        <h2>We always believe in the strength of our team</h2>
      </div>

      @php
        $team = App\Models\Team::latest()->get();
      @endphp

      <div class="row">
        @foreach ($team as $member)
            <div class="col-lg-3 col-md-6">
                <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
                    <div class="lonyo-team-thumb">
                        <a href="single-team.html">
                            <img src="{{ asset($member->image) }}" alt="">
                        </a>
                    </div>
                    <div class="lonyo-team-content">
                        <a href="single-team.html">
                            <h6>{{ $member->name }}</h6>
                        </a>
                        <p>{{ $member->position }}</p>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end team -->

    @include('home.homelayout.answers')
    <!-- end faq -->

  <div class="lonyo-content-shape">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
  </div>

  <section class="lonyo-cta-section bg-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
            <img src="assets/images/v1/cta-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
            <h2>Start a new level of money management</h2>
            <p>Our finance apps and software are powerful tools for managing personal or business finances, helping
              users stay organized, track financial health, and make informed decisions.</p>
            <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
              <ul>
                <li>
                  <a href="https://www.apple.com/app-store/"><img src="assets/images/v1/app-store.svg" alt=""></a>
                </li>
                <li>
                  <a href="https://playstore.com/"><img src="assets/images/v1/play-store.svg" alt=""></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end cta -->

@include('home.homelayout.apps')
<!-- end cta -->

@endsection