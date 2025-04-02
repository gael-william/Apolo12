@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="card-header bg-warning text-white">
            <h4>Modifier un utilisateur</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nom :</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" value="{{ $user->prenom }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CNIB :</label>
                            <input type="text" name="cnib" class="form-control" value="{{ $user->cnib }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email :</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Téléphone :</label>
                            <input type="text" name="telephone" class="form-control" value="{{ $user->telephone }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sexe :</label>
                            <select name="sexe" class="form-control" required>
                                <option value="Homme" {{ $user->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
                                <option value="Femme" {{ $user->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo de profil :</label>
                            <input type="file" name="photo_profil" class="form-control">
                            <small class="text-muted">Laisser vide si vous ne voulez pas changer la photo</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rôle :</label>
                            <select name="role" class="form-control" required>
                                <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label">Boutique :</label>
                            <select name="boutique_id" class="form-control">
                                <option value="">Aucune</option>
                                @foreach($boutiques as $boutique)
                                    <option value="{{ $boutique->id }}" {{ $user->boutique_id == $boutique->id ? 'selected' : '' }}>
                                        {{ $boutique->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label>Mot de passe (laisser vide pour ne pas modifier) :</label>
                            <input type="password" name="password" autocomplete="off">
                        </div> --}}
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
