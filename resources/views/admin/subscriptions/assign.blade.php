@extends('dashboard-layout')

@section('title', 'NextGen Admin - Assigner/changer abonnement')

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
                                <h2>Assigner ou changer abonnements</h2>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.subscriptions.assign', ['user' => $user->slug]) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="subscription_id{{ $user->id }}" class="form-label">Type d'Abonnement</label>
                            <select name="subscription_id" id="subscription_id{{ $user->id }}" class="form-select"
                                    required>
                                <option value="" disabled {{ !$user->subscription ? 'selected' : '' }}>Sélectionnez un
                                    abonnement
                                </option>
                                @foreach($subscriptions as $subscription)
                                    <option
                                        value="{{ $subscription->id }}" {{ ($user->subscription_id == $subscription->id) ? 'selected' : '' }}>
                                        {{ $subscription->name }} - {{ number_format($subscription->price, 2) }} MGA
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="duration{{ $user->id }}" class="form-label">Durée (jours)</label>
                            <input type="number" name="duration" id="duration{{ $user->id }}" class="form-control"
                                   min="1" value="30" required>
                        </div>
                        <button type="submit" class="heme-btn btn-style-one">Assigner</button>
                    </form>

                </div>
            </section>
        </div>
    </section>

@endsection
