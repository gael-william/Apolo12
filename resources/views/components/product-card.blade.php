@props([
    'produit',
    'boutique',
])

@php
    $categorySlug = \Illuminate\Support\Str::slug((string) $produit->category);
    $stockClass = $produit->stock > 0 ? 'bg-success-subtle text-success-emphasis border border-success-subtle' : 'bg-danger-subtle text-danger-emphasis border border-danger-subtle';
@endphp

<article class="col-12 col-sm-6 col-lg-4 col-xl-3 product-item-container product-card mb-4"
    data-category="{{ $categorySlug }}"
    data-name="{{ strtolower($produit->name) }}"
    data-boutique="{{ $boutique->id }}">
    <div class="card h-100 border-0 product-card-ui shadow-sm">
        <div class="position-relative overflow-hidden rounded-top-4">
            <img src="{{ asset('storage/' . $produit->image_url) }}"
                class="card-img-top product-image"
                alt="{{ $produit->name }}"
                loading="lazy">
            @if ($produit->discount > 0)
                <span class="badge rounded-pill text-bg-danger position-absolute top-0 start-0 m-3 px-3 py-2">
                    -{{ $produit->discount }}%
                </span>
            @endif
            <button type="button"
                class="btn btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 wishlist-btn"
                aria-label="Ajouter aux favoris"
                title="Liste de souhaits (bientot)">
                <i class="far fa-heart"></i>
            </button>
        </div>

        <div class="card-body d-flex flex-column gap-2">
            <div class="d-flex justify-content-between align-items-center">
                <span class="badge {{ $stockClass }}">
                    {{ $produit->stock > 0 ? 'En stock' : 'Rupture' }}
                </span>
                <small class="text-muted">{{ $boutique->name }}</small>
            </div>

            <h3 class="h6 fw-bold mb-0 text-truncate" title="{{ $produit->name }}">{{ $produit->name }}</h3>

            <p class="mb-1 fw-bold text-success fs-5">{{ number_format($produit->price, 0, ',', ' ') }} FCFA</p>

            <div class="mt-auto">
                <button class="btn btn-outline-success w-100 mb-2 open-modal"
                    data-id="{{ $produit->id }}"
                    data-name="{{ $produit->name }}"
                    data-price="{{ $produit->price }}"
                    data-description="{{ $produit->description }}"
                    data-image="{{ asset('storage/' . $produit->image_url) }}"
                    data-boutique="{{ $boutique->id }}">
                    <i class="fas fa-eye me-1"></i> Details
                </button>

                <div class="qty-cart d-flex align-items-center justify-content-between gap-2">
                    <div class="quantity buttons_added d-flex align-items-center rounded-pill border px-1 py-1">
                        <input type="button" value="-" class="minus minus-btn btn btn-sm btn-light border-0 rounded-circle">
                        <input type="number" step="1" name="quantity" value="0"
                            class="input-text qty text border-0 bg-transparent text-center"
                            style="width: 48px;"
                            readonly>
                        <input type="button" value="+" class="plus plus-btn btn btn-sm btn-success border-0 rounded-circle">
                    </div>
                    <span class="text-success fs-5" aria-hidden="true">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</article>
