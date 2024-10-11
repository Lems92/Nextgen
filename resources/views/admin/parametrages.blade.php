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
                                <h2>Parametrages divers</h2>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="admin-table table-responsive">
                        <div class="mb-3 d-flex justify-content-end">
                            <a href="{{route('admin.parametrages.create')}}" class="btn btn-primary"><i class="la la-plus"></i> Ajouter nouveau</a>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
                            <div>
                                <form id="searchForm" method="GET" action="{{ url()->current() }}">
                                    <input type="search" id="libelle" class="form-control" name="libelle" placeholder="Rechercher par libellé"
                                           value="{{ $search_data['libelle'] }}" onkeypress="handleKeyPress(event)">
                                    <!--<button type="submit" class="btn btn-secondary">Rechercher</button>-->
                                </form>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <label for="table">Table:</label>
                                <select id="table" class="form-control" onchange="handleTableChange()">
                                    <option value="tout" {{$search_data['table'] == 'tout' ? 'selected' : '' }}>Tout</option>
                                    @foreach($tables as $table)
                                        <option value="{{$table->name}}" {{$search_data['table'] == $table->name ? 'selected' : '' }}>{{$table->name}}</option>
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
                                <th>Nom table</th>
                                <th>Sigle</th>
                                <th>Libellé</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($parametrages as $parametrage)
                                <tr>
                                    <td>{{$parametrage->table}}</td>
                                    <td>{{$parametrage->sigle}}</td>
                                    <td>{{$parametrage->libelle}}</td>
                                    <td>{{$parametrage->description}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('admin.parametrages.update', ['id' => $parametrage->id])}}" class="btn btn-warning">Modifier</a>
                                            <form method="POST" id="{{'delete_form_' . $parametrage->id}}" action="{{route('admin.parametrages.delete')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$parametrage->id}}">
                                            </form>
                                            <button type="submit" class="btn btn-danger" onclick="deleteParametrage('delete_form_{{$parametrage->id}}')">
                                                Supprimer
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucun enregistrement trouvé!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $parametrages->onEachSide(5)->links() }}
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
            window.location.href = currentUrl.toString();
        }

        function handleTableChange() {
            let value = document.getElementById('table').value;
            let currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('table', value);
            currentUrl.searchParams.delete('page');
            window.location.href = currentUrl.toString();
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Empêche l'action par défaut (soumission du formulaire)
                document.getElementById('searchForm').submit(); // Soumet le formulaire manuellement
            }
        }

        function deleteParametrage(id) {
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
