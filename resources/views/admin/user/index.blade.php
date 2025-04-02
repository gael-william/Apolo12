@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Liste des utilisateurs</h4>
                    <div>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Ajouter
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Fermer
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>CNIB</th>
                                <th>Téléphone</th>
                                {{-- <th>Sexe</th> --}}
                                <th>Photo Profil</th>
                                <th>Boutique</th>
                                <th>Rôle</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->prenom }}</td>
                                    <td>{{ $user->cnib }}</td>
                                    <td>{{ $user->telephone }}</td>
                                    {{-- <td>{{ $user->sexe }}</td> --}}
                                    <td class="text-center">
                                        @if ($user->photo_profil)
                                            <img src="{{ asset('storage/' . $user->photo_profil) }}" alt="Photo Profil" class="img-thumbnail" width="50">
                                        @else
                                            <span class="text-muted">Aucune</span>
                                        @endif
                                    </td>
                                    <td>{{ optional($user->boutique)->name ?? 'Aucune' }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{-- <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm" title="Voir les détails">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <div class="card-footer text-center">
                    {{ $users->links() }} <!-- Ajout de la pagination -->
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
