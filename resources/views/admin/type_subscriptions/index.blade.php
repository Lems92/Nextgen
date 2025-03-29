@extends('dashboard-layout')

@section('title', 'NextGen Admin - Type d\'abonnements')

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
                                <h2>Gestion des types d'abonnements</h2>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="admin-table table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Description</th>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($type_subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->id }}</td>
                                    <td>{{ $subscription->name }}</td>
                                    <td>{{ number_format($subscription->price, 2) }} MGA</td>
                                    <td>{{ $subscription->description }}</td>
                                    <td>
                                        <ul>
                                        @foreach($subscription->permissions as $permission)
                                                <li><span class="badge bg-secondary">{{ reformat_permission_name($permission->name) }}</span></li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <!-- Actions possibles : Modifier, Supprimer -->
                                        <a href="{{route('admin.type_subscriptions.update_get', $subscription->id)}}" class="btn btn-sm btn-warning">Modifier</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Aucun enregistrement trouvé !</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>

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
