@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="card-header bg-primary text-white">
            <h4>Créer un utilisateur</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nom :</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CNIB :</label>
                            <input type="text" name="cnib" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email :</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Téléphone :</label>
                            <input type="text" name="telephone" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Mot de passe :</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmer le mot de passe :</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sexe :</label>
                            <select name="sexe" class="form-control" required>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo de profil :</label>
                            <input type="file" name="photo_profil" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rôle :</label>
                            <select name="role" class="form-control" required>
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Boutique :</label>
                            <select name="boutique_id" class="form-control">
                                <option value="">Aucune</option>
                                @foreach($boutiques as $boutique)
                                    <option value="{{ $boutique->id }}">{{ $boutique->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Créer l'utilisateur</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
