@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="card-header bg-warning text-white d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Modifier un utilisateur</h4>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm">&larr; Retour</a>
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

                        <div class="mb-3">
                            <label class="form-label">Boutique :</label>
                            <select name="boutique_id" class="form-control" id="boutique_select">
                                <option value="">Aucune</option>
                                @foreach($boutiques as $boutique)
                                    <option value="{{ $boutique->id }}" {{ $user->boutique_id == $boutique->id ? 'selected' : '' }}>
                                        {{ $boutique->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted" id="boutique_hint">Les admins doivent être assignés à une boutique</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe (laisser vide pour ne pas modifier) :</label>
                            <input type="password" name="password" class="form-control" minlength="8">
                            <small class="text-muted">Minimum 8 caractères si modifié</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmer le mot de passe :</label>
                            <input type="password" name="password_confirmation" class="form-control" minlength="8">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Modifier</button>
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
                if (!boutiqueSelect.value) {
                    boutiqueSelect.classList.add('is-invalid');
                }
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
