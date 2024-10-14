@extends('main')
@section('content')

  <section class="bg-white">

    {{-- NAVBAR --}}
    <div class="max-w-screen-xl mx-auto w-full my-8" id="navbar-tab">
      <h2 class="text-3xl mb-6">Bienvenue {{ auth()->user()->firstname }} {{session('tab')}}</h2>
      <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">

          <li class="me-2" role="presentation">
            <a href="#infos-a">
              <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                <i class="fi fi-ss-user"></i>
                Mes informations
              </button>
            </a>
          </li>

          <li class="me-2" role="presentation">
            <a href="cours-a">
              <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">
                <i class="fi fi-br-calendar-lines-pen"></i>
                Mes cours
              </button>
            </a>
          </li>

          @if (auth()->user()->isAdmin())
          <li class="me-2" role="presentation">
            <a href="admin-a">
              <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="admin-tab" data-tabs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false">
                <i class="fi fi-rr-settings-sliders"></i>
                Panel Administrateur
              </button>
            </a>
          </li>
          @endif

        </ul>
      </div>

      {{-- TABS --}}
      <div id="default-tab-content">

        {{-- Informations --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">

          @if(session('statut'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              {{ session('statut') }}
            </div>
          @endif

            @if(session('error'))
              <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                {{ session('error') }}
              </div>
            @endif

            @if ($errors->any())
              <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <ul class="list-disc list-inside">
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif


          <div class="flex items-center gap-4">
            <img class="w-10 h-10 rounded-full" src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg=" alt="">
            <div class="font-medium dark:text-white">
                <div>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Membre depuis le : {{ auth()->user()->created_at->format('d/m/Y') }}</div>
            </div>
          </div>

          <div class="max-w-4xl p-4 rounded-lg">
            <div class="flex items-center space-x-2">
              @if( auth()->user()->isAdmin() OR auth()->user()->role_id == '2')
                <i class="fi fi-sr-chalkboard-user text-gray-500 mt-1"></i>
                <span class="text-gray-700">{{ auth()->user()->role->entitled }}</span>
              @endif
            </div>

            <div class="mt-2">
              <p class="text-sm text-gray-500">Adresse email :</p>
              <p class="text-gray-700">{{ auth()->user()->email }}</p>
            </div>

            <div class="mt-2">
              <p class="text-sm text-gray-500">Numéro de téléphone</p>
              <p class="text-gray-700">{{ auth()->user()->phone }}</p>
            </div>

            <div class="mt-2">
              <p class="text-sm text-gray-500">Abonnement Lambda+</p>
              @if(auth()->user()->subscribed == 1)
                <p class="text-gray-700">Actif</p>
              @else
                <p class="text-gray-700">Inactif</p>
              @endif
            </div>

            <button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="updateByUser" data-modal-toggle="updateByUser">
              <i class="fi fi-ss-pencil mr-2"></i>
              Modifier mes informations
            </button>

            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="mt-4">
              <p class="text-sm text-gray-500">Vos packs :</p>
              @include('components.ui.packs')
            </div>

          </div>

        </div>

        {{-- COURS --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
          @include('components.ui.cours')
        </div>

        @if (auth()->user()->isAdmin())
        {{-- ADMIN --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="admin" role="tabpanel" aria-labelledby="admin-tab">

          <h1 class="text-2xl font-bold">TABLEAU ADMINISTRATEUR</h1>

          <div id="success-message" class="hidden text-green-600"></div>
          <div id="global-success-message"></div>

          <div id="error-message" class="hidden text-red-600"></div>
          <div id="global-error-message"></div>

          <hr class="h-px my-2 bg-gray-400 border-0 dark:bg-gray-700">



          <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="adminPanel-tab" data-tabs-toggle="#adminPanel-content" role="tablist">

                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="users-table-tab" data-tabs-target="#users-table" type="button" role="tab" aria-controls="users-table" aria-selected="false"><i class="fi fi-ss-users"></i> Liste des utilisateurs</button>
                </li>

                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="exercice-tab" data-tabs-target="#exercice" type="button" role="tab" aria-controls="exercice" aria-selected="false"><i class="fi fi-sr-document"></i> Exercices & Documents</button>
                </li>

                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false"><i class="fi fi-ss-settings"></i> Paramètres</button>
                </li>

                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="infos-tab" data-tabs-target="#infos" type="button" role="tab" aria-controls="contacts" aria-selected="false"><i class="fi fi-br-chart-histogram"></i> Statistiques générales</button>
                </li>

            </ul>
          </div>

          <div id="adminPanel-content">

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="users-table" role="tabpanel" aria-labelledby="users-table-tab">
                <div class="users-table_vue">
                  {{-- Vue partielle tableau utilisateurs--}}
                </div>
            </div>


            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="exercice" role="tabpanel" aria-labelledby="exercice-tab">
                <div class="file-management_vue">
                  {{-- Vue partielle gestionnaire de fichiers --}}
                </div>
            </div>

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">PARAMETRES</p>
                <form method="post" id="maintenance-form">
                  @csrf
                  <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="down" value="1" class="sr-only peer" default="0"
                      @if(app() -> isDownForMaintenance())
                        checked
                      @endif
                    >
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Mettre le site en maintenance</span>
                  </label>

                  <div class="mb-4 mt-2">
                    <input required placeholder="Entrez votre clé d'accès maintenance" type="text" id="keyAccess" name="keyAccess" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  </div>

                  <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">Attention !</span> Mettre le site en maintenance rendra l'accès impossible pour les utilisateurs non-administrateurs.
                    </div>
                  </div>

                  <button type="submit" class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer les modifications</button>
                </form>
            </div>

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="infos" role="tabpanel" aria-labelledby="infos-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">INFOS GENERALES</p>
            </div>
          </div>
      </div>
        @endif
    </div>
  </div>
  </section>


{{--Modal Edit User--}}
  <div id="updateByUser" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Modification du profil
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateByUser">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4">
          <form method="post" action="updateByUser/{{ auth()->user()->id }}" id="updateByUser-form">
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Prénom</label>
                <input required type="text" id="firstname" name="firstname" value="{{ auth()->user()->firstname }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nom</label>
                <input required type="text" id="lastname" name="lastname" value="{{ auth()->user()->lastname }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Adresse email</label>
                <input required type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Numéro de téléphone</label>
                <input required type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="block w-full p-2 text-gray-500 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
            </div>
            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Entrez votre mot de passe pour confirmer les changements</label>
              <input required type="password" id="password" name="password" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
          </form>

          <div class="mt-4">
            <a href="{{ route('password.request') }}"> <button class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Modifier le mot de passe</button> </a>
          </div>


        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
          <button data-modal-hide="updateByUser" type="submit" form="updateByUser-form" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</button>
          <button data-modal-hide="updateByUser" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
        </div>
      </div>
    </div>
  </div>

{{-- Vue partielle tableau utilisateur --}}
<script>
function refreshTable() {
    $.ajax({
        url: '{{ route("user-table") }}',
        type: 'GET',
        success: function(response) {
            $('.users-table_vue').html(response);
            initFlowbite(); // PUTAIN DE MERDE CETTE FONCTION DE FDP FAIT MARCHER LES DROPDOWNS
        },
        error: function(xhr) {
            console.log('Erreur lors du chargement de la vue partielle');
        }
    });
}

// Charger le tableau lors du chargement de la page
$(document).ready(function() {
    refreshTable();
});
</script>

{{-- Vue partiel gestionnaire de fichiers --}}
<script>
  function refreshFileManager() {
      $.ajax({
          url: '{{ route("file-viewer") }}',
          type: 'GET',
          success: function(response) {
            console.log(response);
              $('.file-management_vue').html(response);
              window.HSStaticMethods.autoInit();
          },
          error: function(xhr) {
              console.log('Erreur lors du chargement de la vue partielle');
          }
      });
  }

  // Charger le tableau lors du chargement de la page
  $(document).ready(function() {
      refreshFileManager();
  });
</script>

{{-- Ajax maintenance --}}
  <script>
    $('#maintenance-form').submit(function(e) {
        e.preventDefault();
        var keyAccess = $('#keyAccess').val();
        var down = $('input[name="down"]').is(':checked') ? 1 : 0;

        $.ajax({
            url: '{{ route("maintenance") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                keyAccess: keyAccess,
                down: down
            },
            success: function(response) {
                $('#success-message').removeClass('hidden');
                $('#global-success-message').html('<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">' + response.message + '</div>');
                setTimeout(function() {
                    $('#success-message').addClass('hidden');
                }, 5000);
            },
            error: function(xhr) {
                $('#error-message').html(xhr.responseJSON.message).removeClass('hidden');
                $('#global-error-message').html('<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400" role="alert">' + response.message + '</div>');
                setTimeout(function() {
                    $('#error-message').addClass('hidden');
                }, 5000);
            }
        });
    });
  </script>

@stop
@section('title')
    Espace personel
@stop
