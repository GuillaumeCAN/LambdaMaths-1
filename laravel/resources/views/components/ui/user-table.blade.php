@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>


<div class="flex justify-between items-center">
  <div>
    <h4 class="text-lg dark:text-white">LISTE DES UTILISATEURS ({{count($users)}})</h4>
  </div>

  <div>
    {{-- BOUTON OUVRIR MODAL CREATE --}}
    <button id="create-modal-button" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1 text-center inline-flex items-right me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-end">
      <i class="fi fi-ss-user-add" style="margin-top: 2.5px; margin-right:3.5px"></i>
      Ajouter un utilisateurs
    </button>
  </div>
</div>

<div class="my-1 relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="usersTable">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Nom - Prénom
              </th>
              <th scope="col" class="px-6 py-3">
                  Email
              </th>
              <th scope="col" class="px-6 py-3">
                  Téléphone
              </th>
              <th scope="col" class="px-6 py-3">
                  Status
              </th>
              <th scope="col" class="px-3 py-3">
                Lambda+
            </th>
            <th scope="col" class="px-3 py-3">
              Synchronisé
            </th>
              <th scope="col" class="px-6 py-3">
                  Action
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="{{$user->id}}">
              <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$user['firstname']}} <span style="text-transform:uppercase;">{{$user['lastname']}}</span>
              </td>
              <td class="px-6 py-4 max-w-[200px] truncate">
                  {{$user['email']}}
              </td>
              <td class="px-6 py-4 max-w-[150px] truncate">
                  {{$user['phone']}}
              </td>
              <td class="px-6 py-4 max-w-[150px] truncate">
                  {{$user->role->entitled}}
              </td>
              <td>
                <p class="text-center" style="align-items: center">
                  @if ($user['subscribed']== 1)
                    <i class="fi fi-ss-circle"></i>
                  @else
                    <i class="fi fi-sr-circle"></i>
                  @endif
                </p>
              </td>

              <td>
                <p class="text-center" style="align-items: center">

                 @php
                    $clientFound = false;
                  @endphp

                  @foreach($clients as $client)
                    @if($client['email'] == $user['email'])
                      @php
                        $clientFound = true;
                      break;
                      @endphp
                    @endif
                  @endforeach

                  @if($clientFound)
                    <i class="fi fi-sr-cloud-upload-alt"></i>
                  @else
                    <i class="fi fi-rr-cloud-disabled"></i>
                  @endif
                </p>

              <td class="px-6 py-4">

                <button id="{{$user->id}}dropdown-btn" data-dropdown-toggle="{{$user->id}}-dropdownMenu" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600 dropdownbtn" type="button">
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                  </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="{{$user->id}}-dropdownMenu" class="z-999 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 absolute">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                      <li>
                        <a href="#" data-id="{{$user->id}}" class="info-modal-button block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fi fi-sr-info text-gray-500" style="position: relative; top:2px;"></i> Informations</a>
                      </li>
                      <li>
                        <a href="#" data-id="{{$user->id}}" class="edit-modal-button block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fi fi-sr-file-edit text-gray-500" style="position: relative; top:2px;"></i> Modifier</a>
                      </li>
                    </ul>
                    <div class="py-2">
                      <a href="#" data-id="{{$user->id}}" class="delete-modal-button block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fi fi-sr-delete-user text-gray-500" style="position: relative; top:2px;"></i> Supprimer</a>
                    </div>
                </div>

              </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>



{{-- MODAL CREATE --}}
<div id="create-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-1 md:p-3 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Enregistrement d'un utilisateur
              </h3>
              <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
            <form id="create-form" method="POST">
              @csrf

              {{-- NOM --}}
              <div class="relative mr-4">
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

              <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

              {{-- ROLE --}}
              <label for="role" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Selectionner le role de l'utilisateur</label>
              <select id="role_id-create" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">Administrateur</option>
                <option value="2">Professeur</option>
                <option value="4" selected>Membre</option>
              </select>

              {{-- SUBSCRIBED --}}
              <label class="inline-flex items-center mb-5 my-4 cursor-pointer">
                <input type="checkbox" id="subscribed-create" value="1" name="subscribed" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Abonnement Lambda+</span>
              </label>

            </form>

          </div>
          <div class="modal-footer flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <!-- Bouton de soumission -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" form="create-form" >Enregistrer</button>
            <!-- Bouton Annuler -->
            <button data-modal-hide="create-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
          </div>
      </div>
  </div>
