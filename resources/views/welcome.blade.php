@extends('layouts.app')
@section('content')
    <!-- Body Start -->
    <div class="wrapper">
        <!-- Offers Start -->
        <div class="main-banner-slider">


            <!-- <div class="container-fluid">
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
                       <p>6% Off</p>
                       <div class="top-text-1">Buy More & Save More</div>
                       <span>Fresh Vegetables</span>
                      </div>
                      <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Shop Now</a>
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
                       <p>5% Off</p>
                       <div class="top-text-1">Buy More & Save More</div>
                       <span>Fresh Fruits</span>
                      </div>
                      <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Shop Now</a>
                     </div>
                    </div>
                   </div>
                   <div class="item">
                    <div class="offer-item">
                     <div class="offer-item-img">
                      <div class="gambo-overlay"></div>
                      <img src="images/banners/offer-3.jpg" alt="">
                     </div>
                     <div class="offer-text-dt">
                      <div class="offer-top-text-banner">
                       <p>3% Off</p>
                       <div class="top-text-1">Hot Deals on New Items</div>
                       <span>Daily Essentials Eggs & Dairy</span>
                      </div>
                      <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Shop Now</a>
                     </div>
                    </div>
                   </div>
                   <div class="item">
                    <div class="offer-item">
                     <div class="offer-item-img">
                      <div class="gambo-overlay"></div>
                      <img src="images/banners/offer-4.jpg" alt="">
                     </div>
                     <div class="offer-text-dt">
                      <div class="offer-top-text-banner">
                       <p>2% Off</p>
                       <div class="top-text-1">Buy More & Save More</div>
                       <span>Beverages</span>
                      </div>
                      <a href="shop_grid.html" class="Offer-shop-btn hover-btn">Shop Now</a>
                     </div>
                    </div>
                   </div>
                   <div class="item">
                    <div class="offer-item">
                     <div class="offer-item-img">
                      <div class="gambo-overlay"></div>
                      <img src="images/banners/offer-5.jpg" alt="">
                     </div>
                     <div class="offer-text-dt">
                      <div class="offer-top-text-banner">
                       <p>3% Off</p>
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
               </div> -->
        </div>
        <!-- Offers End -->
        <!-- Categories Start -->
       <div class="section145">
    <div class="container">
        <h2 class="section-title">Visitez et Achetez dans nos boutiques officielles</h2>
        <div class="owl-carousel cate-slider owl-theme">
            @foreach ($boutiques as $boutique)
                <div class="item">
                    <a href="{{ route('boutique.show', $boutique->id) }}" class="category-item">
                        <div class="cate-img">
                            <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}">
                        </div>
                       <h4 style="font-size: 9px; max-height: 50px; overflow: hidden; line-height: 1.7; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
  {{ $boutique->name }}
