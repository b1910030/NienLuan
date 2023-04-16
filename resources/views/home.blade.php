@extends('layouts.app')

@section('content')
<main>
      <!--=============== HOME ===============-->
      <section
        class="hero"
        id="hero"
        style="
          background-repeat: no-repeat;
          background-size: cover;
          height: 100vh;
          background-image: url('https://saigontourist.com.vn/img/application/homepage/new-banner/5.jpg');
        "
      >
        <div
          class="hero-content h-100 d-flex justify-content-center align-items-center flex-column"
        >
          <h1 class="text-center text-white display-4">
            
          </h1>
          <a href="#package" class="btn btn-hero mt-5"><strong>Book Now</strong></a>

          

        </div>
        <div class="btn-hero1">
          <form action="{{ route('tour') }}" method="GET">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label>Filter by Location</label>
                <select name="location_start" class="form-select">
                    <option value="">Choose departure place</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="Hạ Long">Hạ Long</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                </select>
                
              </div>
              <div class="col-md-3">
                <label>Filter by Date</label>
                <input type="date" name="date_start"  class="form-control">
              </div>
              <div class="col-md-3">
                <label>Filter by Name</label>
                <input type="text" name="name" placeholder="Enter keyword" class="form-control">
              </div>
              <div class="col-md-1">
                <br>
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
          </form>
        </div>
      </section>

      <!--=============== Why us ===============-->
      <div id="travle">
      <section class="container why-us text-center">
        <h2 class="section-title">About us</h2>
        <hr width="40" class="text-center" />
        <div class="row mt-5">
          <div class="col-lg-4 mb-3">
            <div class="card pt-4 pb-3 px-2">
              <div class="why-us-content">
                <i class="bx bx-money why-us-icon mb-4"></i>
                <h4 class="mb-3">Save Money</h4>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card pt-4 pb-3 px-2">
              <div class="why-us-content">
                <i class="bx bxs-heart why-us-icon mb-4"></i>
                <h4 class="mb-3">Stay Safe</h4>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card pt-4 pb-3 px-2">
              <div class="why-us-content">
                <i class="bx bx-timer why-us-icon mb-4"></i>
                <h4 class="mb-3">Save Time</h4>
                
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--=============== Tours ===============-->
      @foreach($categories as $category)
      <section class="container package text-center" id="package">
        <h2 class="section-title">{{ $category->title }}</h2>
        <hr width="40" class="text-center" />
        <div class="row mt-5 justify-content-center">

        @foreach($category->tours as $tour)
          <div class="col-lg-4" style="margin-bottom: 140px">
            <div class="card package-card">
              <a href="{{ route('detail', $tour) }}" class="package-link">
                <div class="package-wrapper-img overflow-hidden">
                  <img
                    src="/backend/img/{{ $tour->galleries->first()->path }}"
                    class="img-fluid"
                  />
                </div>
                <div class="package-price d-flex justify-content-center">
                  <span class="btn btn-light position-absolute package-btn">
                   {{ number_format($tour->price) }} VND
                  </span>
                </div>
                <h5 class="btn position-absolute w-100">
                  {{ $tour->name }}
                </h5>
              </a>
            </div>
          </div>
        @endforeach

        </div>
      </section>
      @endforeach

      <!-- Cars -->
      <section class="container text-center">
        <h2 class="section-title">Transpot</h2>
        <hr width="40" class="text-center"  />
        <div class="row">

        @foreach(\App\Models\Car::get() as $car)
          <div class="col-lg-3 mb-5">
            <div class="card p-3 border-0" style="border-radius: 0;text-align:left;">
              <img style="height: 200px;object-fit: contain;" src="/backend/img/{{ $car->image }}" alt="">
              <h4 class="main-color fw-bold mb-4" style="font-size: 1.4rem">{{ $car->name }}</h4>
              <span class="fw-bold mb-4" >Harga : IDR.{{ $car->price }}</span> 
              <span class="d-flex mb-3"><i class='bx bxs-gas-pump main-color fs-4 me-3 '></i> <strong>Driver + BBM</strong> </span> 
              <span class="d-flex"><i class='bx bxs-time-five main-color fs-4 me-3' ></i> <strong>{{ $car->duration }}</strong></span>
              <a href="#" class="btn mt-4 btn-book">Booking</a> 

            </div>
          </div>
          @endforeach

        </div>
      </section>

      <!--=============== Blog ===============-->
      <section class="container blog text-center">
        <h2 class="section-title">Our Blog</h2>
        <hr width="40" class="text-center" />

        <div class="row justify-content-center mt-5">
        @foreach($posts as $post)
          <div class="col-lg-4 mb-4 blogpost">
            <a href="{{ route('posts.show', $post)  }}">
              <div class="card-post">
                <div class="card-post-img">
                  <img src="/backend/img/{{$post->image}}"
                    alt="{{ $post->title }}">
                </div>
                <div class="card-post-data">
                  <span>Travel</span> <small>- {{ $post->created_at->diffForHumans() }}</small>
                  <h5>{{ $post->title }}</h5>
                </div>
              </div>
            </a>
          </div>
        @endforeach
        </div>
      </section>
    </div>
    </main>
@endsection
