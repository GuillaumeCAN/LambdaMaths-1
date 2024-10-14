@extends('main')
@section('content')
<form class="max-w-sm mx-auto my-8" method="POST">
  @csrf
  @method('POST')

  <h2 class="text-3xl mb-6">Création du compte</h2>

  {{-- PRENOM --}}
  <div class="relative">
    <label for="lastname" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
      <i class="fi fi-sr-user text-gray-500 mt-6"></i>
    </div>
    <input type="text" id="lastname-create" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Dujardin">
  </div>

  {{-- PRENOM --}}
  <div class="relative">
    <label for="firstname" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
      <i class="fi fi-sr-user text-gray-500 mt-6"></i>
    </div>
    <input type="text" id="firstname-create" name="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Jean">
  </div>

  {{-- EMAIL --}}
  <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Adresse Email</label>
  <div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
      <i class="fi fi-sr-envelope text-gray-500 mt-2"></i>
    </div>
    <input type="text" id="email-create" name="email" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@exemple.com">
  </div>


  {{-- PHONE --}}
  <label for="phone" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
      <i class="fi fi-sr-phone-flip mt-1 text-gray-500"></i>
    </div>
    <input type="text" id="phone-create" name="phone" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+33611223344">
  </div>

  <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

  {{-- PASSWORD --}}
  <label for="password" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
      <i class="fi fi-sr-lock mt-1 text-gray-500"></i>
    </div>
    <input type="password" id="password-create" name="password" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Entrez un mot de passe">
  </div>

  {{-- PASSWORD CONFIRM --}}
  <label for="password_confirm" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Confirmation de mot de passe</label>
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
      <i class="fi fi-sr-lock mt-1 text-gray-500"></i>
    </div>
    <input type="password" id="password_confirm-create" name="password_confirm" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirmez le mot de passe">
  </div>

  <button type="submit" class="text-white bg-secondary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
    Créer mon compte
  </button>
  <a href=" {{route("login")}} "><button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Se connecter</button></a>

  @if ($errors->any())
  <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <ul class="list-disc list-inside">
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

</form>



@stop

@section('title')
    Créer votre compte
@stop


