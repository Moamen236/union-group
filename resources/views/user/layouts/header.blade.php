<header>
    <div class="sticky">
      <div class="container">

        <!-- Logo -->
        <div class="logo"> <a href="{{ route('user.index') }}"><img class="img-responsive" src="{{ asset('user/images/logo.png') }}" alt="" ></a> </div>
        <nav class="navbar ownmenu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
          </div>

          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
            <ul class="nav">
              <li class="dropdown {{ request()->routeIs('user.index') ? 'active' : '' }}"> <a href="{{ route('user.index') }}">Home</a>
              </li>
              <li class="dropdown {{ request()->routeIs('user.shop') ? 'active' : '' }}"> <a href="{{ route('user.shop') }}">Shop</a>
              </li>
              <li class="{{ request()->routeIs('user.about') ? 'active' : '' }}"> <a href="{{ route('user.about') }}">About </a> </li>

              <!-- Two Link Option -->
              <li class="dropdown"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">Designer</a>
                <div class="dropdown-menu two-option">
                  <div class="row">
                    <ul class="col-sm-6">
                      <li> <a href="{{ route('user.shop') }}">summer store</a></li>
                      <li> <a href="{{ route('user.shop') }}"> sarees</a></li>
                      <li> <a href="{{ route('user.shop') }}"> kurtas</a></li>
                      <li> <a href="{{ route('user.shop') }}"> shorts & tshirts</a></li>
                      <li> <a href="{{ route('user.shop') }}"> winter wear</a></li>
                      <li> <a href="{{ route('user.shop') }}"> jeans</a></li>
                      <li> <a href="{{ route('user.shop') }}"> bra</a></li>
                      <li> <a href="{{ route('user.shop') }}"> babydools</a> </li>
                    </ul>
                    <ul class="col-sm-6">
                      <li> <a href="{{ route('user.shop') }}">deodornts</a></li>
                      <li> <a href="{{ route('user.shop') }}"> skin care</a></li>
                      <li> <a href="{{ route('user.shop') }}"> make up</a></li>
                      <li> <a href="{{ route('user.shop') }}"> watch</a></li>
                      <li> <a href="{{ route('user.shop') }}"> siting bags</a></li>
                      <li> <a href="{{ route('user.shop') }}"> totes</a></li>
                      <li> <a href="{{ route('user.shop') }}"> gold rings</a></li>
                      <li> <a href="{{ route('user.shop') }}"> jewellery</a> </li>
                    </ul>
                  </div>
                </div>
              </li>

              <!-- MEGA MENU -->
              <li class="dropdown megamenu"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">store</a>
                <div class="dropdown-menu">
                  <div class="row">

                    <!-- Shop Pages -->
                    <div class="col-md-3">
                      <h6>Shop Pages</h6>
                      <ul>
                        <li> <a href="{{ route('user.shop') }}">Shop</a> </li>
                        <li> <a href="{{ route('user.product-detail') }}">Product Detail</a> </li>
                      </ul>
                    </div>

                    <!-- TOp Rate Products -->
                    <div class="col-md-4">
                      <h6>TOp Rate Products</h6>
                      <div class="top-rated">
                        <ul>
                          <li>
                            <div class="media-left">
                              <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="{{ asset('user/images/cart-img-1.jpg') }}" alt="..."> </a> </div>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading">WOOD CHAIR</h6>
                              <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              <span class="price">129.00 USD</span> </div>
                          </li>
                          <li>
                            <div class="media-left">
                              <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="{{ asset('user/images/cart-img-2.jpg') }}" alt="..."> </a> </div>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading">STOOL</h6>
                              <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              <span class="price">129.00 USD</span> </div>
                          </li>
                          <li>
                            <div class="media-left">
                              <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="{{ asset('user/images/cart-img-3.jpg') }}" alt="..."> </a> </div>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading">WOOD SPOON</h6>
                              <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              <span class="price">129.00 USD</span> </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <!-- New Arrival -->
                    <div class="col-md-5">
                      <h5>NEW ARRIVAL 2016 <span>(Best Collection)</span></h5>
                      <img class="nav-img" src="{{ asset('user/images/nav-img.png') }}" alt="" >
                      <p>Lorem ipsum dolor sit amet,<br>
                        consectetur adipiscing elit. <br>
                        Donec faucibus maximus<br>
                        vehicula.</p>
                      <a href="#." class="btn btn-small btn-round">SHOP NOW</a> </div>
                  </div>
                </div>
              </li>
              <li class="{{ request()->routeIs('user.contact') ? 'active' : '' }}"> <a href="{{ route('user.contact') }}"> contact</a> </li>
            </ul>
          </div>

          <!-- Nav Right -->
          <div class="nav-right">
            <ul class="navbar-right">

              <!-- USER INFO -->
              <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
                <ul class="dropdown-menu">
                  <li>
                    <h6>HELLO! Jhon Smith</h6>
                  </li>
                  <li><a href="#">MY CART</a></li>
                  <li><a href="#">ACCOUNT INFO</a></li>
                  <li><a href="#">LOG OUT</a></li>
                </ul>
              </li>

              <!-- USER BASKET -->
              <li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="icon-basket-loaded"></i> </a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="media-left">
                      <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="{{ asset('user/images/cart-img-1.jpg') }}" alt="..."> </a> </div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">WOOD CHAIR</h6>
                      <span class="price">129.00 USD</span> <span class="qty">QTY: 01</span> </div>
                  </li>
                  <li>
                    <div class="media-left">
                      <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="{{ asset('user/images/cart-img-2.jpg') }}" alt="..."> </a> </div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">WOOD STOOL</h6>
                      <span class="price">129.00 USD</span> <span class="qty">QTY: 01</span> </div>
                  </li>
                  <li>
                    <h5 class="text-center">SUBTOTAL: 258.00 USD</h5>
                  </li>
                  <li class="margin-0">
                    <div class="row">
                      <div class="col-xs-6"> <a href="#." class="btn">VIEW CART</a></div>
                      <div class="col-xs-6 "> <a href="#." class="btn">CHECK OUT</a></div>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- SEARCH BAR -->
              <li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i class=" icon-magnifier"></i></a>
                <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                  <div class="search-overlay"></div>
                  <div class="position-center-center">
                    <div class="search">
                      <form>
                        <input type="search" placeholder="Search Shop">
                        <button type="submit"><i class="icon-check"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
