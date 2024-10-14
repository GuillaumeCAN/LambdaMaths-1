@extends('main')
@section('content')

    <section>
        <div class="container text-center">
            <h4>Bienvenue sur votre panneau d'administration</h4>
            <p>{{ auth()->user()->name }}, {{ auth()->user()->role->entitled }}</p>
            <a href="{{ route('register') }}" class="btn btn-main btn-round-full">
                Créer un utilisateur
            </a>
        </div>
    </section>

@stop

@section('title')
    A propos
@stop
