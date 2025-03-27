@extends('layouts.app')
@section('content')
    <!-- Body Start -->
    <div class="wrapper">

        <div class="search-container">
            <div class="header_search position-relative">
                <input class="prompt srch10" type="text" placeholder="Rechercher des produits...">
                <i class="uil uil-search s-icon"></i>
            </div>
        </div>




        <!-- Offers Start -->
        <div class="main-banner-slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel offers-banner owl-theme">
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="images/banners/offer-1.jpg" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p></p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span></span>
                                        </div>
                                        <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Achetez maintenant</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="images/banners/offer-2.jpg" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p></p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span></span>
                                        </div>
                                        <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Achetez maintenant</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <!-- <img src="images/banners/offer-3.jpg" alt=""> -->
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p></p>
                                            <div class="top-text-1">Hot Deals on New Items</div>
                                            <span></span>
                                        </div>
                                        <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Achetez maintenant</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <!-- <img src="images/banners/offer-4.jpg" alt=""> -->
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p></p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span></span>
                                        </div>
                                        <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <!-- <img src="images/banners/offer-5.jpg" alt=""> -->
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p></p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span>Nuts & Snacks</span>
                                        </div>
                                        <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Offers End -->
        <!-- Categories Start -->
        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel cate-slider owl-theme">
                            @foreach ($boutiques as $boutique)
                                <div class="item">
                                    <a href="{{ route('boutique.show', $boutique->id) }}" class="category-item">
                                        <div class="cate-img">
                                            <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}">
                                        </div>
                                        <h4>{{ $boutique->name }}</h4>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories End -->

        <!-- Categories End -->
        <!-- Featured Products Start(L'OFFRE DU SIECLE) -->
        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2 class="cosmetique-elite">Nos produits stars</h2>
                            </div>
                            <a href="shop_grid.html" class="see-more-btn">See All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-1.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">6% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$12 <span>$15</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-2.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$10 <span>$13</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-3.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">5% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$5 <span>$8</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-4.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$15 <span>$20</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-5.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$9 <span>$10</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-6.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$7 <span>$8</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-7.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">1% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$6.95 <span>$7</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="single_product_view.html" class="product-img">
                                        <!-- <img src="images/product/img-8.jpg" alt=""> -->
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price">$8 <span>$10</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Products End -->
        <!-- Best Values Offers Start -->
        <div class="section145">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-12">
                          <div class="main-title-tt">
                           <div class="main-title-left">
                            <span>Offers</span>
                            <h2 class="cosmetique-elite">COSMÉTIQUE</h2>
                           </div>
                          </div>
                         </div> -->
                    <div class="col-lg-4 col-md-6">
                        <a href="#" class="best-offer-item">
                            <!-- <img src="images/best-offers/offer-1.jpg" alt=""> -->
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="#" class="best-offer-item">
                            <!-- <img src="images/best-offers/offer-2.jpg" alt=""> -->
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="#" class="best-offer-item offr-none">
                            <!-- <img src="images/best-offers/offer-3.jpg" alt=""> -->
                            <!-- <div class="cmtk_dt">
                            <div class="product_countdown-timer offer-counter-text" data-countdown="2022/08/09"></div>
                           </div> -->
                            <p>reserver pour presenter K.com</p>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="code-offer-item">
                            <!-- <img src="images/best-offers/offer-4.jpg" alt=""> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Best Values Offers End -->
        <!-- Vegetables and Fruits Start (ALIMENTATION) -->
        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2 class="cosmetique-elite">ALIMENTATION</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => 'alimentation']) }}" class="see-more-btn">See
                                All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($produitsAlimentation as $produit)
                                <div class="item">
                                    <div class="product-item">
                                        {{-- <a href="{{ route('produit.show', $produit->id) }}" class="product-img"> --}}
                                        {{-- <img src="{{ asset($produit->image_url ?? 'images/default.jpg') }}" alt="{{ $produit->name }}"> --}}
                                        <img src="{{ asset('storage/' . $produit->image_url) }}"
                                            class="card-img-top product-image" alt="{{ $produit->name }}">

                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                        </a>
                                        <div class="product-text-dt">
                                            <p>Available<span>(In Stock)</span></p>
                                            <p>Boutique<span>(
                                                <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}">
                                                    {{ $produit->boutique->name ?? 'Non attribué' }}
                                                </a>
                                            )</span></p>
                                            
                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-primary open-modal" data-id="{{ $produit->id }}"
                                                data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                                data-description="{{ $produit->description }}"
                                                data-image="{{ asset('storage/' . $produit->image_url) }}">
                                                Voir détails
                                            </button>
                                            {{-- <div class="qty-cart">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn">
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text">
                                                    <input type="button" value="+" class="plus plus-btn">
                                                </div>
                                                <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vegetables and Fruits Products End -->

        <!-- New Products Start (COSMÉTIQUE) -->
        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2 class="cosmetique-elite">COSMÉTIQUE</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => 'cosmetique']) }}" class="see-more-btn">See
                                All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($produitsCosmetique as $produit)
                                <div class="item">
                                    <div class="product-item">
                                        {{-- <a href="{{ route('product.show', $produit->id) }}" class="product-img"> --}}
                                        {{-- <img src="{{ asset($produit->image_url ?? 'images/default.jpg') }}" alt="{{ $produit->name }}"> --}}
                                        <img src="{{ asset('storage/' . $produit->image_url) }}"
                                            class="card-img-top product-image" alt="{{ $produit->name }}">

                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                        </a>
                                        <div class="product-text-dt">
                                            <p>Available<span>({{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }})</span>
                                            </p>
                                            <p>Boutique<span>(
                                                <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}">
                                                    {{ $produit->boutique->name ?? 'Non attribué' }}
                                                </a>
                                            )</span></p>
                                            
                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-primary open-modal" data-id="{{ $produit->id }}"
                                                data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                                data-description="{{ $produit->description }}"
                                                data-image="{{ asset('storage/' . $produit->image_url) }}">
                                                Voir détails
                                            </button>
                                            {{-- <div class="qty-cart">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn">
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text">
                                                    <input type="button" value="+" class="plus plus-btn">
                                                </div>
                                                <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Products End -->


        <!-- New Products Start (PHARMACOPÉE) -->
        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2 class="cosmetique-elite">PHARMACOPÉE</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => 'pharmacopee']) }}" class="see-more-btn">See
                                All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($produitsPharmacopee as $produit)
                                <div class="item">
                                    <div class="product-item">
                                        {{-- <a href="{{ route('product.show', $produit->id) }}" class="product-img"> --}}
                                        <img src="{{ asset('storage/' . $produit->image_url) }}"
                                            class="card-img-top product-image" alt="{{ $produit->name }}">

                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                        </a>
                                        <div class="product-text-dt">
                                            <p>Available<span>({{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }})</span>
                                            </p>
                                            <p>Boutique<span>(
                                                <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}">
                                                    {{ $produit->boutique->name ?? 'Non attribué' }}
                                                </a>
                                            )</span></p>
                                            
                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-primary open-modal" data-id="{{ $produit->id }}"
                                                data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                                data-description="{{ $produit->description }}"
                                                data-image="{{ asset('storage/' . $produit->image_url) }}">
                                                Voir détails
                                            </button>
                                            {{-- <div class="qty-cart">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn">
                                                    <input type="number" step="1" name="quantity" value="1"
                                                        class="input-text qty text">
                                                    <input type="button" value="+" class="plus plus-btn">
                                                </div>
                                                <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Products End -->


        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Détails du produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <img id="modalProductImage" src="" class="img-fluid">
                            </div>
                            <div class="col-lg-8">
                                <h2 id="modalProductName"></h2>
                                <p id="modalProductDescription"></p>
                                <p><strong>Prix :</strong> <span id="modalProductPrice"></span> F CFA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       


    </div>
    <!-- Body End -->
@endsection
