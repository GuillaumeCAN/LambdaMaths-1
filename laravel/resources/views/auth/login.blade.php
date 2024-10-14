@extends('main')
@section('content')

  <form class="max-w-sm mx-auto my-8" method="POST" action="/login">
    @csrf
    @method('POST')
    <h2 class="text-3xl mb-6">Mon espace membre</h2>

    @if (session('statut'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ session('statut') }}
      </div>
    @endif

    @if (session('error'))
      <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        {{ session('error') }}
      </div>
    @endif

    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
      <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" required>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
      <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <small><a href="{{ route("password.request") }}">Mot de passe oublié ?</a></small>
    <div class="flex items-start mb-5">
      <div class="flex items-center h-5">
        <input id="remember" type="checkbox" name="remember" class="w-4 h-4 text-primary border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-secondary">
      </div>
      <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Se souvenir de moi</label>
    </div>
    <button type="submit" class="text-white bg-secondary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
      Connexion
    </button>

    <a href=" {{route("new.user")}} "><button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Créer un compte</button></a>
    @if ($errors->any())
      <div>
        <small class="text-secondary">Votre e-mail ou votre mot de passe est incorrect, merci de réessayer !</small>
      </div>
    @endif
  </form>
@stop

@section('title')
    Connexion
@stop
