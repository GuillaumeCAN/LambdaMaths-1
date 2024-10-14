<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Dossiers et Fichiers</title>
    <!-- Inclure PrelineUI CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>
<body>

{{-- <h1>Gestion des Dossiers et Fichiers</h1>

<!-- Formulaire pour upload un fichier PDF -->
<h2>Upload un fichier PDF dans un dossier</h2>
<form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="directory">Choisir un dossier :</label>
    <select name="directory" id="directory">
        <option value="/">-- Dossier racine --</option>
        @foreach($folderTree as $key => $value)
            @if($key !== 'files')
                <option value="{{ $key }}">{{ $key }}</option>
                @include('partial-test', ['tree' => $value, 'parent' => $key])
            @endif
        @endforeach
    </select>
    <input type="file" name="file" accept="application/pdf">
    <button type="submit">Upload le fichier</button>
</form>

<!-- Formulaire pour créer un dossier -->
<h2>Créer un dossier</h2>
<form action="{{ route('create.folder') }}" method="POST">
    @csrf
    <label for="parent_folder">Dans le dossier :</label>
    <select name="parent_folder" id="parent_folder">
        <option value="/">-- Dossier racine --</option>
        @foreach($folderTree as $key => $value)
            @if($key !== 'files')
                <option value="{{ $key }}">{{ $key }}</option>
                @include('partial-test', ['tree' => $value, 'parent' => $key])
            @endif
        @endforeach
    </select>
    <input type="text" name="folder_name" placeholder="Nom du sous-dossier">
    <button type="submit">Créer le sous-dossier</button>
</form> --}}

<div class="flex">

  @if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
  @endif

  @if(session('error'))
      <p style="color: red">{{ session('error') }}</p>
  @endif


  {{-- Treeview --}}
