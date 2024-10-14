{{-- [Info] Partie supérieure du pied de page --}}
<footer class="bg-white border-t-">
  <div class="max-w-screen-lg mx-auto w-full">
    <div class="gap-8 grid grid-cols-2 lg:py-8 md:grid-cols-4 px-4 py-6">
      <div>
        <h2 class="font-semibold mb-6 text-gray-900 text-2xl uppercase">
          Réseaux sociaux
        </h2>
        <ul class="font-medium text-gray-500">
          <li class="mb-4">
            <a href="{{ $APP_CONTACT_FACEBOOK }}" class="hover:underline">
              Facebook
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ $APP_CONTACT_TWITTER }}" class="hover:underline">
              Twitter
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ $APP_CONTACT_LINKEDIN }}" class="hover:underline">
              LinkedIn
            </a>
          </li>
        </ul>
      </div>
      <div>
        <h2 class="font-semibold mb-6 text-gray-900 text-2xl uppercase">
          Liens rapides
        </h2>
        <ul class="font-medium text-gray-500">
          <li class="mb-4">
            <a href="{{ route('home') }}" class="hover:underline">
              Accueil
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('about') }}" class="hover:underline">
              À propos
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('services') }}" class="hover:underline">
              Services
            </a>
          </li>
          <li class="mb-4">
            <a href="{{ route('pricing') }}" class="hover:underline">
              Tarifs
            </a>
          </li>
        </ul>
      </div>
      <div>
        <h2 class="font-semibold mb-6 text-gray-900 text-2xl uppercase">
          Connexion
        </h2>
        <ul class="font-medium text-gray-500">
          <li class="mb-8">
            <span>Accedez à votre espace personnel</span>
          </li>
          <li class="mb-4">
            <a
              aria-current="page"
              class="bg-secondary focus:outline-none font-light px-5 py-2.5 text-sm text-white"
              href="{{ route('login') }}"
            >
              Espace personnel
            </a>
          </li>
        </ul>
      </div>
      <div>
        <h2 class="font-semibold mb-6 text-gray-900 text-2xl uppercase">
          Lambda<span class="text-secondary">Maths</span>
        </h2>
        <ul class="font-medium text-gray-500">
          <li class="font-bold mb-4">
            <a href="mailto:{{ $APP_CONTACT_EMAIL }}">{{ $APP_CONTACT_EMAIL }}</a>
          </li>
          <li class="font-bold mb-4 text-secondary text-2xl">
            <a href="tel:{{ $APP_CONTACT_PHONE_FORMAT }}">{{ $APP_CONTACT_PHONE }}</a>
          </li>
        </ul>
      </div>
    </div>

    {{-- [Info] Partie inférieure du pied de page --}}
    <div class="md:flex md:items-center md:justify-between px-4 py-6">
        <span class="sm:text-center text-gray-500 text-sm">
          Copyright © 2024, Designed & Developed by <span class="font-bold">{{ $APP_AUTHOR_NAME }}</span>
        </span>
      <div class="flex mt-4 md:mt-0 sm:justify-center space-x-5">
        <a href="{{ $APP_CONTACT_FACEBOOK }}" class="hover:text-gray-900 text-gray-400">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="{{ $APP_CONTACT_TWITTER }}" class="hover:text-gray-900 text-gray-400">
          <i class="fa-brands fa-twitter"></i>
        </a>
        <a href="{{ $APP_CONTACT_LINKEDIN }}" class="hover:text-gray-900 text-gray-400">
          <i class="fa-brands fa-linkedin-in"></i>
        </a>
      </div>
    </div>
  </div>
</footer>
