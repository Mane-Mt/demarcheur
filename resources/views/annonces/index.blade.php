@extends('layouts.master')
@section('content')
<div class="container-fluid">
    @foreach ($annonces as $annonce)
    <div class="item second-item my-3 " @if ($loop->first) style="margin-top: 5%" @endif>
        <div class="row">
            <div class="col-1">
                <i></i>
            </div>
            <div class="col-8">
                {{$annonce->type}}, dans le quartier de {{ $annonce->quartier}}, {{ Str::substr($annonce->description, 0, 100).'...' }}
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-sm" style="border-radius:20px!important">
                    detail
                </button>
                <button class="btn btn-success btn-sm" style="border-radius:20px!important">
                   Saisir
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