<div class="flex-none w-1/4 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
  <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
    <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
      Gestionnaire de fichiers
    </p>
  </div>
  <div class="p-4 md:p-5">
    <div class="flex columns-2">

      <div class="hs-dropdown relative inline-flex mr-2 mb-2 z-10">
        <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
          <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        <div class="z-999 hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-dividers">
          <div class="p-1 space-y-0.5">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" data-hs-overlay="#create-folder-modal" href="#">
              <i class="fi fi-rr-add-folder mt-1"></i>Ajouter un dossier
            </a>
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#" data-hs-overlay="#upload-file-modal">
              <i class="fi fi-rr-add-document mt-1"></i>Ajouter un fichier
            </a>
          </div>
          <div class="z-999 p-1 space-y-0.5">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
              <i class="fi fi-rr-remove-folder mt-1"></i>Supprimer un dossier
            </a>
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
              <i class="fi fi-rr-delete-document mt-1"></i>Supprimer un fichier
            </a>
          </div>
        </div>
      </div>

      <div>
        <h3 class="text-lg font-bold text-gray-800 dark:text-white relative top-1">
          Document Lambda+
        </h3>
      </div>
    </div>

    <div class="min-h-60 flex flex-col w-full h-full bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">

      <!-- Tree Root -->
    <div class="hs-accordion-treeview-root mt-2 ml-2 mb-2" role="tree" aria-orientation="vertical">
      <!-- 1st Level Accordion Group -->
      <div class="hs-accordion-group" role="group" data-hs-accordion-always-open="">
        @foreach($folderTree as $folder => $section)
        <!-- 1st Level Accordion -->
        <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-heading-one">
          <!-- 1st Level Accordion Heading -->
          <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
            <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-collapse-one">
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
                    {{$folder}} {{-- Section --}}
                  </span>
                </div>
              </div>
            </div>
          </div>
          <!-- End 1st Level Accordion Heading -->

          <!-- 1st Level Collapse -->
          <div id="hs-basic-tree-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="group" aria-labelledby="hs-basic-tree-heading-one">
            @foreach($section as $subSection => $sub2Section)
            <!-- 2nd Level Accordion Group -->
            <div class="hs-accordion-group ps-7 relative before:absolute before:top-0 before:start-3 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700" role="group" data-hs-accordion-always-open="">
              <!-- 2nd Level Nested Accordion -->
              <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-sub-heading-one">
                <!-- 2nd Level Accordion Heading -->
                <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
                  <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-sub-collapse-one">
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
                          {{$subSection}} {{-- SUB1 --}}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End 2nd Level Accordion Heading -->

                <!-- 2nd Level Collapse -->
                <div id="hs-basic-tree-sub-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="group" aria-labelledby="hs-basic-tree-sub-heading-one">
                  @foreach($sub2Section as $sub3Section => $sub4Section)
                  <!-- 3rd Level Accordion Group -->
                  <div class="hs-accordion-group ps-7 relative before:absolute before:top-0 before:start-3 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700" role="group" data-hs-accordion-always-open="">
                    <!-- 3rd Level Accordion -->
                    <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-sub-level-two-heading-one">
                      <!-- 3rd Level Accordion Heading -->
                      <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
                        <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-sub-level-two-collapse-one">
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
                                {{$sub3Section}} {{-- SUB2 --}}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End 3rd Level Accordion Heading -->

                      <!-- 3rd Level Collapse -->
                      <div id="hs-basic-tree-sub-level-two-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="group" aria-labelledby="hs-basic-tree-sub-level-two-heading-one">
                        <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">

                          @foreach ($sub4Section as $file)
                            @if(is_array($file))
                            @foreach($file as $pdf)
                              <!-- 3rd Level Item -->
                              <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                                <div class="flex items-center gap-x-3">
                                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                  </svg>
                                  <div class="grow">
                                    <span class="text-sm text-gray-800 dark:text-neutral-200">
                                      {{$pdf}} {{-- Remplace 'name' par la clé qui contient le nom du fichier --}}
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <!-- End 3rd Level Item -->
                              @endforeach
                            @else
                              <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                                <div class="flex items-center gap-x-3">
                                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                  </svg>
                                  <div class="grow">
                                    <span class="text-sm text-gray-800 dark:text-neutral-200">
                                      {{$file}}
                                    </span>
                                  </div>
                                </div>
                              </div>
                            @endif
                          @endforeach

                        </div>
                      </div>
                      <!-- End 3rd Level Collapse -->
                    </div>
                    <!-- End 3rd Level Accordion -->
                  </div>
                  @endforeach
                </div>
                <!-- End 2nd Level Collapse -->
              </div>
              <!-- End 2nd Level Accordion -->
            </div>
            @endforeach
          </div>
          <!-- End 1st Level Collapse -->
        </div>
        @endforeach
      </div>
      <!-- End 1st Level Accordion Group -->
    </div>
  </div>
</div>
</div>
{{-- apercu --}}
<div class="flex flex-grow flex-col ml-4 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
  <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
    <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
      Aperçu
    </p>
  </div>
  <div class="p-4 md:p-5 flex flex-col flex-grow">
    <h3 class="text-lg font-bold text-gray-800 dark:text-white relative top-1">
      Aucun document sélectionné
    </h3>

    <div class="min-h-60 flex flex-col justify-center items-center w-full h-full bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 mt-4"> <!-- Ajout de w-full et h-full -->
      <div class="flex flex-col justify-center items-center p-4 md:p-5 w-full"> <!-- Ajout de w-full ici aussi -->
        <svg class="size-10 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" x2="2" y1="12" y2="12"></line>
          <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
          <line x1="6" x2="6.01" y1="16" y2="16"></line>
          <line x1="10" x2="10.01" y1="16" y2="16"></line>
        </svg>
        <p class="mt-2 text-sm text-gray-800 dark:text-neutral-300">
          Rien à afficher pour le moment :|
        </p>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Fonction récursive pour afficher l'arborescence -->
{{-- <ul class="hs-tree-view hs-tree-view-open">
    @foreach ($folderTree as $key => $value)
        @if ($key === 'files')
            @foreach ($value as $file)
                <li>
                    <span>&#128196;</span> <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ $file }}</a>
                    <form action="{{ route('delete.file') }}" method="POST" style="display:inline">
                        @csrf
                        <input type="hidden" name="file_path" value="{{ $file }}">
                        <button type="submit" onclick="return confirm('Es-tu sûr de vouloir supprimer ce fichier ?')">Supprimer</button>
                    </form>
                </li>
            @endforeach
        @else
            <li>
                <button type="button" class="hs-tree-view-toggle">&#128193; {{ $key }}</button>
                <form action="{{ route('delete.folder') }}" method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="folder_path" value="{{ $key }}">
                    <button type="submit" onclick="return confirm('Es-tu sûr de vouloir supprimer ce dossier ?')">Supprimer</button>
                </form>
                <ul class="hs-tree-view-content">
                    @include('partial-test', ['tree' => $value, 'parent' => $key])
                </ul>
            </li>
        @endif
    @endforeach
</ul> --}}

