@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="./node_modules/preline/dist/preline.js"></script>


<div class="flex">

{{-- Gestionnaire de fichiers --}}
<div class="flex flex-col w-1/4 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
  <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
    <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
      Gestionnaire de fichiers
    </p>
  </div>
  <div class="p-4 md:p-5">
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
      Exercices Lambda+
    </h3>

    <!-- Tree Root -->
<div class="hs-accordion-treeview-root" role="tree" aria-orientation="vertical">
  <!-- 1st Level Accordion Group -->
  <div class="hs-accordion-group" role="group" data-hs-accordion-always-open="">
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

      <!-- 1st Level Collapse -->
      <div id="hs-basic-tree-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-heading-one">
        <!-- 2nd Level Accordion Group -->
        <div class="hs-accordion-group ps-7 relative before:absolute before:top-0 before:start-3 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700" role="group" data-hs-accordion-always-open="">
          <!-- 2nd Level Nested Accordion -->
          <div class="hs-accordion active" role="treeitem" aria-expanded="true" id="hs-basic-tree-sub-heading-one">
            <!-- 2nd Level Accordion Heading -->
            <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
              <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="true" aria-controls="hs-basic-tree-sub-collapse-one">
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
                      Terminal
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End 2nd Level Accordion Heading -->

            <!-- 2nd Level Collapse -->
            <div id="hs-basic-tree-sub-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-sub-heading-one">
              <!-- 3rd Level Accordion Group -->
              <div class="hs-accordion-group ps-7 relative before:absolute before:top-0 before:start-3 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700" role="group" data-hs-accordion-always-open="">
                <!-- 3rd Level Accordion -->
                <div class="hs-accordion active" role="treeitem" aria-expanded="true" id="hs-basic-tree-sub-level-two-heading-one">
                  <!-- 3rd Level Accordion Heading -->
                  <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
                    <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="true" aria-controls="hs-basic-tree-sub-level-two-collapse-one">
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
                            Exercices
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End 3rd Level Accordion Heading -->

                  <!-- 3rd Level Collapse -->
                  <div id="hs-basic-tree-sub-level-two-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-sub-level-two-heading-one">
                    <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">
                      <!-- 3rd Level Item -->
                      <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                        <div class="flex items-center gap-x-3">
                          <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                          </svg>
                          <div class="grow">
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                              Les fonctions
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End 3rd Level Item -->

                      <!-- 3rd Level Item -->
                      <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                        <div class="flex items-center gap-x-3">
                          <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                          </svg>
                          <div class="grow">
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                              Intégrales
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End 3rd Level Item -->

                      <!-- 3rd Level Item -->
                      <div class="px-2">
                        <span class="text-sm text-gray-800 dark:text-neutral-200">
                          Fiches révisions
                        </span>
                      </div>
                      <!-- End 3rd Level Item -->
                    </div>
                  </div>
                  <!-- End 3rd Level Collapse -->
                </div>
                <!-- End 3rd Level Accordion -->

                <!-- 3rd Level Accordion -->
                <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-sub-level-two-heading-two">
                  <!-- 3rd Level Accordion Heading -->
                  <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
                    <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-sub-level-two-collapse-two">
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
                            Corrigés
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End 3rd Level Accordion Heading -->

                  <!-- 3rd Level Collapse -->
                  <div id="hs-basic-tree-sub-level-two-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-sub-level-two-heading-two">
                    <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">
                      <!-- 3rd Level Item -->
                      <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                        <div class="flex items-center gap-x-3">
                          <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                          </svg>
                          <div class="grow">
                            <span class="text-sm text-gray-800 dark:text-neutral-200">
                              input.css
                            </span>
                          </div>
                        </div>
                      </div>
                      <!-- End 3rd Level Item -->
                    </div>
                  </div>
                  <!-- End 3rd Level Collapse -->
                </div>
                <!-- End 3rd Level Accordion -->

                <!-- 3rd Level Heading -->
                <div class="py-0.5 px-1.5" role="treeitem">
                  <span class="text-sm text-gray-800 dark:text-neutral-200">
                    Informations
                  </span>
                </div>
                <!-- End 3rd Level Heading -->
              </div>
              <!-- End 3rd Level Accordion Group -->
            </div>
            <!-- End 2nd Level Collapse -->
          </div>
          <!-- End 2nd Level Nested Accordion -->

          <!-- 2nd Level Nested Accordion -->
          <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-sub-heading-two">
            <!-- 2nd Level Accordion Heading -->
            <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
              <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-sub-collapse-two">
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
                      Première
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End 2nd Level Accordion Heading -->

            <!-- 2nd Level Collapse -->
            <div id="hs-basic-tree-sub-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-sub-heading-two">
              <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">
                <!-- 2nd Level Item -->
                <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                  <div class="flex items-center gap-x-3">
                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                      <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                      <circle cx="10" cy="12" r="2"></circle>
                      <path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"></path>
                    </svg>
                    <div class="grow">
                      <span class="text-sm text-gray-800 dark:text-neutral-200">
                        hero.jpg
                      </span>
                    </div>
                  </div>
                </div>
                <!-- End 2nd Level Item -->

                <!-- 2nd Level Item -->
                <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                  <div class="flex items-center gap-x-3">
                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                      <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                      <circle cx="10" cy="12" r="2"></circle>
                      <path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"></path>
                    </svg>
                    <div class="grow">
                      <span class="text-sm text-gray-800 dark:text-neutral-200">
                        tailwind.png
                      </span>
                    </div>
                  </div>
                </div>
                <!-- End 2nd Level Item -->

                <!-- 2nd Level Item -->
                <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                  <div class="flex items-center gap-x-3">
                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                      <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                      <circle cx="10" cy="12" r="2"></circle>
                      <path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"></path>
                    </svg>
                    <div class="grow">
                      <span class="text-sm text-gray-800 dark:text-neutral-200">
                        untitled.png
                      </span>
                    </div>
                  </div>
                </div>
                <!-- End 2nd Level Item -->
              </div>
            </div>
            <!-- End 2nd Level Collapse -->
          </div>
          <!-- End 2nd Level Nested Accordion -->

          <!-- 2nd Level Nested Accordion -->
          <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-sub-heading-three">
            <!-- 2nd Level Accordion Heading -->
            <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
              <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-sub-collapse-three">
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
                      Seconde
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End 2nd Level Accordion Heading -->

            <!-- 2nd Level Collapse -->
            <div id="hs-basic-tree-sub-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-sub-heading-three">
              <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">
                <!-- 2nd Level Item -->
                <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
                  <div class="flex items-center gap-x-3">
                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                      <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                      <circle cx="10" cy="12" r="2"></circle>
                      <path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"></path>
                    </svg>
                    <div class="grow">
                      <span class="text-sm text-gray-800 dark:text-neutral-200">
                        preline.jpg
                      </span>
                    </div>
                  </div>
                </div>
                <!-- End 2nd Level Item -->
              </div>
            </div>
            <!-- End 2nd Level Collapse -->
          </div>
          <!-- End 2nd Level Nested Accordion -->
        </div>
        <!-- 2nd Level Accordion Group -->
      </div>
      <!-- End 1st Level Collapse -->
    </div>
    <!-- End 1st Level Accordion -->

    <!-- 1st Level Accordion -->
    <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-heading-two">
      <!-- 1st Level Accordion Heading -->
      <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
        <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-collapse-two">
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
                Collège
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- End 1st Level Accordion Heading -->

      <!-- 1st Level Collapse -->
      <div id="hs-basic-tree-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-heading-two">
        <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">
          <!-- 1st Level Item -->
          <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
            <div class="flex items-center gap-x-3">
              <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
              </svg>
              <div class="grow">
                <span class="text-sm text-gray-800 dark:text-neutral-200">
                  preline.js
                </span>
              </div>
            </div>
          </div>
          <!-- End 1st Level Item -->

          <!-- 1st Level Item -->
          <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
            <div class="flex items-center gap-x-3">
              <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
              </svg>
              <div class="grow">
                <span class="text-sm text-gray-800 dark:text-neutral-200">
                  tailwind.js
                </span>
              </div>
            </div>
          </div>
          <!-- End 1st Level Item -->

          <!-- 1st Level Item -->
          <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
            <div class="flex items-center gap-x-3">
              <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
              </svg>
              <div class="grow">
                <span class="text-sm text-gray-800 dark:text-neutral-200">
                  www.js
                </span>
              </div>
            </div>
          </div>
          <!-- End 1st Level Item -->
        </div>
      </div>
      <!-- End 1st Level Collapse -->
    </div>
    <!-- End 1st Level Accordion -->

    <!-- 1st Level Accordion -->
    <div class="hs-accordion" role="treeitem" aria-expanded="false" id="hs-basic-tree-heading-three">
      <!-- 1st Level Accordion Heading -->
      <div class="hs-accordion-heading py-0.5 flex items-center gap-x-0.5 w-full">
        <button class="hs-accordion-toggle size-6 flex justify-center items-center hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-expanded="false" aria-controls="hs-basic-tree-collapse-three">
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
                Primaire
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- End 1st Level Accordion Heading -->

      <!-- 1st Level Collapse -->
      <div id="hs-basic-tree-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="group" aria-labelledby="hs-basic-tree-heading-three">
        <div class="ms-3 ps-3 relative before:absolute before:top-0 before:start-0 before:w-0.5 before:-ms-px before:h-full before:bg-gray-100 dark:before:bg-neutral-700">
          <!-- 1st Level Item -->
          <div class="hs-accordion-selectable hs-accordion-selected:bg-gray-100 dark:hs-accordion-selected:bg-neutral-700 px-2 rounded-md cursor-pointer" role="treeitem">
            <div class="flex items-center gap-x-3">
              <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
              </svg>
              <div class="grow">
                <span class="text-sm text-gray-800 dark:text-neutral-200">
                  index.html
                </span>
              </div>
            </div>
          </div>
          <!-- End 1st Level Item -->
        </div>
      </div>
      <!-- End 1st Level Collapse -->
    </div>
    <!-- End 1st Level Accordion -->
  </div>
  <!-- End 1st Level Accordion Group -->
</div>
<!-- End Tree Root -->

  </div>
</div>



<div class="flex flex-grow flex-col ml-4 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
  <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
    <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
      Aperçu
    </p>
  </div>
  <div class="p-4 md:p-5 flex flex-col flex-grow">
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
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
          Il n'y a rien à afficher pour l'instant :|
        </p>
      </div>
    </div>
  </div>
</div>




</div>
