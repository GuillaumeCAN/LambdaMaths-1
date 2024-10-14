@extends('main')
@section('content')
  <x-ui.banner.title
    subtitle="Découvrez"
    title="Nos services"
    breadcrumb="Nos services"
  />

  <section class="bg-white">
    <div class="max-w-screen-lg mx-auto w-full text-center">
      <div class="gap-8 grid grid-cols-1 lg:py-8 md:grid-cols-1 px-4 py-6">
        <div>
          <small class="text-xl font-semibold text-secondary">Nos services</small>
          <h5 class="mt-8 font-semibold mb-6 w-[50%] mx-auto text-gray-900 text-4xl uppercase">
            Découvrer les solutions que nous proposons
          </h5>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="max-w-screen-lg mx-auto w-full">
      <div class="gap-8 grid grid-cols-3 lg:py-8 md:grid-cols-3 px-4 py-6">
        <div>
          <div class="flex">
            <div class="mr-2">
              <span class="text-5xl">
                <i class="fi fi-brands-skype text-secondary"></i>
              </span>
            </div>
            <div>
              <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
                Des cours en visio
              </h5>
              <p>
                Sur GoogleMeet, pour le confort de la maison et éviter les déplacements
              </p>
            </div>
          </div>
        </div>
        <div>
          <div class="flex">
            <div class="mr-2">
              <span class="text-5xl">
                <i class="fi fi-ss-highlighter text-secondary"></i>
              </span>
            </div>
            <div>
              <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
                Méthodologie adaptée
              </h5>
              <p>
                Des méthodes simples pour bien organiser son travail et progresser !
              </p>
            </div>
          </div>
        </div>
        <div>
          <div class="flex">
            <div class="mr-2">
              <span class="text-5xl">
                <i class="fi fi-br-play-alt text-secondary"></i>
              </span>
            </div>
            <div>
              <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
                Des vidéos simples !
              </h5>
              <p>
                Profitez des vidéos faites par nos professeurs pour mieux apprendre
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="gap-8 grid grid-cols-3 lg:py-8 md:grid-cols-3 px-4 py-6">
        <div>
          <div class="flex">
            <div class="mr-2">
              <span class="text-5xl">
                <i class="fi fi-ss-life-ring text-secondary"></i>
              </span>
            </div>
            <div>
              <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
                Un suivi adapté
              </h5>
              <p>
                Chaque élève est suivi ainsi que sa progression pour toujours avoir les exercices adaptés
              </p>
            </div>
          </div>
        </div>
        <div>
          <div class="flex">
            <div class="mr-2">
              <span class="text-5xl">
                <i class="fi fi-bs-square-root text-secondary"></i>
              </span>
            </div>
            <div>
              <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
                Des exercices en ligne
              </h5>
              <p>
                Découvrez notre large bibliothèque d'exercices en ligne avec les corrigés
              </p>
            </div>
          </div>
        </div>
        <div>
          <div class="flex">
            <div class="mr-2">
              <span class="text-5xl">
                <i class="fi fi-ss-key text-secondary"></i>
              </span>
            </div>
            <div>
              <h5 class="font-semibold mb-6 text-gray-900 text-lg uppercase">
                Un accès personnel
              </h5>
              <p>
                Pour toutes les informations, le nombre de cours restants ainsi que leurs dates etc...
              </p>
            </div>
          </div>
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

@section('title', 'Services')