</div>

{{-- MODAL EDIT --}}
<div id="edit-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-1 md:p-3 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Modification d'un utilisateur
              </h3>
              <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
            <form id="edit-form" method="POST">
              @csrf

              {{-- NOM --}}
              <div class="relative mr-4">
                <label for="lastname" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <i class="fi fi-sr-user text-gray-500 mt-6"></i>
                </div>
                <input type="text" id="lastname-edit" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Dujardin">
              </div>

              {{-- PRENOM --}}
              <div class="relative">
                <label for="firstname" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <i class="fi fi-sr-user text-gray-500 mt-6"></i>
                </div>
                <input type="text" id="firstname-edit" name="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" placeholder="Jean">
              </div>

              {{-- EMAIL --}}
              <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Adresse Email</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                  <i class="fi fi-sr-envelope text-gray-500 mt-2"></i>
                </div>
                <input type="text" id="email-edit" name="email" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@exemple.com">
              </div>


              {{-- PHONE --}}
              <label for="phone" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <i class="fi fi-sr-phone-flip mt-1 text-gray-500"></i>
                </div>
                <input type="text" id="phone-edit" name="phone" class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+33611223344">
              </div>

              <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

              {{-- ROLE --}}
              <label for="role" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Selectionner le role de l'utilisateur</label>
              <select id="role_id-edit" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">Administrateur</option>
                <option value="2">Professeur</option>
                <option value="4" selected>Membre</option>
              </select>

              {{-- SUBSCRIBED --}}
              <label class="inline-flex items-center mb-5 my-4 cursor-pointer">
                <input type="checkbox" id="subscribed-edit" value="1" name="subscribed" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Abonnement Lambda+</span>
              </label>

            </form>

          </div>
          <div class="modal-footer flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <!-- Bouton de soumission -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" form="edit-form" >Modifier</button>
            <!-- Bouton Annuler -->
            <button data-modal-hide="edit-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
          </div>
      </div>
  </div>
</div>

{{-- MODAL DELETE --}}
<div id="delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Close modal</span>
          </button>

          <form id="delete-form" method="delete">
            @csrf
            <input type="text" id="id-delete" name="id" class="hidden">
          </form>

          <div class="p-4 md:p-5 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Etes vous sur de vouloir supprimer cet utilisateur ? (<span id="span-user-firstname" class="italic"></span> <span id="span-user-lastname" class="italic"></span> )</h3>
              <button type="submit" form="delete-form" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                  Oui, Supprimer
              </button>
              <button data-modal-hide="delete-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, annuler</button>
          </div>
      </div>
  </div>
</div>


{{-- MODAL INFO --}}
<div id="info-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                  Informations
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="info-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5 space-y-4">

            <div class="flex items-center gap-4">
              <img class="w-10 h-10 rounded-full" src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg=" alt="">
              <div class="font-medium dark:text-white">
                  <div><span id="info-user-firstname"></span> <span id="info-user-lastname"></span></div>
                  <div class="text-sm text-gray-500 dark:text-gray-400">Membre depuis le : <span id="info-user-created_at"></span></div>
              </div>
            </div>

            <p class="mb-3 text-gray-500 dark:text-gray-400">
              <span class="text-black">Adresse email : </span><span id="info-user-email"></span><br>
              <span class="text-black">Numéro de téléphone : </span><span id="info-user-phone"></span><br>
            </p>
            <hr class="h-px mb-4 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mb-3 text-gray-500 dark:text-gray-400">
              <span class="text-black">Status : </span><span id="info-user-role"></span><br>
              <span class="text-black">Abonnement Lambda+ : </span><span id="info-user-subscription"></span>
            </p>
            <p class="mb-3 text-gray-500 dark:text-gray-400">
              <span class="text-black font-normal">Dernière modification : </span><span id="info-user-updated_at"></span><br>
            </p>

          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button data-modal-hide="info-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Retour</button>
          </div>
      </div>
  </div>
</div>


