@extends('dashboard-layout')

@section('title', 'NextGen - Service carrière - Gérer événement')

@section('content')

    @include('header.dashboard-header')

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="upper-title-box">
                <h3>Gerer les évenements</h3>
                <div class="text">Prêt pour organiser des événements ?</div>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('universite.publier_event.create')}}" class="btn btn-primary"><i class="la la-plus"></i> Publier événement</a>
            </div>

            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Mes Evenements</h4>

                        <div class="chosen-outer">
                            <!--Tabs Box-->
                            <select class="chosen-select">
                                <option>Last 6 Months</option>
                                <option>Last 12 Months</option>
                                <option>Last 16 Months</option>
                                <option>Last 24 Months</option>
                                <option>Last 5 years</option>
                            </select>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-event-table">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($events as $event)
                                <tr>
                                    <td><h6>{{$event->event_title}}</h6></td>
                                    <td>{{$event->start_date->format('j F Y') . " - " . $event->end_date->format('j F Y')}}</td>
                                    <td>{{$event->start_time->format('H:i') . " - " . $event->end_time->format('H:i')}}</td>
                                    <td>{{$event->event_description}}</td>
                                    <td>
                                        <div class="option-box">
                                            <ul class="option-list">
                                                <!--<li>
                                                    <button data-text="View Event"><span class="la la-eye"></span>
                                                    </button>
                                                </li>-->
                                                <li>
                                                    <a href="{{route('universite.edit_event', ['event' => $event->id])}}" data-text="Modifier événement"><span class="la la-pencil"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="post" id="delete_event_form{{$event->id}}" action="{{route('universite.delete_event')}}">
                                                        @csrf
                                                        <input type="hidden" name="event_id" value="{{$event->id}}">
                                                    </form>
                                                    <button onclick="deleteEvent('delete_event_form{{$event->id}}')" data-text="Supprimer l'événement"><span class="la la-trash"></span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aucun enregistrement trouvé !</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function deleteEvent(form_id) {
            Swal.fire({
                title: "Voulez vous vraiment supprimer cet élément?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff2443",
                cancelButtonColor: "#3d3d3d",
                confirmButtonText: "Oui, supprimer"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(form_id).submit();
                }
            });
        }
    </script>

@endsection
