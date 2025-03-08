@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Produits de la boutique</h3>
                            <div>
                                <a href="{{ route('admin.boutiques.products.create', $boutique->id) }}" class="btn btn-primary btn-sm">
                                    Ajouter un produit <i class="fa fa-plus"></i>
                                </a>
                                <a href="{{ route('admin.boutiques.show', $boutique->id) }}" class="btn btn-danger btn-sm">Fermer</a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if ($products->count() > 0)
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="card product-card shadow-sm">
                                                <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                    <p class="text-muted">{{ $product->category }}</p>
                                                    <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                                                    <h5 class="text-primary font-weight-bold">{{ number_format($product->price, 0, ',', ' ') }} F</h5>
                                                    <div class="d-flex justify-content-center">
                                                        <td>
                                                            <a href="{{ route('admin.boutiques.products.edit', [$boutique->id, $product->id]) }}" class="btn btn-sm btn-primary d-inline">Modifier</a>
                                                            <form action="{{ route('admin.boutiques.products.destroy', [$boutique->id, $product->id]) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                                            </form>
                                                        </td>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-center">Aucun produit ajouté.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
