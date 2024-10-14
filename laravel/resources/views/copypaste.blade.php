{{-- Section --}}
    <!-- 1st Level Accordion -->
    <div class="hs-accordion active" role="treeitem" aria-expanded="true" id="hs-basic-tree-heading-one">
      <!-- 1st Level Accordion Heading -->
      <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
        <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="true" aria-controls="hs-basic-tree-collapse-one">
          <svg class="size-4 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path class="hs-accordion-active:hidden block" d="M12 5v14"></path>
          </svg>
        </button>

        <div class="grow hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-1.5 rounded-md cursor-pointer">
          <div class="flex items-center gap-x-3">
            <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"></path>
            </svg>
            <div class="grow">
              <span class="text-sm text-gray-800 dark:text-neutral-200">
                Lycée
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- End 1st Level Accordion Heading -->

{{-- Partie --}}


<label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Choisissez un dossier</label>
              <select name="parent_folder" id="parent_folder" class="mb-4 py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option value="/">-- Dossier racine --</option>
                @foreach($folderTree as $key => $value)
                    @if($key !== 'files')
                        <option value="{{ $key }}">{{ $key }}</option>
                        @include('components.ui.recursive-folder', ['tree' => $value, 'parent' => $key])
                    @endif
                @endforeach
              </select>

              <input type="text" name="folder_name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Le nom du nouveau dossier">







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
