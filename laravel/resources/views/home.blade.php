{{-- TODO: Optimiser le CSS --}}
{{-- https://github.com/versoly/taos#installation --}}
{{-- https://github.com/inorganik/CountUp.js --}}
@extends('main')
@section('content')
  {{-- [Info] Partie 1: présentation --}}
  <section class="bg-center bg-no-repeat bg-[url('/resources/images/backgrounds/home-entete.png')] bg-cover bg-gray-600 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-lg py-24 lg:py-56">
      <small class="mb-8 text-xs font-normal text-white">Pour tous niveaux !</small>
      <p class="mb-8 text-6xl font-semibold text-white">Réussir en sciences, c'est possible avec LambdaMaths</p>
      <p class="mb-8 uppercase text-gray-300">
        <a
          aria-current="page"
          class="bg-secondary focus:outline-none font-light px-5 py-2.5 text-sm text-white"
          href="{{ route('pricing') }}"
        >
          Je reserve mon cours ! <i class="fa-solid fa-chevron-right"></i>
        </a>
      </p>
    </div>
  </section>

  {{-- [Info] Partie 2: solutions adaptés --}}
  <section class="bg-white mt-12">
    <div class="max-w-screen-lg mx-auto">
      <small class="text-xl font-semibold text-secondary">Des solutions faites pour vous !</small>
      <p class="my-6 text-5xl font-semibold text-primary">Votre enfant à des difficultés en maths ? Aucun soucis ! Nous sommes là pour vous</p>
      <div class="gap-8 grid grid-cols-2 lg:py-8 md:grid-cols-3 px-4 py-6">
        <div>
{{--          <i class="fa-solid fa-cubes text-secondary text-6xl"></i>--}}
          <span class="text-6xl"><i class="fi fi-ss-bullseye-arrow text-secondary"></i></span>
          <h2 class="mt-8 mb-4 font-semibold text-gray-900 text-lg uppercase">
            Des méthodes adaptées
          </h2>
          <span class="text-sm text-primary">Chaque enfant est unique, et chez l'association LambdaMaths, nous sommes conscient.</span>
        </div>
        <div>
{{--          <i class="fa-solid fa-book text-secondary text-6xl"></i>--}}
          <span class="text-6xl"><i class="fi fi-sr-comment-alt-check text-secondary"></i></span>
          <h2 class="mt-8 mb-4 font-semibold text-gray-900 text-lg uppercase">
            Un suivi hebdomadaire
          </h2>
          <span class="text-sm text-primary">Pour consolider et renforcer les connaissances, il est nécessaire de pratiquer tous les jours !</span>
        </div>
        <div>
{{--          <i class="fa-solid fa-clock-rotate-left text-secondary text-6xl"></i>--}}
          <span class="text-6xl"><i class="fi fi-br-calendar-lines-pen text-secondary"></i></span>
          <h2 class="mt-8 mb-4 font-semibold text-gray-900 text-lg uppercase">
            Des horaires faits pour vous !
          </h2>
          <span class="text-sm text-primary">Choisissez le créneau qui vous convient pour faciliter votre emploi du temps.</span>
        </div>
      </div>
    </div>
  </section>

  {{-- [Info] Partie 3: la réussite pour tous --}}
  <section class="bg-white mt-12">
    <div class="max-w-screen-lg mx-auto">
      <div class="gap-8 grid grid-cols-2 lg:py-8 md:grid-cols-2 px-4 py-6">
        <div class="relative -ml-[50%]">
          <img
            class="rounded-lg drop-shadow-2xl"
            src="{{ Vite::asset('resources/images/backgrounds/home-reussite.jpg') }}"
            alt="POC"
          >
        </div>
        <div class="flex flex-col justify-center">
          <small class="text-xl font-semibold text-secondary">Qui sommes-nous ?</small>
          <h2 class="mt-4 font-semibold mb-4 text-gray-900 text-lg uppercase">
            Votre enfant est en difficulté ?
          </h2>
          <p>Nous sommes là pour vous</p>
          <span class="text-sm text-primary">
            La réussite en sciences passe par plusieurs chemins: le travail personnel et la méthode d'apprentissage.
            De la préparation aux examens et contrôles, en passant par la résolution d'exercices et des astuces de méthodologie,
            la réussite de votre enfant dans les matières scientifiques est assuré !
            Découvrez-nous plus en détail dans la rubrique 'À propos'.
          </span>
          <p class="mt-6">
            <a
              aria-current="page"
              class="uppercase bg-secondary rounded-full focus:outline-none font-light px-5 py-2.5 text-sm text-white"
              href="{{ route('about') }}"
            >
              A propos
            </a>
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- [Info] Partie 4: statistiques --}}
  <x-ui.banner.statistics />

  {{-- [Info] Partie 4: contact et divers --}}
  <section class="flex items-center mt-12 mb-44 bg-center md:min-h-[700px] bg-fixed bg-no-repeat bg-[url('/resources/images/backgrounds/home-contact.jpg')] bg-cover bg-gray-500 bg-blend-multiply">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="gap-8 mt-12 grid grid-cols-2 lg:py-8 md:grid-cols-2 px-4 py-6">
        <div class="bg-white p-12 flex flex-col">
          <span class="text-lg font-semibold text-secondary">Vous hésitez ?</span>
          <h5 class="mt-4 text-4xl text-primary">Prenez contact avec nous pour faire votre devis gratuitement !</h5>
          <span class="mt-4 text-sm text-tertiary">Contacter nous au numéro de téléphone ci-dessous</span>
          <p class="mt-4 text-4xl">
{{--            <i class="fa-solid fa-mobile text-secondary"></i> --}}
            <i class="fi fi-rr-mobile-notch text-secondary"></i>
            {{ $APP_CONTACT_PHONE }}
          </p>
        </div>
      </div>
      <div class="gap-8 grid grid-cols-1 lg:py-8 md:grid-cols-1 px-4 py-6">
        <div class="shadow-2xl bg-tertiaryLight relative -bottom-32 p-12 flex flex-col">
          <span class="text-lg font-semibold text-secondary">Vous avez des questions ?</span>
          <h5 class="mt-4 text-4xl text-primary">
            Pour toutes informations complémentaires, rendez-vous dans la rubrique
            <a class="underline text-secondary" href="{{ route('contact') }}">contact</a>
          </h5>
        </div>
      </div>
    </div>
  </section>
@stop
@section('title', 'Réussir en Science !')
