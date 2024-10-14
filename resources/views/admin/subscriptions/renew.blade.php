@extends('dashboard-layout')

@section('title', 'NextGen Admin - Renouveler abonnement')

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
                                <h2>Renouveler abonnements</h2>
                            </div>
                        </div>
                    </div>
                    @if($user->hasActiveSubscription())
                        <form action="{{ route('admin.subscriptions.renew', ['user' => $user->slug]) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="additional_days{{ $user->id }}" class="form-label">Ajouter des jours</label>
                                <input type="number" name="additional_days" id="additional_days{{ $user->id }}"
                                       class="form-control" min="1" value="30" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Renouveler</button>
                        </form>
                    @endif

                </div>
            </section>
        </div>
    </section>

@endsection
