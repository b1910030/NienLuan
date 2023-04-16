@extends('layouts.app')

@section('content')
    <main>
      <section class="container mt-5" style="margin-bottom: 70px">
        <div class="col-12 col-md">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="title-alt" href="{{ route('home') }}">Home</a>
              </li>
              <li class="breadcrumb-item main-color">Tour Detail</li>
            </ol>
          </nav>
        </div>

      </section>

      <!--=============== Package Travel ===============-->
      <section class="shop checkout section">
        <div class="container">
                <form class="form" method="POST" action="">
                    @csrf
                    
                    <div class="row"> 

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Thông Tin Thanh Toán </h2>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Họ<span>*</span></label>
                                            <input type="hidden" name="tour_id" value="{{$tour->id}}">
                                            <input required type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Tên<span>*</span></label>
                                            <input required type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input required type="email" name="email" placeholder="" value="{{old('email')}}">
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Số Điện Thoại <span>*</span></label>
                                            <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Địa chỉ<span>*</span></label>
                                            <input required type="text" name="address" placeholder="" value="{{old('address')}}">
                                            @error('address')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                            @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    
                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Đơn Hàng Của Bạn</h2>
                                    <div class="content">
                                        <ul>
                                            
                                            <livewire:counter/>
                                               
                                            
										    {{-- <li class="order_subtotal">Tạm Tính<span>{{ number_format($tour->price)}} VNĐ</span>
                                                
                                            </li> --}}
                                            {{-- <li class="shipping">
                                                Vận Chuyển
                                                
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Chọn đơn vị vận chuyển</option>
        
                                                    </select>
                                               
                                            </li> --}}
                                            
                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">Phiếu mua hàng<span>-{{number_format(session('coupon')['value'])}} VNĐ</span></li>
                                            @endif
                                           
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Tổng<span> VNĐ</span></li>
                                            @else
                                                <li class="last"  id="order_total_price">Tổng<span> VNĐ</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Thanh Toán</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                            <form-group>
                                                <input name="payment_method"  type="radio" value="cod"> <label> Tiền mặt</label><br>
                                                <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label> 
                                            </form-group>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Payment Method Widget -->
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                    </div>
                                </div>
                                <!--/ End Payment Method Widget -->
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn">Thanh Toán</button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
    </main>
@endsection

@push('style-alt')
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swipper/css/style.css') }}">
    <style>
        .swiper-container-3d .swiper-slide-shadow-left,
        .swiper-container-3d .swiper-slide-shadow-right {
        background-image: none;
      }
      figure{
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      figure table {
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;
      }

      tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-style: solid;
      }
      table>:not(caption)>*>*{
        border: 1px solid #dee2e6;
      }
      table>:not(caption)>*>* {
        padding: 0.5rem 0.5rem;
        background-color: transparent;
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px transparent;
      }
    </style>
@endpush

@push('script-alt')
    <script src="{{ asset('frontend/assets/libraries/swipper/js/app.js') }}"></script>
     <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        spaceBetween: 32,
        coverflowEffect: {
          rotate: 0,
        },
      });
    </script>
@endpush
