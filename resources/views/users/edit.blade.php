
@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="profile-page sidebar-collapse">
                <div class="page-header page-header-xs" data-parallax="true" >
                    <div class="filter"><h1 class="text-white">Annonces</h1></div>
                </div>
                {{-- {{dd(auth()->user()->usertype)}} --}}
                <div class="container col-md-9 col-offset-5 ">
                    {{-- <form action="{{route('annonces.update',$annonce->id)}}" method="POST" enctype="multipart/form-data" > --}}
                     <form action="{{ route('user.update',$users->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Numero de Telephone</label>
                                <input type="text" class="form-control" name="username" value="{{$users->phone}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="username" value="{{$users->name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Give role</label>
                                 <select class="form-control" name="usertype">
                                      <option value="Admin">Admin</option>
                                      <option value="Simple">Simple</option>
                                      <option value="Demarcheur">Demarcheur</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">update</button>
                            <a href="{{route('home')}}" class="btn btn-danger">cancel</a>

                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
@push('js')

@endpush
