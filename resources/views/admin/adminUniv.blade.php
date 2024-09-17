@extends('app')

@section('title', 'NextGen - Accueil')

@section('content')
<!-- Header -->
@include('header.admin')

<div class="admin-wrapper container">
    <div class="container mt-4">
        <h2>Liste des étudiants inscrits</h2>
    
        <!-- Message de succès -->
            <div class="alert alert-success">
            </div>
    
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Université</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>Adnria</td>
                        <td>a@gm.com</td>
                        <td>ASJA</td> <!-- Affiche l'université s'il y en a une -->
                        <td>
                            <!-- Bouton pour éditer l'inscription de l'étudiant -->
                            <a href="#" class="btn btn-primary btn-sm">Modifier</a>
    
                            <!-- Formulaire pour supprimer l'étudiant (optionnel) -->
                            <form action="#" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>
    
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
        </div>
    </div>
    @endsection