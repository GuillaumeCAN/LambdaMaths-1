@extends('main')
@section('content')

<form class="max-w-sm mx-auto my-8" method="POST" action="{{ route('password.update') }}">
  @csrf
  @method('POST')
  <div class="flex justify-center mb-4">
    <img src="{{ Vite::asset('resources/images/password.png') }}" class="h-28 flex justify-center" alt="email">
  </div>
  <h5 class="text-2xl mb-6">Réinitialisez votre mot de passe</h5>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse E-mail</label>
    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" required>
  </div>
  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nouveau mot de passe</label>
    <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>

  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmation</label>
    <input type="password" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>

  <input type="hidden" name="token" value="{{ request()->token }}">

  <button type="submit" class="text-white bg-secondary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
    Réinitialiser
  </button>

</form>
@stop
@section('title')
    Réinitialisation du mot de passe
@stop


{{--<section>--}}
{{--    <div class="container text-center">--}}
{{--        <h5>Merci de réinitialiser votre mot de passe</h5>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <form class="d-flex flex-column" method="POST" action="{{ route('password.update') }}">--}}
{{--                    @csrf--}}
{{--                    @method('POST')--}}
{{--                    <label>--}}
{{--                        E-mail *--}}
{{--                        <input type="text" placeholder="E-mail" name="email">--}}
{{--                    </label>--}}
{{--                    <label>--}}
{{--                        Mot de passe *--}}
{{--                        <input type="text" placeholder="Mot de passe" name="password">--}}
{{--                    </label>--}}
{{--                    <label>--}}
{{--                        Confirmation *--}}
{{--                        <input type="text" placeholder="Confirmation" name="password_confirmation">--}}
{{--                    </label>--}}
{{--                    <input type="hidden" name="token" value="{{ request()->token }}">--}}
{{--                    <button class="btn btn-main btn-small" type="submit">Réinitialiser</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
