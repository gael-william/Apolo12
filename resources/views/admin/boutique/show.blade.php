@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Détails de la Boutique</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.boutiques.index') }}">Liste des
                                    Boutiques</a></li>
                            <li class="breadcrumb-item active">Boutique: {{ $boutique->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h1 class="card-title">Détails de la boutique : <strong>{{ $boutique->name }}</strong></h1>
                                <div class="float-right">
                                    <a href="{{ route('admin.boutiques.edit', $boutique->id) }}" class="btn btn-warning">
                                        Modifier <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.boutiques.index') }}" class="btn btn-danger">
                                        Fermer <i class="fa fa-window-close"></i>
                                    </a>
                                    <a href="{{ route('admin.commandes.show', ['boutique_id' => $boutique->id]) }}"
                                        class="btn btn-info">Voir commandes</a>


                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('storage/' . $boutique->image) }}" alt="{{ $boutique->name }}"
                                            class="img-fluid rounded shadow-lg">
                                    </div>

                                    <!-- Infos -->
                                    <div class="col-md-8">
                                        <p><strong>Description:</strong> {{ $boutique->description }}</p>
                                        <p><strong>Propriétaire:</strong> {{ $boutique->owner_name }}</p>
                                        <p><strong>Téléphone:</strong> {{ $boutique->phone }}</p>
                                        <p><strong>Type d'entreprise:</strong> {{ ucfirst($boutique->business_type) }}</p>
                                        <p><strong>Ville:</strong> {{ $boutique->city }}</p>
                                    </div>

                                    <!-- Localisation Google Maps -->
                                    <div class="col-md-12 mt-4">
                                        <h3 class="text-center"><strong> Localisation Google Maps</strong></h3>
                                        <iframe class="rounded w-100" src="{{ $boutique->location }}" frameborder="0"
                                            style="min-height: 350px; border:0;" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-muted text-center">
                                <small>Ajouté le {{ $boutique->created_at->format('d/m/Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row mt-4">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Cosmétique</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-magic"></i>
                    </div>
                    <a href="{{ route('admin.boutiques.products', ['boutique' => $boutique->id, 'category' => 'cosmetique']) }}"
                        class="small-box-footer">
                        Voir plus <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Alimentation</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-apple-alt"></i>
                    </div>
                    <a href="{{ route('admin.boutiques.products', ['boutique' => $boutique->id, 'category' => 'alimentation']) }}"
                        class="small-box-footer">
                        Voir plus <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Pharmacopée</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-prescription-bottle-alt"></i>
                    </div>
                    <a href="{{ route('admin.boutiques.products', ['boutique' => $boutique->id, 'category' => 'pharmacopee']) }}"
                        class="small-box-footer">
                        Voir plus <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($categories as $cat)
                @php
                    $icon = 'fa-box'; // icône par défaut
                    $bgColor = 'bg-info'; // couleur par défaut
                    $catName = strtolower($cat->name);

                    switch ($catName) {
                        case 'cosmétique':
                            $icon = 'fa-magic';
                            $bgColor = 'bg-info';
                            break;
                        case 'alimentation':
                            $icon = 'fa-apple-alt';
                            $bgColor = 'bg-info';
                            break;
                        case 'pharmacopée':
                            $icon = 'fa-prescription-bottle-alt';
                            $bgColor = 'bg-info';
                            break;
                    }
                @endphp

                <div class="col-lg-3 col-6">
                    <div class="small-box {{ $bgColor }}">
                        <div class="inner">
                            <p>{{ $cat->name }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa {{ $icon }}"></i>
                        </div>
                        <a href="{{ route('admin.boutiques.products', ['boutique' => $boutique->id, 'category' => strtolower($cat->name)]) }}"
                            class="small-box-footer">
                            Voir plus <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="col-12">
            <a href="{{ route('admin.categories.create', $boutique->id) }}" class="btn btn-primary">Ajouter catégories</a>
        </div> --}}
    </div>
@endsection
