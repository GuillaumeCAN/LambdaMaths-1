@foreach($cours as $item)

@php
  $locationString = $item['location'];
  preg_match('/https?:\/\/[^\s]+/', $locationString, $matches);
  $url = $matches[0];
@endphp

@if($item['email'] == auth()->user()->email)

<ol class="relative border-s border-gray-200 dark:border-gray-700 ml-4">
  <li class="mb-4 ms-6">
      <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900" style="--tw-ring-opacity: 1; --tw-ring-color: rgb(249 250 251);">
        <i class="fi fi-sr-book-bookmark mt-2 text-gray-700"></i>
      </span>
      <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white"> {{$item['type']}}</h3>
      <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Prévu le {{$item['date']}} de {{$item['time']}} à {{$item['endTime']}} </time>
      <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">


        @if($item['paid'] == 'no')

        <div id="alert-additional-content-2" class="p-3 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
          <div class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Défaut de paiement</h3>
          </div>
          <div class="mt-2 mb-4 text-sm">
            Ce RDV n'a pas encore été réglé, merci de procéder au paiement au plus vite. (Restant à payé : {{$item['priceSold']}}€)
          </div>
          <div class="flex">
            <a href="{{$item['confirmationPagePaymentLink']}}"><button type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
              <i class="fi fi-sr-credit-card mt-1 mr-2"></i> Procéder au paiement
            </button></a>
          </div>
        </div>

        @else
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
          <i class="fi fi-sr-credit-card mt-1 mr-2"></i>
          <div>
            <span class="font-medium">Paiement confirmé</span> Votre rendez-vous à bien été confirmé !
          </div>
        </div>
        @endif


      </p>
      <a href="#" aria-controls="info-{{$item['id']}}-cours-modal" data-hs-overlay="#info-{{$item['id']}}-cours-modal" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
        <i class="fi fi-br-info mt-1 mr-2"></i> En savoir plus sur ce RDV
      </a>
  </li>
</ol>

@endif


{{-- Modal --}}
<div id="info-{{$item['id']}}-cours-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="info-{{$item['id']}}-cours-modal">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="info-{{$item['id']}}-cours-modal" class="font-bold text-gray-800 dark:text-white">
          Information du rendez-vous
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#info-{{$item['id']}}-cours-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">

        {{-- Content --}}
        <div class="p-4 max-w-3xl mx-auto bg-white shadow-md rounded-lg">
          <div class="flex justify-between items-center">
            <div>
              <p class="text-gray-600 font-medium">Status</p>
              @if($item['paid'] == 'no')
              <p class="text-red-500">En attente de paiement</p>
              @else
              <p class="text-green-500">Confirmé</p>
              @endif
            </div>
            <div>
              <p class="text-gray-600 font-medium">N° RDV #</p>
              <p>{{$item['id']}}</p>
            </div>
            <div>
              <p class="text-gray-600 font-medium">Réservé le</p>
              <p>{{$item['dateCreated']}}</p>
            </div>
            <div>
              <p class="text-gray-600 font-medium">Total</p>
              <p class="text-xl font-semibold">{{$item['price']}}€</p>
            </div>
          </div>
          <div class="my-4 border-t border-gray-300"></div>

          <!-- Address and Payment Info -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <h3 class="font-semibold text-gray-700">Informations personnelles</h3>
              <p>{{$item['firstName']}} {{$item['lastName']}}</p>
              <p>{{$item['email']}}</p>
              <p>{{$item['phone']}}</p>
              <button class="mt-2 text-blue-500 hover:underline">Protection de vos données</button>
            </div>
            <div>
              <h3 class="font-semibold text-gray-700">Date du cours</h3>
              <p>{{$item['date']}} de {{$item['time']}} à {{$item['endTime']}}</p>
              <h3 class="mt-4 font-semibold text-gray-700">Connexion au cours</h3>
              <div class="flex items-center">
                <img src="{{ Vite::asset('resources/images/visio-icon.png')}}" class="w-8 h-8 mr-2" alt="MasterCard logo">
                <a href="{{$url}}"><button type="button" class="rounded-lg text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 px-3 py-2 text-xs font-medium text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Se connecter</button></a>
              </div>
            </div>
          </div>

          <div class="my-4 border-t border-gray-300"></div>

          <!-- Summary and actions -->
          <div class="flex justify-between items-center">
            <div>
              <p class="text-gray-600">Sous-total</p>
              <p>{{$item['price']}} €</p>
            </div>
            <div>
              <p class="text-gray-600">Paiement</p>
              @if($item['paid'] == 'no')
              <p class="text-red-900">En attente</p>
              @else
              <p class="text-green-900">Confirmé</p>
              @endif
            </div>
            <div>
              <p class="text-gray-600">Taxe estimée</p>
              <p>0.00 €</p>
            </div>
            <div>
              <p class="text-gray-600">Déja payé</p>
              <p>{{$item['amountPaid']}} €</p>
            </div>
            <div>
              <p class="font-semibold text-gray-700">Total</p>
              <p class="text-xl font-semibold">{{$item['price'] - $item['amountPaid']}} €</p>
            </div>
          </div>

          <div class="mt-6 flex justify-between items-center">
            <a href="{{$item['confirmationPage']}}"><button class="text-blue-500 hover:underline">Modifier ou re-programmer</button></a>
            <div class="flex items-center">
              <a href="{{$item['confirmationPage']}}"><button class="mr-4 text-gray-600 hover:text-gray-900">Afficher ou imprimer</button></a>
              <a href="{{$item['confirmationPage']}}"><button class="bg-red-700 text-white py-2 px-4 rounded-lg hover:bg-red-800">Annuler le cours</button></a>
            </div>
          </div>
        </div>


      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#info-{{$item['id']}}-cours-modal">
          Fermer
        </button>
      </div>
    </div>
  </div>
</div>


@endforeach

<h1 class="text-gray-500 italic">Aucun cours prévu pour le moment...</h1>

<a href="{{ route("reservation") }}">
<button type="button" class="mt-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Réserver un cours</button>
</a>


