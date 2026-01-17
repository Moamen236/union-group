@extends('user.layouts.app')

@section('content')

  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>ECOSHOP PRODUCTS</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
          Sed feugiat, tellus vel tristique posuere, diam</p>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.index') }}">Home</a></li>
          <li class="active">Shop</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Content -->
  <div id="content">

    <!-- Popular Products -->
    <section class="shop-page padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="item-display">
          <div class="row">
            <div class="col-xs-6"> <span class="product-num">Showing 1 - 10 of 30 products</span> </div>

            <!-- Products Select -->
            <div class="col-xs-6">
              <div class="pull-right">

                <!-- Short By -->
                <select class="selectpicker">
                  <option>Short By</option>
                  <option>Short By</option>
                  <option>Short By</option>
                </select>
                <!-- Filter By -->
                <select class="selectpicker">
                  <option>Filter By</option>
                  <option>Short By</option>
                  <option>Short By</option>
                </select>

                <!-- GRID & LIST -->
                <a href="#." class="grid-style"><i class="icon-grid"></i></a> <a href="#." class="list-style"><i class="icon-list"></i></a> </div>
            </div>
          </div>
        </div>

        <!-- Popular Item Slide -->
        <div class="papular-block row">

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-2-1.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-2-1.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">stone cup</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">


            <!-- Sale Tags -->
            <div class="on-sale">
            10%
            <span>OFF</span>
            </div>
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-2-2.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-2-2.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">gray bag</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-2-3.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-2-3.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">chiar</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-2-4.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-2-4.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">STool</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-5.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-5.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">stone cup</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-6.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-6.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">gray bag</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-7.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-7.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">chiar</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-8.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-8.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">STool</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-9.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-9.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">stone cup</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-10.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-10.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">gray bag</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-11.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-11.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">chiar</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>

          <!-- Item -->
          <div class="col-md-3">
            <div class="item">
              <!-- Item img -->
              <div class="item-img"> <img class="img-1" src="{{ asset('user/images/product-12.jpg') }}" alt="" > <img class="img-2" src="{{ asset('user/images/product-2.jpg') }}" alt="" >
                <!-- Overlay -->
                <div class="overlay">
                  <div class="position-center-center">
                    <div class="inn"><a href="{{ asset('user/images/product-12.jpg') }}" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                  </div>
                </div>
              </div>
              <!-- Item Name -->
              <div class="item-name"> <a href="{{ route('user.product-detail') }}">STool</a>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
              <!-- Price -->
              <span class="price"><small>$</small>299</span> </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section class="small-about padding-top-150 padding-bottom-150">
      <div class="container">

        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>about ecoshop</h4>
          <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odio luctus non. Nulla lacinia,
            eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
        </div>

        <!-- Social Icons -->
        <ul class="social_icons">
          <li><a href="#."><i class="icon-social-facebook"></i></a></li>
          <li><a href="#."><i class="icon-social-twitter"></i></a></li>
          <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
          <li><a href="#."><i class="icon-social-youtube"></i></a></li>
          <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
        </ul>
      </div>
    </section>

    <!-- News Letter -->
    <section class="news-letter padding-top-150 padding-bottom-150">
      <div class="container">
        <div class="heading light-head text-center margin-bottom-30">
          <h4>NEWSLETTER</h4>
          <span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odi </span> </div>
        <form>
          <input type="email" placeholder="Enter your email address" required>
          <button type="submit">SEND ME</button>
        </form>
      </div>
    </section>
  </div>

@endsection
