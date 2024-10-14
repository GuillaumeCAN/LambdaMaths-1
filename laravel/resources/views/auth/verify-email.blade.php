@extends('main')
@section('content')

  <section class="bg-white">
    <div class="max-w-screen-xl flex justify-center mt-10 mx-auto w-full">
      <div class="block max-w-2xl p-6 bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex justify-center mb-4">
          <img src="{{ Vite::asset('resources/images/validation.png') }}" class="h-28 flex justify-center" alt="email">
        </div>
        <h5>Votre compte à bien été créer ! A présent, merci de vérifier votre email</h5>
        <h6 class="flex justify-center text-gray-500">Cliquez ci-dessous pour recevoir votre email de vérification</h6>
        <form class="d-flex flex-column" method="POST" action="/email/verification-notification">
          @csrf
          @method('POST')
          <div class="justify-center flex mt-4">
            <button class="flex justify-center items-center py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="submit">Recevoir un email</button>
          </div>

          @if (session('status') == 'verification-link-sent')
            <div class="text-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              Un email à bien été envoyé à l'adresse <span class="font-medium">{{ auth()->user()->email }} !</span>
            </div>
          @endif
        </form>
      </div>
    </div>
  </section>

@stop
@section('title', 'Vérification de l\'email')
