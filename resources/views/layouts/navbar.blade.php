<!-- Category Model Start -->
<div class="header-cate-model main-gambo-model modal fade" id="category_model" tabindex="-1" role="dialog"
    aria-modal="false">
    <div class="modal-dialog category-area" role="document">
        <div class="category-area-inner">
            <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="uil uil-multiply"></i>
                </button>
            </div>
            <div class="category-model-content modal-content">
                <div class="cate-header">
                    <h4>Select Category</h4>
                </div>
                <ul class="category-by-cat">
                    <li>
                        <a href="#" class="single-cat-item category-filter" data-category="alimentation">
                            <div class="icon">
                                <img src="{{ asset('images/category/icon-7.svg') }}" alt="">
                                {{-- <link href="{{ asset('vendor/unicons-2.0.1/css/unicons.css') }}" rel="stylesheet"> --}}

                            </div>
                            <div class="text"> Alimentation </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="single-cat-item category-filter" data-category="pharmacopée">
                            <div class="icon">
                                <img src="{{ asset('images/category/icon-4.svg') }}" alt="">
                            </div>
                            <div class="text"> Pharmacopée </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="single-cat-item category-filter" data-category="cosmétique">
                            <div class="icon">
                                <img src="{{ asset('images/category/icon-6.svg') }}" alt="">
                            </div>
                            <div class="text"> Cosmétique </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Category Model End -->

<!-- Cart Sidebar Offcanvas Start-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    {{-- <input type="hidden" id="boutique_id" value="{{ $boutique->id }}"> --}}

    <div class="offcanvas-header bs-canvas-header side-cart-header p-3">
        <div class="d-inline-block main-cart-title" id="offcanvasRightLabel">
            My Cart <span id="cart-count">(0 Items)</span>
        </div>        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="uil uil-multiply"></i>
        </button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="side-cart-items"></div>
        <p id="empty-cart-message" class="text-center" style="display: none;">Votre panier est vide.</p>
    </div>
    <div class="offcanvas-footer">
        <div class="main-total-cart">
            <h2>Total</h2>
            <span>0 FCFA</span>
        </div>
        <div class="mb-2 px-3">
            <input type="text" id="userPhone" class="form-control" placeholder="Votre numéro de téléphone">
        </div>
        
        <div class="checkout-cart px-3">
            <button id="checkout-btn" class="cart-checkout-btn hover-btn w-100">Commander</button>
        </div>
    </div>
    
