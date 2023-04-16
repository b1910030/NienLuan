@extends('layouts.app')

@section('content')
    <main>
      <!--=============== HOME ===============-->
      <div class="btn-hero1">
        <form action="" method="GET">
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
      <section
      
        class="hero"
        id="hero"
        style="
          background-repeat: no-repeat;
          background-size: cover;
          height: 50vh;
          background-image: url('https://media.istockphoto.com/photos/tropical-beach-with-boats-and-blue-ocean-in-tropical-island-picture-id1068291116?b=1&k=20&m=1068291116&s=170667a&w=0&h=9Bsc3HJkFdNRr0ESpdMeAlfSVLX68mVrz3UY-Ye0p0s=');
        "
      >

      <div>
        
      </div>
        <div class="hero-content h-100 d-flex justify-content-center align-items-center flex-column">
        
          <h1 class="text-center text-white display-4">All Tour</h1>
          <hr width="40" class="text-center" />
        </div>
        
      </section>
      

      <!--=============== Package Travel ===============-->

      
      <section
        class="container package text-center"
        id="package"
        style="margin-top: -60px"
      >
        <div class="row mt-5 justify-content-center">
            @foreach($tours as $tour)
            <div class="col-lg-3" style="margin-bottom: 140px">
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
                        ${{ $tour->price }}
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
    </main>
@endsection