@extends('dashboard-layout')

@section('title', 'NextGen Admin - Modifier type d\' abonnements')

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
                                <h2>Modifier type d'abonnement</h2>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.type_subscriptions.update', $subscription->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name{{ $subscription->id }}" class="form-label">Nom</label>
                            <input type="text" name="name" id="name{{ $subscription->id }}" class="form-control" value="{{ $subscription->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price{{ $subscription->id }}" class="form-label">Prix</label>
                            <input type="number" step="0.01" name="price" id="price{{ $subscription->id }}" class="form-control" value="{{ $subscription->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description{{ $subscription->id }}" class="form-label">Description</label>
                            <textarea name="description" id="description{{ $subscription->id }}" class="form-control">{{ $subscription->description }}</textarea>
                        </div>
                        <button type="submit" class="heme-btn btn-style-one">Enregistrer les Modifications</button>
                    </form>

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
