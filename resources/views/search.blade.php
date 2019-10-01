@extends('app')
<!-- Specify content -->
@section('content')

<div class="col-md-12">
    <img src="{{ $pokemons["sprites"]["front_default"] }}" class="img-thumbnail" alt="pokemon image">
    <h2>{{$name}}</h2>
    <hr>
</div>

<div class="col-md-3">
    <div class="card text-center">
        <h4>Species</h4>
        <hr>
        <div class="card-block">
            <ul class="items">

                <li><a>{{ $pokemons["species"]["name"] }}</a></li>

            </ul>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card text-center">
        <h4>Weight</h4>
        <hr>
        <div class="card-block">
            <h2>{{$pokemons["weight"]}}</h2>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card text-center">
        <h4>Height</h4>
        <hr>
        <div class="card-block">
            <h2>{{$pokemons["height"]}}</h2>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card text-center">
        <h4>Abilities</h4>
        <hr>
        <div class="card-block">
            <ul class="items">
                @foreach ($pokemons["abilities"] as $ability)
                <li><a>{{ $ability["ability"]["name"] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@stop