</div>
<!-- Cart Sidebar Offcanvas End-->
<!-- Header Start -->
<header class="header clearfix">
    <div class="top-header-group">
        <div class="top-header">
            <div class="main_logo" id="logo">
                <a href="index.html"><img src="{{ asset('images/logo2.png') }}" alt=""></a>
                <a href="index.html"><img class="logo-inverse" src="images/dark-logo.svg" alt=""></a>
            </div>
            <div class="search120">
                <div class="header_search position-relative">
                    <input class="prompt srch10" type="text" placeholder="Search for products..">
                    <i class="uil uil-search s-icon"></i>
                </div>
            </div>
            <div class="header_right">
                <ul>
                <li style="list-style: none;">
                <a href="tel:+22606598919" style="display: flex; align-items: center; gap: 10px; text-decoration: none; color: #1a1a1a; font-family: 'Segoe UI', sans-serif; font-weight: 500; font-size: 16px;">
                    <i class="fas fa-phone" style="font-size: 20px; color: #007bff;"></i>
                    Service clientèle : +226 06598919 / 02101008
                </a>
                </li>

                    <!-- <li>
                        <a href="offers.html" class="offer-link"><i class="uil uil-gift"></i>Offers</a>
                    </li> -->
                    <!-- <li>
                        <a href="faq.html" class="offer-link"><i class="uil uil-question-circle"></i>Help</a>
                    </li> -->
                    <li>
                        <a href="dashboard_my_wishlist.html" class="option_links" title="Wishlist"><i
                                class='uil uil-heart icon_wishlist'></i><span class="noti_count1">3</span></a>
                    </li>
                    <li class="dropdown account-dropdown">
                        <!-- <a href="#" class="opts_account" role="button" id="accountClick"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/avatar/img-5.jpg" alt="">
                            <span class="user__name">John Doe</span>
                            <i class="uil uil-angle-down"></i>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-account dropdown-menu-end"
                            aria-labelledby="accountClick" data-bs-popper="none">
                            <div class="night_mode_switch__btn">
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <i class="uil uil-moon"></i> Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                            </div>
                            <a href="dashboard_overview.html" class="channel_item"><i
                                    class="uil uil-apps icon__1"></i>Dashbaord</a>
                            <a href="dashboard_my_orders.html" class="channel_item"><i
                                    class="uil uil-box icon__1"></i>My Orders</a>
                            <a href="dashboard_my_wishlist.html" class="channel_item"><i
                                    class="uil uil-heart icon__1"></i>My Wishlist</a>
                            <a href="dashboard_my_wallet.html" class="channel_item"><i
                                    class="uil uil-usd-circle icon__1"></i>My Wallet</a>
                            <a href="dashboard_my_addresses.html" class="channel_item"><i
                                    class="uil uil-location-point icon__1"></i>My Address</a>
                            <a href="offers.html" class="channel_item"><i class="uil uil-gift icon__1"></i>Offers</a>
                            <a href="faq.html" class="channel_item"><i
                                    class="uil uil-info-circle icon__1"></i>Faq</a>
                            <a href="sign_in.html" class="channel_item"><i
                                    class="uil uil-lock-alt icon__1"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sub-header-group">
        <div class="sub-header">
            <nav class="navbar navbar-expand-lg bg-gambo gambo-head navbar justify-content-lg-start pt-0 pb-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon">
                        <i class="uil uil-bars"></i>
                    </span>
                </button>
                <!-- <a href="#" class="category_drop hover-btn" data-bs-toggle="modal"
                    data-bs-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span
                        class="cate__icon">Select Category</span></a> -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <div class="offcanvas-logo" id="offcanvasNavbarLabel">
                            <img src="images/logo2.png" alt="">
                        </div>
                        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="uil uil-multiply"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="offcanvas-category mb-4 d-block d-lg-none">
                            <div class="offcanvas-search position-relative">
                                <input class="canvas_search" type="text" placeholder="Search for products..">
                                <i class="uil uil-search hover-btn canvas-icon"></i>
                            </div>
                            <button class="category_drop_canvas hover-btn mt-4" data-bs-toggle="modal"
                                data-bs-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span
                                    class="cate__icon">Select Category</span></button>
                        </div>
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe_5">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                            </li>
                            {{-- <li class="nav-item">
                             <a class="nav-link" href="shop_grid.html">New Products</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="shop_grid.html">Featured Products</a>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 Blog
                             </a>
                             <ul class="dropdown-menu dropdown-submenu">
                                 <li><a class="dropdown-item" href="our_blog.html">Our Blog</a></li>
                                 <li><a class="dropdown-item" href="blog_no_sidebar.html">Our Blog Two No
                                         Sidebar</a></li>
                                 <li><a class="dropdown-item" href="blog_left_sidebar.html">Our Blog with Left
                                         Sidebar</a></li>
                                 <li><a class="dropdown-item" href="blog_right_sidebar.html">Our Blog with Right
                                         Sidebar</a></li>
                                 <li><a class="dropdown-item" href="blog_detail_view.html">Blog Detail View</a>
                                 </li>
                                 <li><a class="dropdown-item" href="blog_left_sidebar_single_view.html">Blog Detail
                                         View with Sidebar</a></li>
                             </ul>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 Pages
                             </a>
                             <ul class="dropdown-menu dropdown-submenu">
                                 <li><a class="dropdown-item" href="dashboard_overview.html">Account</a></li>
                                 <li><a class="dropdown-item" href="about_us.html">About Us</a></li>
                                 <li><a class="dropdown-item" href="shop_grid.html">Online Shop</a></li>
                                 <li><a class="dropdown-item" href="single_product_view.html">Single Product
                                         View</a></li>
                                 <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                 <li><a class="dropdown-item" href="request_product.html">Product Request</a></li>
                                 <li><a class="dropdown-item" href="order_placed.html">Order Placed</a></li>
                                 <li><a class="dropdown-item" href="bill.html">Bill Slip</a></li>
                                 <li><a class="dropdown-item" href="job_detail_view.html">Job Detail View</a></li>
                                 <li><a class="dropdown-item" href="sign_in.html">Sign In</a></li>
                                 <li><a class="dropdown-item" href="sign_up.html">Sign Up</a></li>
                                 <li><a class="dropdown-item" href="forgot_password.html">Forgot Password</a></li>
                             </ul>
                         </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="contact_us.html">Contact Us</a>
                            </li>
                        </ul>
                        <div class="d-block d-lg-none">
                            <ul class="offcanvas-help-links">
                                <li><a href="#" class="offer-link"><i class="fas fa-phone" style="font-size: 20px; color: #007bff;"></i>+226 06-59-89-19/ 02-10-10-08</a>
                              </li>
                                <li><a href="offers.html" class="offer-link"><i class="uil uil-gift"></i>Offers</a>
                                </li>
                                <li><a href="faq.html" class="offer-link"><i
                                            class="uil uil-question-circle"></i>Help</a></li>
                            </ul>
                            <div class="offcanvas-copyright">
                                <i class="uil uil-copyright"></i>Copyright 2024 <b>Kitiga</b> . All rights
                                reserved
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sub_header_right">
                    <div class="header_cart">
                        <a href="#" class="cart__btn hover-btn" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="uil uil-shopping-cart-alt"></i><span>Cart</span>
                        <ins id="cart-count-btn">0</ins> <!-- Nombre d'articles -->
                        <i class="uil uil-angle-down"></i>
                    </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- Header End -->
