@extends('dashboard-layout')

@section('title', 'NextGen Admin - Tableau de bord')

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">

            <!-- Section: Company Submissions Overview -->
            <section class="admin-section bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center mb-5">
                                <h2>Domaines études</h2>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="admin-table table-responsive mb-5">
                        <div class="mb-3 d-flex justify-content-end">
                            <a href="{{route('admin.domaines_etudes.create')}}" class="btn btn-primary"><i class="la la-plus"></i> Ajouter nouveau</a>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
                            <div>
                                <form id="searchForm" method="GET" action="{{ url()->current() }}">
                                    <input type="search" id="name" class="form-control" name="name" placeholder="Rechercher par nom"
                                           value="{{ $search_data['name'] }}" onkeypress="handleKeyPress(event)">
                                    <!--<button type="submit" class="btn btn-secondary">Rechercher</button>-->
                                </form>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <label for="categorie">Categorie:</label>
                                <select id="categorie" class="form-control" onchange="handleCategorieChange()">
                                    <option value="tout" {{$search_data['categorie'] == 'tout' ? 'selected' : '' }}>Tout</option>
                                    @foreach($domaine_etude_categories as $cat)
                                        <option value="{{$cat->id}}" {{$search_data['categorie'] == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <label for="per_page">Afficher:</label>
                                <select id="per_page" class="form-control" onchange="handlePerPageChange()">
                                    <option value="5" {{$search_data['per_page'] == '5' ? 'selected' : '' }}>5</option>
                                    <option value="10" {{$search_data['per_page'] == '10' ? 'selected' : '' }}>10
                                    </option>
                                    <option value="20" {{$search_data['per_page'] == '20' ? 'selected' : '' }}>20
                                    </option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Categorie</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($domaines_etudes as $de)
                                <tr>
                                    <td>{{$de->name}}</td>
                                    <td>{{$de->description}}</td>
                                    <td>{{$de->domaine_etude_categorie->name}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('admin.domaines_etudes.update', ['domaine_etude' => $de->slug])}}" class="btn btn-warning">Modifier</a>
                                            <form method="POST" id="{{'delete_form_' . $de->id}}" action="{{route('admin.domaines_etudes.delete')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$de->id}}">
                                            </form>
                                            <button type="submit" class="btn btn-danger" onclick="deleteDomaineEtude('delete_form_{{$de->id}}')">
                                                Supprimer
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Aucun enregistrement trouvé!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $domaines_etudes->onEachSide(2)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <script>

        function handlePerPageChange() {
            let value = document.getElementById('per_page').value;
            let currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('per_page', value);
            currentUrl.searchParams.delete('page');
            window.location.href = currentUrl.toString();
        }

        function handleCategorieChange() {
            let value = document.getElementById('categorie').value;
            let currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('categorie', value);
            currentUrl.searchParams.delete('page');
            window.location.href = currentUrl.toString();
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Empêche l'action par défaut (soumission du formulaire)
                document.getElementById('searchForm').submit(); // Soumet le formulaire manuellement
            }
        }

        function deleteDomaineEtude(id) {
            Swal.fire({
                title: "Voulez vous vraiment supprimer cet élément?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff2443",
                cancelButtonColor: "#3d3d3d",
                confirmButtonText: "Oui, supprimer"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).submit();
                }
            });
        }

    </script>

    <!-- Bootstrap JS -->
    <style>
        .admin-wrapper {
            padding: 20px 0;
        }

        .admin-table {
            margin-top: 30px;
        }

        .admin-table .table thead th {
            background-color: #66022b;
            color: white;
            text-align: center;
        }

        .admin-table .table tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .admin-table .btn {
            margin: 0 5px;
        }

        .pricing-plan {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .plan-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .plan-footer {
            text-align: center;
            margin-top: 15px;
        }

        .admin-details h3 {
            margin-top: 20px;
        }

        .admin-details a.btn {
            margin-top: 15px;
        }
    </style>
@endsection
