<div class="backdrop"></div>
        <a class="backtop fas fa-arrow-up" href="#"></a>

        <!--=====================================
                    HEADER TOP PART START
        =======================================-->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="header-top-welcome">
                            <p>Welcome to Ecomart in Your Dream Online Store!</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-3">
                        <div class="header-top-select">
                            <div class="header-select">
                                <i class="icofont-world"></i>
                                <select class="select">
                                    <option value="english" selected>english</option>
                                    <option value="bangali">bangali</option>
                                    <option value="arabic">arabic</option>
                                </select>
                            </div>
                            <div class="header-select">
                                <i class="icofont-money"></i>
                                <select class="select">
                                    <option value="english" selected>doller</option>
                                    <option value="bangali">pound</option>
                                    <option value="arabic">taka</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-4">
                        <ul class="header-top-list">
                            <li><a href="{{url('offer')}}">offers</a></li>
                            <li><a href="{{url('faq')}}">need help</a></li>
                            <li><a href="{{url('contact')}}">contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================
                    HEADER TOP PART END
        =======================================-->



        <!--=====================================
                    HEADER PART START
        =======================================-->
        <header class="header-part">
            <div class="container">
                <div class="header-content">
                    <div class="header-media-group">
                        <button class="header-user"><img src="{{asset('images/user.png')}}" alt="user"></button>
                        <a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
                        <button class="header-src"><i class="fas fa-search"></i></button>
                    </div>

                    <a href="{{url('index')}}" class="header-logo">
                        <img src="{{asset('images/logo.png')}}" alt="logo">
                    </a>
                    @if(Auth::user())
                    <p class="header-widget" title="My Account">{{Auth::user()->name}}
                        <img src="{{asset('images/user.png')}}" alt="user">
                        <span></span>
                </p>
                    @else
                    <a href="{{url('login')}}" class="header-widget" title="My Account">
                        <img src="{{asset('images/user.png')}}" alt="user">
                        <span>join</span>
                    </a>
                    @endif
                    <form class="header-form">
                        <input type="text" placeholder="Search anything...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                    @php
                        // $location = App\Http\Controllers\LocationController::index();
                    @endphp


                        <p>{{$location ?? ''}}</p>
                    <div class="header-widget-group">
                        {{-- <a href="{{url('compare')}}" class="header-widget" title="Compare List">
                            <i class="fas fa-random"></i>
                            <sup>0</sup>
                        </a> --}}
                        {{-- @if(Auth::user())
                        <a href="{{url('wishlist')}}" class="header-widget" title="Wishlist">
                            <i class="fas fa-heart"></i>
                            @php
                                $count_wish = \App\Models\Wishlist::where('user_id',Auth::user()->id)->count();
                            @endphp
                            <sup>{{$count_wish}}</sup>
                        </a>
                        @else
                        <a href="{{route('login')}}" class="header-widget" title="Wishlist">
                            <i class="fas fa-heart"></i>
                            {{-- <sup></sup> --}}
                        {{-- </a> --}}
                        {{-- @endif  --}}

                        @if(Auth::user())
                        <a href="{{url('checkout')}}" class="header-widget header-cart" title="Cartlist">
                            <i class="fas fa-shopping-basket"></i>
                            {{-- @php
                                $count_cart = \App\Models\Cart::where('user_id',Auth::user()->id)->count();
                            @endphp
                            <sup>{{$count_cart}}</sup> --}}
                        @else
                        <a href="{{route('login')}}" class="header-widget header-cart" title="Cartlist">
                            <i class="fas fa-shopping-basket"></i>
                        @endif
                            {{-- <span>total price<small>$345.00</small></span> --}}
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!--=====================================
                    HEADER PART END
        =======================================-->


        <!--=====================================
                    NAVBAR PART START
        =======================================-->
        <nav class="navbar-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-content">
                            <ul class="navbar-list">
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown-arrow" href="#">home</a>
                                    <ul class="dropdown-position-list">

                                        <li><a href="{{url('home-standard')}}">Home standard</a></li>
                                    </ul>
                                </li>
                                <li class="navbar-item dropdown-megamenu">
                                    <a class="navbar-link dropdown-arrow" href="#">shop</a>
                                    <div class="megamenu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">shop pages</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="{{url('shop-3column')}}">shop 3 column</a></li>
                                                            <li><a href="{{url('shop-2column')}}">shop 2 column</a></li>
                                                            <li><a href="{{url('shop-1column')}}">shop 1 column</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">product pages</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="{{url('product-list')}}">product single tab</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">user action</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="{{url('wishlist')}}">wishlist</a></li>
                                                            {{-- <li><a href="{{url('compare')}}">compare</a></li> --}}
                                                            <li><a href="{{url('checkout')}}">checkout</a></li>
                                                            <li><a href="{{url('orderlist')}}">order history</a></li>
                                                            <li><a href="{{url('invoice')}}">order invoice</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">other pages</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="{{url('all-catagory')}}">all Category</a></li>
                                                            {{-- <li><a href="{{url('brand-list')}}">brand list</a></li>
                                                            <li><a href="{{url('brand-single')}}">brand single</a></li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="navbar-item dropdown-megamenu">
                                    <a class="navbar-link dropdown-arrow" href="#">category</a>
                                    <div class="megamenu">
                                        <div class="container megamenu-scroll">
                                            <div class="row row-cols-5">
                                                {{-- @php
                                                    $category = \App\Models\Category::all();
                                                    // dd($category);
                                                @endphp --}}

                                                {{-- @foreach($category as $cat) --}}
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        {{-- <h5 class="megamenu-title">{{$cat->name}}</h5> --}}
                                                        {{-- @php
                                                            $product = \App\Models\Product::where('category_id',$cat->id)->get();
                                                        @endphp --}}
                                                        <ul class="megamenu-list">
                                                        {{-- @foreach($product as $pro) --}}


                                                            {{-- <li><a href="{{url('product/'.$pro->id)}}">{{$pro->name}}</a></li> --}}
                                                            {{-- <li><a href="#">broccoli</a></li>
                                                            <li><a href="#">asparagus</a></li>
                                                            <li><a href="#">cauliflower</a></li>
                                                            <li><a href="#">eggplant</a></li> --}}

                                                        {{-- @endforeach
                                                    </ul>
                                                    </div>
                                                </div>
                                                @endforeach --}}
                                                {{-- <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">fruits</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">Apple</a></li>
                                                            <li><a href="#">orange</a></li>
                                                            <li><a href="#">banana</a></li>
                                                            <li><a href="#">strawberrie</a></li>
                                                            <li><a href="#">watermelon</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">dairy farms</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">Butter</a></li>
                                                            <li><a href="#">Cheese</a></li>
                                                            <li><a href="#">Milk</a></li>
                                                            <li><a href="#">Eggs</a></li>
                                                            <li><a href="#">cream</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">seafoods</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">Lobster</a></li>
                                                            <li><a href="#">Octopus</a></li>
                                                            <li><a href="#">Shrimp</a></li>
                                                            <li><a href="#">Halabos</a></li>
                                                            <li><a href="#">Maeuntang</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">diet foods</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">Salmon</a></li>
                                                            <li><a href="#">Avocados</a></li>
                                                            <li><a href="#">Leafy Greens</a></li>
                                                            <li><a href="#">Boiled Potatoes</a></li>
                                                            <li><a href="#">Cottage Cheese</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">fast foods</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">burger</a></li>
                                                            <li><a href="#">milkshake</a></li>
                                                            <li><a href="#">sandwich</a></li>
                                                            <li><a href="#">doughnut</a></li>
                                                            <li><a href="#">pizza</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">drinks</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">cocktail</a></li>
                                                            <li><a href="#">hard soda</a></li>
                                                            <li><a href="#">shampain</a></li>
                                                            <li><a href="#">Wine</a></li>
                                                            <li><a href="#">barley</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">meats</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">Meatball</a></li>
                                                            <li><a href="#">Sausage</a></li>
                                                            <li><a href="#">Poultry</a></li>
                                                            <li><a href="#">chicken</a></li>
                                                            <li><a href="#">Cows</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">fishes</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">scads</a></li>
                                                            <li><a href="#">pomfret</a></li>
                                                            <li><a href="#">groupers</a></li>
                                                            <li><a href="#">anchovy</a></li>
                                                            <li><a href="#">mackerel</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">dry foods</h5>
                                                        <ul class="megamenu-list">
                                                            <li><a href="#">noodles</a></li>
                                                            <li><a href="#">Powdered milk</a></li>
                                                            <li><a href="#">nut & yeast</a></li>
                                                            <li><a href="#">almonds</a></li>
                                                            <li><a href="#">pumpkin</a></li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown-arrow" href="#">pages</a>
                                    <ul class="dropdown-position-list">
                                        <li><a href="{{url('faq')}}">faqs</a></li>
                                        <li><a href="{{url('offer')}}">offers</a></li>
                                        @if(Auth::user())
                                        <li><a href="{{url('profile')}}">my profile</a></li>
                                        @endif
                                        <li><a href="{{url('wallet')}}">my wallet</a></li>
                                        <li><a href="{{url('about')}}">about us</a></li>
                                        <li><a href="{{url('contact')}}">contact us</a></li>
                                        <li><a href="{{url('privacy')}}">privacy policy</a></li>
                                        <li><a href="{{url('coming-soon')}}">coming soon</a></li>
                                        <li><a href="{{url('blank-page')}}">blank page</a></li>
                                        <li><a href="{{url('error')}}">404 Error</a></li>
                                        <li><a href="{{url('e-mail-template')}}">email template</a></li>
                                    </ul>
                                </li>
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown-arrow" href="#">authentic</a>
                                    <ul class="dropdown-position-list">
                                        @if(!Auth::user())
                                        <li><a href="{{url('login')}}">login</a></li>
                                        <li><a href="{{url('register')}}">register</a></li>
                                        <li><a href="{{url('reset-password')}}">reset password</a></li>
                                        <li><a href="{{url('change-password')}}">change password</a></li>
                                        @endif
                                        @if(Auth::user())
                                        <li>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                {{-- <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown-arrow" href="#">blogs</a>
                                    <ul class="dropdown-position-list">
                                        <li><a href="{{url('blog-grid')}}">blog grid</a></li>
                                        <li><a href="{{url('blog-details')}}">blog details</a></li>
                                        <li><a href="{{url('blog-author')}}">blog author</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                            <div class="navbar-info-group">
                                <div class="navbar-info">
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p>
                                        <small>call us</small>
                                        <span>(+880) 183 8288 389</span>
                                    </p>
                                </div>
                                <div class="navbar-info">
                                    <i class="icofont-ui-email"></i>
                                    <p>
                                        <small>email us</small>
                                        <span>support@greeny.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!--=====================================
                    NAVBAR PART END
        =======================================-->
