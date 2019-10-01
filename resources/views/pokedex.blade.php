@extends('app')
<!-- Specify content -->
@section('content')
<div class="col-sm-12">
    <h3>List of Pokemons</h3>
    <hr>
</div>
@foreach ($pokemons["results"] as $pokemon)
<div class="col-md-3">
    <div class="card">
        <div class="card-block">
            <a href="/getpokemon/{{$pokemon["name"]}}">{{$pokemon["name"]}}</a>
        </div>
    </div>
</div>
@endforeach
<div class="col-sm-12">
    <a class="btn btn-default float-left" href="{{$previous}}">Previous</a>
    <a class="btn btn-primary float-right" href="{{$next}}">Next</a>
</div>
@stop