{{-- jQuery info modal --}}
<script>
  $(document).ready(function(){
    const modalElementInfo = document.getElementById('info-modal');
    const modalInstanceInfo = new Modal(modalElementInfo);
    initFlowbite();

    function opentModalInfo(){
      modalInstanceInfo.show();
    }

    $('.info-modal-button').on('click', function(){
      let userId = $(this).data('id');

      $.ajax({
        url: 'info/'+ userId,
        type: 'GET',
        success: function(data){
          $('#info-user-firstname').text(data.firstname);
          $('#info-user-lastname').text(data.lastname);
          $('#info-user-email').text(data.email);
          // Convertir la chaîne de date en objet Date
          const date = new Date(data.created_at);

          // Formater la date manuellement
          const day = String(date.getDate()).padStart(2, '0');
          const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"];
          const month = monthNames[date.getMonth()];
          const year = date.getFullYear(); // Derniers 2 chiffres de l'année

          // Construire la chaîne formatée
          const formattedDate = `${day} ${month} ${year}`;

          // Mettre à jour le texte de l'élément
          $('#info-user-created_at').text(formattedDate);
          $('#info-user-phone').text(data.phone);
          const rolesMapping = {
              1: 'Administrateur',
              2: 'Professeur',
              4: 'Membre'
          };

          // Supposons que data.role contienne la valeur numérique du rôle
          const roleValue = data.role_id;

          // Obtenir le nom complet du rôle
          const roleName = rolesMapping[roleValue] || 'Rôle inconnu';

          // Afficher le rôle dans l'élément
          $('#info-user-role').text(roleName);
          // Supposons que data.subscribed contienne la valeur pour l'abonnement (1 ou null/undefined)
          const isSubscribed = data.subscribed;

          // Vérifier si l'utilisateur est abonné ou non
          const subscriptionStatus = isSubscribed ? 'Abonné' : 'Non abonné';

          // Afficher l'abonnement dans l'élément
          $('#info-user-subscription').text(subscriptionStatus);

          const dateUpdate = new Date(data.updated_at);

          // Formater la date manuellement
          const dayUpdate = String(dateUpdate.getDate()).padStart(2, '0');
          const monthNamesUpdate = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"];
          const monthUpdate = monthNames[dateUpdate.getMonth()];
          const yearUpdate = dateUpdate.getFullYear();

          const formattedDateUpdate = `${dayUpdate} ${monthUpdate} ${yearUpdate}`;
          $('#info-user-updated_at').text(formattedDateUpdate);
        }
      });

      modalInstanceInfo.show();
    });

  });
</script>


{{-- jQuery delete modal --}}
<script>
  $(document).ready(function(){
    const modalElementDelete = document.getElementById('delete-modal');
    const modalInstanceDelete = new Modal(modalElementDelete);
    initFlowbite();

    function opentModalDelete(){
      modalInstanceDelete.show();
    }

    $('.delete-modal-button').on('click', function(){
      // Récupération de l'id
      let userId = $(this).data('id');

      // Récupération des données
      $.ajax({
        url: 'edit/'+ userId,
        type: 'GET',
        success: function(data){
          $('#span-user-firstname').text(data.firstname);
          $('#span-user-lastname').text(data.lastname);
          $('#id-delete').val(data.id);
        }
      });
      opentModalDelete();
    })

    // Requete de suppression
    $('#delete-form').on('submit', function(event){
        event.preventDefault();
        var idValue = $('#id-delete').val();
        var formData = $(this).serialize();
        $('.error-message').remove();

        $.ajax({
          url: 'delete/'+ idValue,
          method: 'delete',
          data: formData,

          success: function(response){
            modalInstanceDelete.hide();
            $('#global-success-message').html('<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">' + response.message + '</div>');
            $('#edit-form')[0].reset();
            refreshTable();
          },

          error: function(response) {
            if (response.status === 422) {
              var errors = response.responseJSON.errors;

              $('#global-error-message')
                .removeClass('hidden')
                .html('<div class="p-4 mb-4 text-sm bg-red-100 text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert"><span class="font-medium">Erreur !</span> Le formulaire contient des erreurs.</div>');

                $.each(errors, function(key, value) {
                var errorContainer = $('<div class="error-message p-1 mb-2 text-sm bg-red-100 text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800;" style="margin-top:-5px;">' + value[0] + '</div>');
                $('#' + key + '-edit').closest('.relative').after(errorContainer);
              });
            } else {
            // Autre erreur
            alert('Une erreur est survenue, veuillez réessayer.');
          }
        }
        });
      });
  });
</script>

