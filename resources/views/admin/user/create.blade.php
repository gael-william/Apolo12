@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nom :</label>
    <input type="text" name="name" required>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>

    <label>CNIB :</label>
    <input type="text" name="cnib" required>

    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Téléphone :</label>
    <input type="text" name="telephone" required>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <label>Confirmer le mot de passe :</label>
    <input type="password" name="password_confirmation" required>

    <label>Sexe :</label>
    <select name="sexe" required>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>

    <label>Photo de profil :</label>
    <input type="file" name="photo_profil">

    <label>Rôle :</label>
    <select name="role" required>
        <option value="super_admin">Super Admin</option>
        <option value="admin">Admin</option>
    </select>

    <label>Boutique :</label>
    <select name="boutique_id">
        <option value="">Aucune</option>
        @foreach($boutiques as $boutique)
            <option value="{{ $boutique->id }}">{{ $boutique->nom }}</option>
        @endforeach
    </select>

    <button type="submit">Créer l'utilisateur</button>
</form>
@endsection
