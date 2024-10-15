@extends('dashboard-layout')

@section('title', 'Candidatures')

@section('content')

@include('header.dashboard-header')

<section class="user-dashboard">
    <div class="dashboard-outer">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
      <div class="upper-title-box">
        <h3>Offres postulés</h3>
      </div>

        <div class="col-lg-12">
          <!-- Ls widget -->
          <div class="ls-widget">
            <div class="tabs-box">
              <div class="widget-title">
                <h4>offres postulés</h4>

                <div class="chosen-outer">
                  <!--Tabs Box-->
                  <select class="chosen-select">
                    <option>Last 6 Months</option>
                    <option>Last 12 Months</option>
                    <option>Last 16 Months</option>
                    <option>Last 24 Months</option>
                    <option>Last 5 year</option>
                  </select>
                </div>
              </div>

              <div class="widget-content">
                <div class="table-outer">
                  <table class="default-table manage-job-table">
                    <thead>
                      <tr>
                        <th>Titre de l'offre</th>
                        <th>Date d'application</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                    @forelse($candidatures as $candidature)
                      <tr>
                        <td>
                          <!-- Job Block -->
                          <div class="job-block">
                            <div class="inner-box">
                              <div class="content">
                                <span class="company-logo"><img src="images/resource/company-logo/1-1.png" alt=""></span>
                                <h4><a href="#">{{$candidature->titre_poste}}</a></h4>
                                <ul class="job-info">
                                  <li><span class="icon flaticon-briefcase"></span> {{$candidature->type_contrat}}</li>
                                  <li><span class="icon flaticon-map-locator"></span> {{$candidature->lieu_poste}}</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>{{$candidature->pivot->created_at->format('j F Y à H:i')}}</td>
                        <td class="status">Active</td>
                        <td>
                          <div class="option-box">
                            <ul class="option-list">
                              <li><a href="{{route('etudiants.offers.show', ['offre' => $candidature->slug])}}" data-text="Voir l'offre"><span class="la la-eye"></span></a></li>
                              <li>
                                  <form method="post" id="delete_apply_{{$candidature->pivot->id}}" action="{{route('etudiant.postulation.annuler')}}">
                                      @csrf
                                      <input type="hidden" name="id" value="{{$candidature->pivot->id}}">
                                  </form>
                                  <button data-text="Supprimer l'application" onclick="annuler_postulation('delete_apply_{{$candidature->pivot->id}}')"><span class="la la-trash"></span></button>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">Vous n'avez pas encore postulé à aucun offre !</td>
                        </tr>
                    @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


    </div>
  </section>

<style>
.row, .col-lg-12, .ls-widget, .widget-content, .table-outer {
  margin-right: 0;
  padding-right: 0;
}

.default-table {
  margin-right: 0;
}
</style>

    <script>
        function annuler_postulation(form_id) {
            Swal.fire({
                title: "Voulez vous vraiment annuler votre candidature?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#ffcd29",
                cancelButtonColor: "rgba(52,52,52,0.36)",
                confirmButtonText: "Oui, accepter"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(form_id).submit();
                }
            });
        }
    </script>
@endsection