{{-- jQuery edit modal --}}
<script>
  $(document).ready(function() {
    const modalElementEdit = document.getElementById('edit-modal');
    const modalInstanceEdit = new Modal(modalElementEdit); // Création de l'instance du modal avec Flowbite
    initFlowbite();

    function openModalEdit() {
        $('#edit-form')[0].reset(); // Réinitialise le formulaire
        modalInstanceEdit.show(); // Ouvre le modal
    }

    $('.edit-modal-button').on('click', function() {
      let userId = $(this).data('id');

      $.ajax({
        url: 'edit/'+userId,
        type: 'GET',
        success: function(data){
          $('#lastname-edit').val(data.lastname);
          $('#firstname-edit').val(data.firstname);
          $('#email-edit').val(data.email);
          $('#phone-edit').val(data.phone);
          $('#role_id-edit').val(data.role_id);
          $('#subscribed-edit').prop('checked', data.subscribed);
        }
      });

      openModalEdit(); // Ouvre le modal

      $('#edit-form').on('submit', function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $('.error-message').remove();

        $.ajax({
              url: 'update/'+ userId,
              method: 'PUT',
              data: formData,

              success: function(response) {
                  modalInstanceEdit.hide();
                  console.log(response);

                  $('#global-success-message').html('<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">' + response.message + '</div>');
                  $('#edit-form')[0].reset();
                  refreshTable();
              },

              error: function(response) {
                  if (response.status === 422) {
                      var errors = response.responseJSON.errors;

                      $('#global-error-message')
                          .removeClass('hidden')
                          .html('<div class="p-4 mb-4 text-sm bg-red-100 text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert"><span class="font-medium">Erreur !</span> Le formulaire contient des erreurs.</div>');

                      $.each(errors, function(key, value) {
                        var errorContainer = $('<div class="error-message p-1 mb-2 text-sm bg-red-100 text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800;" style="margin-top:-5px;">' + value[0] + '</div>');
                        $('#' + key + '-edit').closest('.relative').after(errorContainer);
                      });
                  } else {
                      // Autre erreur
                      alert('Une erreur est survenue, veuillez réessayer.');
                  }
              }
          });
      });
    });
  });
</script>

{{-- jQuery create modal --}}
<script>
  $(document).ready(function() {
    const modalElementCreate = document.getElementById('create-modal');
    const modalInstanceCreate = new Modal(modalElementCreate); // Création de l'instance du modal avec Flowbite
    initFlowbite();

    function openModalCreate() {
        $('#create-form')[0].reset(); // Réinitialise le formulaire
        modalInstanceCreate.show(); // Ouvre le modal
    }

    $('#create-modal-button').on('click', function() {
        openModalCreate(); // Ouvre le modal
    });

    $('#create-form').on('submit', function(event) {
        event.preventDefault(); // Empêche la soumission normale du formulaire

        // Récupération des données du formulaire
        var formData = $(this).serialize();

        // Effacer les anciens messages d'erreurs
        $('.error-message').remove();

        // Envoi des données via AJAX
        $.ajax({
            url: '{{ route("create") }}', // Remplace avec ta route Laravel
            method: 'POST',
            data: formData,
            success: function(response) {
                // Si la soumission est un succès, ferme le modal
                modalInstanceCreate.hide(); // Utilisation de Flowbite pour fermer le modal
                console.log(response);

                // Afficher un message de succès à l'extérieur du modal
                $('#global-success-message').html('<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">' + response.message + '</div>');

                // Remise à zéro du formulaire
                $('#create-form')[0].reset();

                refreshTable();
            },
            error: function(response) {
                if (response.status === 422) {
                    // Si validation échoue, afficher les erreurs
                    var errors = response.responseJSON.errors;

                    $('#global-error-message')
                        .removeClass('hidden') // Supprime la classe hidden
                        .html('<div class="p-4 mb-4 text-sm bg-red-100 text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert"><span class="font-medium">Erreur !</span> Le formulaire contient des erreurs.</div>');

                    // Parcourir les erreurs et les afficher
                    $.each(errors, function(key, value) {
                      // Trouve le conteneur pour les erreurs
                      var errorContainer = $('<div class="error-message p-1 mb-2 text-sm bg-red-100 text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800;" style="margin-top:-5px;">' + value[0] + '</div>');

                      // Ajoute le message d'erreur après l'input
                      $('#' + key + '-create').closest('.relative').after(errorContainer);
                    });
                } else {
                    // Autre erreur
                    alert('Une erreur est survenue, veuillez réessayer.');
                }
            }
        });
    });
  });
</script>

