@extends('main')
@section('content')
  <x-ui.banner.title
    subtitle="Nos tarifs"
    title="Les formules"
    breadcrumb="Nos tarifs"
  />

  <section class="bg-white">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="gap-8 grid grid-cols-2 lg:py-8 md:grid-cols-2 px-4 py-6">
        <div class="self-end">
          <small class="text-xl font-semibold text-secondary">Plusieurs solutions</small>
          <h5 class="font-semibold mt-4 text-gray-900 text-2xl uppercase">
            Nous vous proposons plusieurs possibilités pour convenir à tout le monde
          </h5>
        </div>
        <div>
          <div class="gap-8 grid grid-cols-2 md:grid-cols-2">
            <div>
              <span class="text-4xl">
                <i class="fi fi-bs-shopping-cart-check text-secondary"></i>
              </span>
              <h2 class="mt-8 mb-4 font-semibold text-gray-900 text-lg uppercase">
                Les cours à l'unité
              </h2>
              <span class="text-sm text-primary">Pour tester ou parce que vous n'avez besoins que d'un seul cours particulier</span>
            </div>
            <div>
              <span class="text-4xl">
                <i class="fi fi-rs-box-open text-secondary"></i>
              </span>
              <h2 class="mt-8 mb-4 font-semibold text-gray-900 text-lg uppercase">
                Les packs
              </h2>
              <span class="text-sm text-primary">Les packs sont pour un suivi régulier, sur plusieurs semaines ou plusieurs mois !</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="flex items-center mt-12 mb-44 bg-center md:min-h-[500px] bg-fixed bg-no-repeat bg-[url('/resources/images/backgrounds/pricing.jpg')] bg-cover bg-gray-500 bg-blend-multiply">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="relative -bottom-32 p-12 flex flex-col">
        <h5 class="text-4xl text-center text-white">Nos tarifs</h5>
        <h5 class="mt-8 font-semibold text-white text-lg text-center uppercase">
          Choisissez la méthode qui vous convient
        </h5>
      </div>
      <div class="gap-8 grid grid-cols-3 lg:py-8 px-4 py-6">
        <div class="rounded-md shadow-2xl bg-tertiaryLight relative -bottom-32 p-12 flex flex-col">
          <span class="text-md font-semibold text-primary text-center">A l'unité</span>
          <span class="text-7xl text-primary text-center font-light my-4">25 €</span>
          <span class="text-md text-tertiary text-center">Par personne / cours</span>
          <span class="text-md font-semibold text-primary text-center mt-6">Incluant:</span>
          <ul class="max-w-md space-y-4 list-disc list-list-inside my-4">
            <li>1 heure de cours</li>
            <li>Méthodologie adaptée</li>
            <li>Préparation aux examens</li>
          </ul>
          <a
            aria-current="page"
            class="mt-auto uppercase text-center bg-secondary rounded-full focus:outline-none font-light px-5 py-2.5 text-sm text-white"
            href="{{ route('reservation') }}"
          >
            Je réserve !
          </a>
        </div>
        <div class="rounded-md shadow-2xl bg-tertiaryLight relative -bottom-32 p-12 flex flex-col">
          <span class="text-md font-semibold text-primary text-center">Le pack</span>
          <span class="text-7xl text-primary text-center font-light my-4">230 €</span>
          <span class="text-md text-tertiary text-center">Par personne / pack</span>
          <span class="text-md font-semibold text-primary text-center mt-6">Incluant:</span>
          <ul class="max-w-md space-y-4 list-disc list-list-inside my-4">
            <li>10 cours de 1 heure à répartir sur 3 mois</li>
            <li>Méthodologie adaptée</li>
            <li>Préparation aux examens</li>
            <li>1er mois offert à Lambda+</li>
          </ul>
          <a
            aria-current="page"
            class="mt-auto uppercase text-center bg-secondary rounded-full focus:outline-none font-light px-5 py-2.5 text-sm text-white"
            href="{{ route('reservation') }}"
          >
            C'est parti !
          </a>
        </div>
        <div class="rounded-md shadow-2xl bg-tertiaryLight relative -bottom-32 p-12 flex flex-col">
          <span class="text-md font-semibold text-primary text-center">Remise à niveau</span>
          <span class="text-7xl text-primary text-center font-light my-4">450 €</span>
          <span class="text-md text-tertiary text-center">Par personne / pack</span>
          <span class="text-md font-semibold text-primary text-center mt-6">Incluant:</span>
          <ul class="max-w-md space-y-4 list-disc list-list-inside my-4">
            <li>20 cours de 1 heure à répartir sur 6 mois</li>
            <li>Suivi approfondi & méthodologie adaptée</li>
            <li>Préparation aux examens</li>
            <li>3 mois offert à Lambda+</li>
          </ul>
          <a
            aria-current="page"
            class="mt-auto uppercase text-center bg-secondary rounded-full focus:outline-none font-light px-5 py-2.5 text-sm text-white"
            href="{{ route('reservation') }}"
          >
            Chaud devant !
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="max-w-screen-lg mx-auto w-full mt-12 p-12 bg-top bg-no-repeat bg-[url('/resources/images/backgrounds/home-contact.jpg')] bg-cover bg-gray-700 bg-blend-multiply">
    <div>
      <small class="text-xl font-semibold text-secondary">Decouvrez Lambda+ !</small>
    </div>
    <div class="gap-8 grid grid-cols-2 lg:py-8 md:grid-cols-2">
      <div>
        <p class="text-white text-2xl">Des exercices supplémentaires et corrigés, des fiches de révisions personnalisées et un suivis approfondis pour 11.99€/mois !</p>
      </div>
      <div class="justify-self-center">
        <p class="mt-6">
          <a
            aria-current="page"
            class="uppercase bg-secondary rounded-full focus:outline-none font-light px-5 py-2.5 text-sm text-white"
            href="https://app.acuityscheduling.com/catalog.php?owner=32344966&action=addCart&id=1816993&clear=1"
          >
            Je me lance !
          </a>
        </p>
      </div>
    </div>
  </section>

@stop

@section('title', 'Tarifs')