</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


        <!-- Categories End -->

        <!-- Categories End -->
        <!-- Featured Products Start (L'OFFRE DU SIECLE) -->
       <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>Pour Vous</span>
                                <h2 class="cosmetique-elite">Nos Produits Stars</h2>
                            </div>
                            <!-- <a href="{{ route('admin.boutiques.products', $menusLesPlusCommandes->first()->boutique_id ?? 1) }}"
                                        class="see-more-btn">
                                        Voir Plus
                                    </a> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($menusLesPlusCommandes as $product)
                                <div class="item">
                                    <div class="product-item">
                                        <img src="{{ asset('storage/' . $product->image_url) }}"
                                            class="card-img-top product-image" alt="{{ $product->name }}">

                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1"><i class="fas fa-crown"
                                                    style="color: gold; margin-right: 8px;"></i></span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>

                                        <div class="product-text-dt">
                                            
                                            <a href="{{ route('boutique.show', ['id' => $product->boutique->id]) }}"
                                               class="btn btn-sm d-flex align-items-center justify-content-center"
                                               style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                               <i class="fas fa-store me-1"></i> Visiter la boutique
                                            </a>
                                            <h4>{{ $product->name }}</h4>
                                            <div class="product-price">{{ number_format($product->price, 0, ',', ' ') }} F
                                            </div>
                                            <button class="btn btn-success open-modal" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                                data-description="{{ $product->description }}"
                                                data-image="{{ asset('storage/' . $product->image_url) }}">
                                                Voir détails
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <a href="https://wa.me/+22602101008" class="whatsapp-fixed" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt="WhatsApp">
        </a>


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
                            <img src="images/best-offers/img1.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="#" class="best-offer-item">
                            <img src="images/best-offers/img2.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="#" class="best-offer-item offr-none">
                            <img src="images/best-offers/img3.jpg" alt="">
                            <!-- <div class="cmtk_dt">
                                                <div class="product_countdown-timer offer-counter-text" data-countdown="2022/08/09"></div>
                                               </div> -->
                            <!-- <p>reserver pour presenter K.com</p> -->
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="code-offer-item">
                            <img src="images/best-offers/img4.jpg" alt="">
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
                                <span>Pour Vous</span>
                                <h2 class="cosmetique-elite">ALIMENTATION</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => 'alimentation']) }}" class="see-more-btn">voir
                                tout
                            </a>
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
                                            <!--<p>Stock<span>{{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>-->
                                            </p>
                                            <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}"
                                                    class="btn btn-sm d-flex align-items-center justify-content-center"
                                               style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                                    <i class="fas fa-store me-1"></i> Visiter la boutique
                                                </a>

                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-success open-modal" data-id="{{ $produit->id }}"
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
                                <span>Pour Vous</span>
                                <h2 class="cosmetique-elite">COSMÉTIQUE</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => 'cosmetique']) }}" class="see-more-btn">Voir tout
                            </a>
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
                                            <!--<p>Stock<span>{{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>-->
                                            </p>
                                           <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}"
                                                    class="btn btn-sm d-flex align-items-center justify-content-center"
                                               style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                                    <i class="fas fa-store me-1"></i> Visiter la boutique
                                                </a>

                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-success open-modal" data-id="{{ $produit->id }}"
                                                data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                                data-description="{{ $produit->description }}"
                                                data-image="{{ asset('storage/' . $produit->image_url) }}">
                                                Voir détails
                                            </button>
                                           
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
                                <span>Pour Vous</span>
                                <h2 class="cosmetique-elite">PHARMACOPÉE</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => 'pharmacopee']) }}" class="see-more-btn">Voir tout
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($produitsPharmacopee as $produit)
                                <div class="item">
                                    <div class="product-item">
                                        <img src="{{ asset('storage/' . $produit->image_url) }}"
                                            class="card-img-top product-image" alt="{{ $produit->name }}">

                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                        </a>
                                        <div class="product-text-dt">
                                            <!--<p>Stock<span>{{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>-->
                                            </p>
                                            <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}"
                                                    class="btn btn-sm d-flex align-items-center justify-content-center"
                                               style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                                    <i class="fas fa-store me-1"></i> Visiter la boutique
                                                </a>

                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-success open-modal" data-id="{{ $produit->id }}"
                                                data-name="{{ $produit->name }}" data-price="{{ $produit->price }}"
                                                data-description="{{ $produit->description }}"
                                                data-image="{{ asset('storage/' . $produit->image_url) }}">
                                                Voir détails
                                            </button>
                                         
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

        @foreach ($categoriesDynamiques as $categorie)
    @php
        $produits = \App\Models\Product::where('category', $categorie->name)->latest()->take(8)->get();
    @endphp
    @if ($produits->count())
        <div class="section145 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>Pour Vous</span>
                                <h2 class="cosmetique-elite">{{ strtoupper($categorie->name) }}</h2>
                            </div>
                            <a href="{{ route('seeall', ['category' => Str::slug($categorie->name)]) }}" class="see-more-btn">Voir tout</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach ($produits as $produit)
                                <div class="item">
                                    <div class="product-item">
                                        <img src="{{ asset('storage/' . $produit->image_url) }}" class="card-img-top product-image" alt="{{ $produit->name }}">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                        <div class="product-text-dt">
                                            <!--<p>Stock<span>{{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span></p>-->
                                            <a href="{{ route('boutique.show', ['id' => $produit->boutique->id]) }}"
                                                    class="btn btn-sm d-flex align-items-center justify-content-center"
                                               style="background-color: #f57c00; color: white; border-radius: 10px; font-size: 0.78rem; padding: 2px 8px;">
                                                    <i class="fas fa-store me-1"></i> Visiter la boutique
                                                </a>
                                            <h4>{{ $produit->name }}</h4>
                                            <div class="product-price">{{ $produit->price }} F CFA</div>
                                            <button class="btn btn-success open-modal"
                                                data-id="{{ $produit->id }}"
                                                data-name="{{ $produit->name }}"
                                                data-price="{{ $produit->price }}"
                                                data-description="{{ $produit->description }}"
                                                data-image="{{ asset('storage/' . $produit->image_url) }}">
                                                Voir détails
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach



        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
            aria-hidden="true">
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
                                <p id="modalProductDescription" style="overflow-y: auto; max-height: 300px;"></p>
                                <p><strong>Prix :</strong> <span id="modalProductPrice"></span> F CFA</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- Body End -->
@endsection

<style>
    .product-item:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px) scale(1.01);
        z-index: 2;
    }

    .btn-outline-primary.btn-sm:hover {
        background: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .boutique-card:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px) scale(1.01);
        z-index: 2;
    }
    
    #modalProductImage {
    max-width: 150px; /* ou la taille que tu souhaites */
    height: auto;
    display: block;
    margin: 0 auto;
}
</style>
