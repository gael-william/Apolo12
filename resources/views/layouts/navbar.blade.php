

<!-- Cart Sidebar Offcanvas Start-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    {{-- <input type="hidden" id="boutique_id" value="{{ $boutique->id }}"> --}}

    <div class="offcanvas-header bs-canvas-header side-cart-header p-3">
        <div class="d-inline-block main-cart-title" id="offcanvasRightLabel">
            My Cart <span id="cart-count">(0 Items)</span>
        </div> <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
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
                <a href="{{ route('welcome') }}"><img src="{{ asset('images/logo2.png') }}" alt=""></a>
                <a href="{{ route('welcome') }}"><img class="logo-inverse" src="images/dark-logo.svg"
                        alt=""></a>
            </div>
            {{-- <div class="search120">
                <div class="header_search position-relative">
                    <input class="prompt srch10" type="text" placeholder="Rechercher vos produits..">
                    <i class="uil uil-search s-icon"></i>
                </div>
            </div> --}}

            <div class="header_right">
                <ul>
                    <li style="list-style: none;">
                        <a href="tel:+22606598919"
                            style="display: flex; align-items: center; gap: 10px; text-decoration: none; color: #1a1a1a; font-family: 'Segoe UI', sans-serif; font-weight: 500; font-size: 16px;">
                            <i class="fas fa-phone" style="font-size: 20px; color: #007bff;"></i>
                            Service clientèle : +226 06598919 / 02101008
                        </a>
                    </li>

                    <li>
                        <a href="dashboard_my_wishlist.html" class="option_links" title="Wishlist"><i
                                class='uil uil-heart icon_wishlist'></i><span class="noti_count1">3</span></a>
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
                        
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe_5">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('welcome') }}">Accueil</a>
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
                                <a class="nav-link" href="contact_us.html">Qui sommes-nous?</a>
                            </li>
                        </ul>


                        <div class="d-block d-lg-none">
                            <ul class="offcanvas-help-links">
                                <li>
                                    <a href="#" class="offer-link"><i class="fas fa-phone"
                                            style="font-size: 20px; color: #f55d2c;"></i> +226 06-59-89-19/
                                        02-10-10-08</a>
                                </li>
                                <li><a href="mailto:info@kitiga.com" class="callemail"><i
                                            class="uil uil-envelope-alt" style="font-size: 20px; color: #f55d2c;"></i>
                                        info@kitiga.com</a></li>
                                <li>
                                    <a href="faq.html" class="offer-link"><i
                                            class="uil uil-question-circle"></i>Help</a>
                                </li>
                            </ul>
                            <div class="offcanvas-copyright">
                                <i class="uil uil-copyright"></i>Copyright 2024 <b>Kitiga</b> . Tous droits réservés

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