{{-- Create folder Modal --}}
<div id="create-folder-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="create-folder-modal-label" class="font-bold text-gray-800 dark:text-white">
          Ajouter un dossier
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#create-folder-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">

        <form id="create-folder-form">
          @csrf
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
        </form>

      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#create-folder-modal">
          Annuler
        </button>
        <button type="submit" form="create-folder-form" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Créer le dossier
        </button>
      </div>
    </div>
  </div>
</div>

{{-- upload file Modal --}}
<div id="upload-file-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
  <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="upload-file-modal-label" class="font-bold text-gray-800 dark:text-white">
          Ajouter un fichier
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#upload-file-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">

        <form id="upload-file-form">
          @csrf
          <label for="directory">Choisir un dossier :</label>
          <select name="directory" id="directory" class="mb-4 py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <option value="/">-- Dossier racine --</option>
              @foreach($folderTree as $key => $value)
                  @if($key !== 'files')
                      <option value="{{ $key }}">{{ $key }}</option>
                      @include('components.ui.recursive-folder', ['tree' => $value, 'parent' => $key])
                  @endif
              @endforeach
          </select>
          <input type="file" name="file" accept="application/pdf">
        </form>

      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#upload-file-modal">
          Annuler
        </button>
        <button type="submit" form="upload-file-form" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Upload le fichier
        </button>
      </div>
    </div>
  </div>
</div>

{{-- jQuery Create folder --}}
<script>
  $(document).ready(function() {
    console.log('MES PUTAIN DE COUILLES EN BOIS');
    const modalElementCreateFolder = document.getElementById('create-folder-modal');
    const modalInstanceCreateFolder = new Modal(modalElementCreateFolder);
    initFlowbite();


    $('#create-folder-form').on('submit', function(event) {
      event.preventDefault();
      console.log('test');
      var formData = $(this).serialize();
      $('.error-message').remove();
      console.log(formData);


      $.ajax({
        url: '{{ route("create.folder") }}',
        method: 'POST',
        data: formData,
        success: function(response) {
          modalInstanceCreateFolder.hide();
          $('#create-folder-modal-backdrop').remove();


          $('#global-success-message').html('<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">' + response.message + '</div>');
          $('#create-folder-form')[0].reset();
          refreshFileManager();
        },
        error: function(response) {
          if (response.status === 422) {
            var errors = response.responseJSON.errors;
          }
        }
      });
    });
  });
  </script>

{{-- jQuery upload file --}}
<script>
$(document).ready(function() {
  const modalElementUploadFile = document.getElementById('upload-file-modal');
  const modalInstanceUploadFile = new Modal(modalElementUploadFile);
  initFlowbite();

  $('#upload-file-form').on('submit', function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $('.error-message').remove();

    var form = $('#upload-file-form')[0];
    var formData = new FormData(form);
    $.ajax({
      url: '{{ route("upload.file") }}',
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response){
        modalInstanceUploadFile.hide();
        $('#upload-file-modal-backdrop').remove();
        $('#global-success-message').html('<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">' + response.message + '</div>');
        $('#upload-file-form')[0].reset();
        refreshFileManager();
      },
      error: function(response){
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
            $('#' + key).closest('.relative').after(errorContainer);
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

</body>
</html>





