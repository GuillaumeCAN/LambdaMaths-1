@extends('main')
@section('content')

  <section class="bg-white">
    <div class="max-w-screen-xl flex justify-center mt-10 mx-auto w-full">
      <div class="block max-w-2xl p-6 bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex justify-center mb-4">
          <img src="{{ Vite::asset('resources/images/password.png') }}" class="h-28 flex justify-center" alt="email">
        </div>


        <h5 class="flex justify-center">Merci de réinitialiser votre mot de passe</h5>
        <div class="row">
          <div class="col">
            <form class="d-flex flex-column" method="POST" action="{{ route('password.email') }}">
              @csrf
              @method('POST')
              <label>
                <input type="text" placeholder="Votre adresse email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </label>

              @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                  A new email verification link has been emailed to you!
                </div>
              @endif

              <div class="flex justify-center mt-2">
                <button class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="submit">Réinitialiser</button>
              </div>

            </form>
          </div>
        </div>



      </div>
    </div>
  </section>

@stop
@section('title', 'Mot de passe oublié')
