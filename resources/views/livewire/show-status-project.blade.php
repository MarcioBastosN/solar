<div>
    <section class="bg-white dark:bg-gray-600">
        <div class="container w-full mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2">
                    <div class="mx-4 my-2">
                        <div class="text-primary font-bold text-lg my-2 flex-auto">
                            Status possiveis do Projeto
                        </div>
                        <hr>
                        <table class="w-full text-sm text-left text-primary">
                            <thead class="text-xs text-primary uppercase bg-gray-400 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusProject as $status)
                                    <tr class="bg-white border-b text-primary">
                                        <td class="px-6 py-4">
                                            {{ $status->label }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button data-modal-target="authentication-modal-project"
                                                data-modal-toggle="authentication-modal-project"
                                                class="block text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                                                type="button" wire:click='showEditStatusProject({{ $status->id }})'>
                                                Açoes
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full sm:w-1/2">
                    <div class="mx-4 my-2">
                        <div class="text-primary font-bold text-lg my-2 flex-auto">
                            Status possiveis dos Documentos
                        </div>
                        <hr>
                        <table class="w-full text-sm text-left text-primary ">
                            <thead class="text-xs text-primary uppercase bg-gray-400 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusDocumentos as $status)
                                    <tr class="bg-white border-b text-primary">
                                        <td class="px-6 py-4">
                                            {{ $status->label }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button data-modal-target="authentication-modal"
                                                data-modal-toggle="authentication-modal"
                                                class="block text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                                                type="button" wire:click='showEditStatusDoc({{ $status->id }})'>
                                                Açoes
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main modal -->
    <div wire:ignore.self id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar nome disjuntor</h3>
                    <form class="space-y-6" action="#" wire:submit.prevent="editarDoc({{ $id_selecionado }})">
                        <input class="block w-full text-sm text-primary border border-primary rounded-lg cursor-pointer"
                            type="text" wire:model='value'>
                        <button type="submit"
                            class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                    border-2-secondary text-center shadow-xl ring-4 ring-white
                    hover:bg-primary hover:text-white"
                            data-modal-hide="authentication-modal">
                            Editar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- projeto model --}}
    <div wire:ignore.self id="authentication-modal-project" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal-project">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar projeto</h3>
                    <form class="space-y-6" action="#" wire:submit.prevent="editarProjeto({{ $id_selecionado }})">
                        <input class="block w-full text-sm text-primary border border-primary rounded-lg cursor-pointer"
                            type="text" wire:model='value'>
                        <button type="submit"
                            class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                    border-2-secondary text-center shadow-xl ring-4 ring-white
                    hover:bg-primary hover:text-white"
                            data-modal-hide="authentication-modal-project">
                            Editar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
