@extends('layouts.app')

@section('content')


    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            @can('isAdmin')
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Sales value</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col">
                          <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Liste de mes Annonces</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{route('annonces.create')}}" class="btn btn-sm btn-primary">Nouveau</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Light table -->

                              <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col" class="sort" data-sort="name">Type d'annonce</th>
                                    <th scope="col" class="sort" data-sort="name">Type de Chambre</th>
                                    <th scope="col" class="sort" data-sort="budget">Description</th>
                                    <th scope="col" class="sort" data-sort="completion">Quartier</th>
                                    <th scope="col" class="sort" data-sort="status">Etat</th>
                                    @can('isAdmin')
                                    <th scope="col">Photos</th>
                                    @endcan
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody class="list">

                                    @foreach ($annonces as $annonce)
                                    {{-- {{dd($annonce)}} --}}
                                    <tr>
                                        <td scope="row">
                                          <div class="media align-items-center">

                                            @if ($annonce->annonceType == 'Offre')
                                            <i class="fa fa-check-circle  text-success" aria-hidden="true" style="font-size: 3rem" ></i>
                                            @else
                                            <i class="fa fa-question-circle  text-danger" aria-hidden="true" style="font-size: 3rem"  ></i>
                                            @endif
                                            <div class="media-body">
                                              <span class="name mb-0 text-sm">{{$annonce->annonceType}}</span>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="budget">
                                            {{$annonce->type}}
                                        </td>
                                        <td class="budget">
                                            {{ Str::substr($annonce->description, 0, 50).'...' }}
                                        </td>
                                        <td class="budget">
                                            {{$annonce->quartier}}
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i>
                                            <span class="status">pending</span>
                                          </span>
                                        </td>
                                        @can('isAdmin')
                                        <td>
                                            <div class="avatar-group">
                                              <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                              </a>
                                              <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                              </a>
                                              <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                              </a>
                                              <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                              </a>
                                            </div>
                                          </td>
                                        @endcan

                                        {{-- <td>
                                          <div class="d-flex align-items-center">
                                            <span class="completion mr-2">60%</span>
                                            <div>
                                              <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </td> --}}
                                        <td class="text-right">
                                          <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <a class="dropdown-item" href="#">Modifier</a>
                                              <a class="dropdown-item" href="#">Supprimer</a>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    @endforeach

                                  {{-- <tr>
                                    <th scope="row">
                                      <div class="media align-items-center">
                                        <a href="#" class="avatar rounded-circle mr-3">
                                          <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                                        </a>
                                        <div class="media-body">
                                          <span class="name mb-0 text-sm">React Material Dashboard</span>
                                        </div>
                                      </div>
                                    </th>
                                    <td class="budget">
                                      $4400 USD
                                    </td>
                                    <td>
                                      <span class="badge badge-dot mr-4">
                                        <i class="bg-info"></i>
                                        <span class="status">on schedule</span>
                                      </span>
                                    </td>
                                    <td>
                                      <div class="avatar-group">
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                        </a>
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                        </a>
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                        </a>
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                        </a>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="d-flex align-items-center">
                                        <span class="completion mr-2">90%</span>
                                        <div>
                                          <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="text-right">
                                      <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                          <a class="dropdown-item" href="#">Modifier</a>
                                          <a class="dropdown-item" href="#">Supprimer</a>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">
                                      <div class="media align-items-center">
                                        <a href="#" class="avatar rounded-circle mr-3">
                                          <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                                        </a>
                                        <div class="media-body">
                                          <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                        </div>
                                      </div>
                                    </th>
                                    <td class="budget">
                                      $2200 USD
                                    </td>
                                    <td>
                                      <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status">completed</span>
                                      </span>
                                    </td>
                                    <td>
                                      <div class="avatar-group">
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                        </a>
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                        </a>
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                        </a>
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                        </a>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="d-flex align-items-center">
                                        <span class="completion mr-2">100%</span>
                                        <div>
                                          <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="text-right">
                                      <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                          <a class="dropdown-item" href="#">Modifier</a>
                                          <a class="dropdown-item" href="#">Supprimer</a>
                                        </div>
                                      </div>
                                    </td>
                                  </tr> --}}
                                </tbody>
                              </table>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4">
                              <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                      <i class="fas fa-angle-left"></i>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                  </li>
                                  <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#">
                                      <i class="fas fa-angle-right"></i>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                            </div>
                          </div>
                        </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
