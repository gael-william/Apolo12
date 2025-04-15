@extends('layouts.app')
@section('content')

	<!-- Body Start -->
	
	<div class="wrapper">
		<div class="gambo-Breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						{{-- <nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Vegetables & Fruits</li>
							</ol>
						</nav> --}}
					</div>
				</div>
			</div>
		</div>
		<div class="all-product-grid">
			<div class="container">
				{{-- <div class="row">
					<div class="col-lg-12">
						<div class="product-top-dt">
							<div class="product-left-title">
								<a href="#" class="category_drop hover-btn" data-bs-toggle="modal"
								data-bs-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span
									class="cate__icon">Selectionner la Catégories</span></a>							</div>
							<a href="#" class="filter-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter">Filters</a>
							
							<div class="product-sort main-form">
								<select class="selectpicker" data-width="25%">
									<option value="0">Popularity</option>
									<option value="1">Price - Low to High</option>
									<option value="2">Price - High to Low</option>
									<option value="3">Alphabetical</option>
									<option value="4">Saving - High to Low</option>
									<option value="5">Saving - Low to High</option>
									<option value="6">% Off - High to Low</option>
								</select>
							</div>
						</div>
					</div>
				</div> --}}
				<div class="product-list-view">
					<div class="row">
						@foreach ($produits as $produit)
							<div class="col-lg-3 col-md-6">
								<div class="product-item mb-30">
									{{-- <a href="{{ route('products.show', $produit->id) }}" class="product-img"> --}}
										<img src="{{ asset('storage/' . $produit->image_url) }}"
										class="card-img-top product-image" alt="{{ $produit->name }}">										<div class="product-absolute-options">
											@if ($produit->discount > 0)
												<span class="offer-badge-1">{{ $produit->discount }}% off</span>
											@endif
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
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
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
	@endsection
