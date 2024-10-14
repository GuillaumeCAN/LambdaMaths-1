@extends('main')
@section('content')
  <x-ui.banner.title
    subtitle="À propos"
    title="En savoir plus"
    breadcrumb="À propos"
  />

  <section class="bg-white">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="gap-8 grid grid-cols-2 lg:py-8 md:grid-cols-2 px-4 py-6">
        <div>
          <small class="text-xl font-semibold text-secondary">Qui sommes-nous ?</small>
          <h5 class="font-semibold mb-6 text-gray-900 text-2xl uppercase">
            Nous sommes une jeune équipe de professeurs
          </h5>
          <p>
            Depuis quelque temps, les étudiants se désintéressent de plus en plus des mathématiques, et plus généralement des matières scientifiques.
            C'est pour ça que nous sommes là !
          </p>
          <p class="mt-6">
            <a
              aria-current="page"
              class="uppercase bg-secondary rounded-full focus:outline-none font-light px-5 py-2.5 text-sm text-white"
              href="{{ route('login') }}"
            >
              C'est parti !
            </a>
          </p>
        </div>
        <div>
          <img
            class="drop-shadow-2xl"
            src="{{ Vite::asset('resources/images/backgrounds/about-team.jpg') }}"
            alt="About the team"
          >
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="gap-8 grid grid-cols-3 lg:py-8 md:grid-cols-3 px-4 py-6">
        <div>
          <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
            <span class="text-2xl text-secondary">01.</span> Notre mission
          </h5>
          <p>
            Nous souhaitons redonner le gout des sciences à votre enfant, et faire remonter sa moyenne parmi les meilleures
          </p>
        </div>
        <div>
          <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
            <span class="text-2xl text-secondary">02.</span> Notre vision
          </h5>
          <p>
            Chaque enfant est unique, et ,ous l'avons bien compris ! C'est pour cela qu'un programme adapté à chacun est établi
          </p>
        </div>
        <div>
          <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
            <span class="text-2xl text-secondary">03.</span> Notre approche
          </h5>
          <p>
            Des exercices ciblés, car c'est en pratiquant qu'on atteint la perfection. Des préparations de contrôles et d'examens.
          </p>
        </div>
      </div>
    </div>
  </section>

  <x-ui.banner.statistics />
@stop

@section('title', 'À propos')
