@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Créer un utilisateur</h4>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm">&larr; Retour</a>
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
                            <input type="password" name="password" class="form-control" required minlength="8">
                            <small class="text-muted">Minimum 8 caractères</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmer le mot de passe :</label>
                            <input type="password" name="password_confirmation" class="form-control" required minlength="8">
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
                            <select name="boutique_id" class="form-control" id="boutique_select">
                                <option value="">Aucune</option>
                                @foreach($boutiques as $boutique)
                                    <option value="{{ $boutique->id }}">{{ $boutique->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted" id="boutique_hint">Les admins doivent être assignés à une boutique</small>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Créer l'utilisateur</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.querySelector('select[name="role"]');
        const boutiqueSelect = document.getElementById('boutique_select');
        const boutiquHint = document.getElementById('boutique_hint');

        function updateBoutiqueRequirement() {
            if (roleSelect.value === 'admin') {
                boutiqueSelect.required = true;
                boutiquHint.textContent = '* Obligatoire pour les admins';
                boutiqueSelect.classList.add('is-invalid');
            } else {
                boutiqueSelect.required = false;
                boutiquHint.textContent = 'Les super admins n\'ont pas besoin de boutique assignée';
                boutiqueSelect.classList.remove('is-invalid');
            }
        }

        roleSelect.addEventListener('change', updateBoutiqueRequirement);
        updateBoutiqueRequirement();
    });
</script>
@endsection
