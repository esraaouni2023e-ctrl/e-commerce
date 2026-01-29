<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="content-card animate-fade-in">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users"></i>
                Utilisateurs
            </h3>
            <a href="#" class="btn btn-outline btn-sm">
                <i class="fas fa-external-link-alt"></i>
                Voir tous
            </a>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Email Vérifié</th>
                            <th>Créé le</th>
                            <th>Modifié le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($users) && !$users->isEmpty())
                            @foreach($users as $user)
                                <tr>
                                    <td><strong>#{{ $user->id }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at ? $user->email_verified_at->format('d M Y H:i') : '-' }}</td>
                                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                    <td>{{ $user->updated_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">Aucun utilisateur trouvé.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
