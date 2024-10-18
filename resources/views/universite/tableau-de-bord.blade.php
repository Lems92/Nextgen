@extends('dashboard-layout')

@section('title', 'NextGen - Service carrière - Tableau de bord')

@section('content')

    @include('header.dashboard-header')

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Howdy, {{$univ_name}}!</h3>
                <div class="text">Ready to jump back in?</div>
            </div>
            <div class="row">
                <div class="ui-block col-md-6 col-sm-12">
                    <a href="offre.html" class="ui-item-link">
                        <div class="ui-item">
                            <div class="left">
                                <i class="icon flaticon-briefcase"></i>
                            </div>
                            <div class="right">
                                <h4>{{$count_event}}</h4>
                                <p>Evenements</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ui-block col-md-6 col-sm-12">
                    <a href="offre.html" class="ui-item-link">
                        <div class="ui-item ui-red">
                            <div class="left">
                                <i class="icon la la-file-invoice"></i>
                            </div>
                            <div class="right">
                                <h4>{{$count_etudiant}}</h4>
                                <p>Etudiants</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- OFFRE GOLD
                <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <a href="offre.html" class="ui-item-link">
                        <div class="ui-item ui-green">
                            <div class="left">
                                <i class="icon la la-bookmark-o"></i>
                            </div>
                            <div class="right">
                                <h4>32</h4>
                                <p>Shortlist</p>
                            </div>
                        </div>
                    </a>
                </div>
                -->
            </div>
        </div>
    </section>
    <!-- End Dashboard -->

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Gerer les évenements</h3>
                <div class="text">Prêt pour organiser des évenements ?</div>
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
