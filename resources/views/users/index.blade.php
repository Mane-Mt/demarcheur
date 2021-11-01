@extends('layouts.app')

@section('content')


    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

 <div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Users</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                                    </div>

            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Numero de Telephone</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type d'utilisateur</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>

                            <td>
                                <div class="media align-items-center">
                                    {{-- <a href="#" class="avatar rounded-circle mr-3">
                                      <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                                    </a> --}}
                                    <div class="media-body">
                                      <span class="name mb-0 text-sm">{{$user->phone}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:{{$user->email}}">{{$user->name}}</a>
                            </td>
                            <td>
                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                            </td>
                            <td>
                              {{$user->usertype}}
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('user.edit',$user->id)}}">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty

                        @endforelse

                     </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
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
