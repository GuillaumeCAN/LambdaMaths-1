{{-- [Info] Partie supérieure de la barre de navigation --}}
<nav class="bg-primary border-b hidden md:block">
  <div class="max-w-screen-lg mx-auto p-5">
    <div class="flex items-center">
      <ul class="flex flex-row font-medium mt-0 space-x-8 text-sm">
        <li>
          <a href="{{ $APP_CONTACT_FACEBOOK }}" class="text-tertiary">
            <i class="fi fi-brands-facebook"></i>
          </a>
        </li>
        <li>
          <a href="{{ $APP_CONTACT_TWITTER }}" class="text-tertiary">
            <i class="fi fi-brands-twitter-alt-circle"></i>
          </a>
        </li>
        <li>
          <a href="{{ $APP_CONTACT_LINKEDIN }}" class="text-tertiary">
            <i class="fi fi-brands-linkedin"></i>
          </a>
        </li>
      </ul>
      <ul class="flex flex-row font-medium ml-auto mt-0 space-x-8 text-sm">
        <li>
          <span class="text-tertiary">Téléphone:</span>
          <a
            href="tel:{{ $APP_CONTACT_PHONE_FORMAT }}"
            class="text-white">
            {{ $APP_CONTACT_PHONE }}
          </a>
        </li>
        <li>
          <a
            href="mailto:{{ $APP_CONTACT_EMAIL }}"
            class="text-tertiary "
          >
            <i class="fi fi-sr-envelope"></i>
            <span class="text-white">{{ $APP_CONTACT_EMAIL }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

{{-- [Info] Partie inférieure de la barre de navigation --}}
<nav class="bg-primary border-gray-200">
  <div class="flex flex-wrap max-w-screen-lg mx-auto items-center justify-between p-5">
    <a href="{{ route('home') }}" class="flex items-center space-x-3">
      <span class="font-semibold self-center text-white text-4xl whitespace-nowrap">
        Lambda<span class="text-secondary">Maths</span>
      </span>
    </a>
    <button
      aria-controls="navbar-default"
      aria-expanded="false"
      class="focus:outline-none focus:ring-gray-200 focus:ring-2 hover:bg-gray-100 h-10 inline-flex items-center justify-center md:hidden p-2 rounded-lg text-gray-500 text-sm w-10"
      data-collapse-toggle="navbar-default"
      type="button"
    >
      <span class="sr-only"></span>
      <i class="fa-regular fa-compass text-2xl"></i>
    </button>

    <div class="hidden md:block md:w-auto w-full" id="navbar-default">
      <ul class="flex flex-col font-light md:border-0 md:flex-row md:mt-0 md:p-0 md:space-x-8 mt-4 rounded-lg uppercase p-4">
        <li class="flex items-center md:py-0 py-3 text-sm text-white">
          <a
            aria-current="page"
            @class(['text-secondary' => Route::is('home')])
            class="block md:bg-transparent md:p-0 px-3 py-2 rounded text-sm"
            href="{{ route('home') }}"
          >
            Accueil
          </a>
        </li>
        <li class="flex items-center md:py-0 py-3 text-sm text-white">
          <a
            aria-current="page"
            @class(['text-secondary' => Route::is('about')])
            class="block md:bg-transparent md:p-0 px-3 py-2 rounded text-sm"
            href="{{ route('about') }}"
          >
            À propos
          </a>
        </li>
        <li class="flex items-center md:py-0 py-3 text-sm text-white">
          <a
            aria-current="page"
            @class(['text-secondary' => Route::is('services')])
            class="block md:bg-transparent md:p-0 px-3 py-2 rounded text-sm"
            href="{{ route('services') }}"
          >
            Services
          </a>
        </li>
        <li class="flex items-center md:py-0 py-3 text-sm text-white">
          <a
            aria-current="page"
            @class(['text-secondary' => Route::is('pricing')])
            class="block md:bg-transparent md:p-0 px-3 py-2 rounded text-sm"
            href="{{ route('pricing') }}"
          >
            Tarifs
          </a>
        </li>
        @guest
          <li class="flex items-center md:mt-0 mt-4 text-sm text-white">
            <a
              aria-current="page"
              class="border border-secondary focus:outline-none font-light px-5 py-2.5 text-sm rounded-full"
              href="{{ route('login') }}"
            >
              Espace membre
            </a>
          </li>
        @endguest
        @auth
          <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white border border-secondary focus:outline-none font-light px-5 py-2.5 text-sm rounded-full" type="button">
            {{ auth()->user()->firstname }}
            <span style="text-transform: uppercase;">{{ auth()->user()->lastname }}</span>
            <i class="fi fi-sr-angle-small-down"></i>
          </button>

          <!-- Dropdown menu -->
          <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 text-end">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDividerButton">
              <li>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mon espace</a>
              </li>
            </ul>
            <div class="py-2">
              <form id="logout" method="POST" action="/logout">
                @csrf
                @method('POST')
                <a onclick="document.querySelector('#logout').submit()" class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  Se déconnecter
                </a>
              </form>
            </div>
          </div>
        @endauth
      </ul>
    </div>
  </div>
</nav>
