@extends('dashboard-layout')

@section('title', 'NextGen - Gérer étudiants')

@section('content')

    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Tous les étudiants</h3>
            </div>
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Liste des étudiants</h4>

                        <div class="chosen-outer">
                            <!--Tabs Box-->
                            <select class="chosen-select">
                                <option>Tout</option>
                                <option>Approuvés</option>
                                <option>Rejetés</option>
                            </select>
                        </div>
                    </div>

                    <div class="widget-content">

                        <div class="tabs-box">

                            <div class="tabs-content">
                                <!--Tab-->
                                <div class="tab active-tab" id="totals">
                                    <!-- Candidate block three -->
                                    <div class="candidate-block-three">
                                        <div class="inner-box">
                                            <div class="content">
                                                <figure class="image"><img
                                                        src="images/resource/candidate-1.png" alt="">
                                                </figure>
                                                <h4 class="name"><a href="#">Darlene Robertson</a></h4>
                                                <ul class="candidate-info">
                                                    <li class="designation">UI Designer</li>
                                                    <li><span class="icon flaticon-map-locator"></span>
                                                        London, UK
                                                    </li>
                                                    <li><span class="icon flaticon-money"></span> $99 /
                                                        hour
                                                    </li>
                                                </ul>
                                                <ul class="post-tags">
                                                    <li><a href="#">App</a></li>
                                                    <li><a href="#">Design</a></li>
                                                    <li><a href="#">Digital</a></li>
                                                </ul>
                                            </div>
                                            <div class="option-box">
                                                <ul class="option-list">
                                                    <li>
                                                        <button data-text="View Aplication"><span
                                                                class="la la-eye"></span></button>
                                                    </li>
                                                    <li>
                                                        <button data-text="Approve Aplication"><span
                                                                class="la la-check"></span></button>
                                                    </li>
                                                    <li>
                                                        <button data-text="Reject Aplication"><span
                                                                class="la la-times-circle"></span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button data-text="Delete Aplication"><span
                                                                class="la la-trash"></span></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

