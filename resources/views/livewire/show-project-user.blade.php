<div>

    @if (!empty($pendencia))
        <div class="text-center my-16">
            <h3 class=" text-red-500 text-2xl">Ops! - perfil suspenso</h3>
            <p>Contate o responsavel para verificar suas pendencias!</p>
        </div>
    @else
        <div class="grid grid-cols-2 my-4">
            {{-- grid-1 --}}
            <div class="mx-8 px-8 ">
                @foreach ($register as $item)
                    <div class="my-2">
                        <x-card
                            title="Registro: {{ $item->id }} -
                            {{ $item->tipo_pessoa == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica' }} - {{ $item->created_at->format('d/m/Y') }}">

                            <div class="grid grid-cols-2">
                                <div>
                                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Arquivos
                                        enviados
                                    </h2>
                                    <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->identificacao_pf_pj }}')"
                                                class="hover:underline">
                                                {{ $item->tipo_pessoa == 'pj' ? 'CNPJ' : 'RG ou CNH' }}
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'RG')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'RG')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'RG')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'RG')->first()->status->label }}
                                                </span>
                                                @if ($item->validaDocumentos->where('documento', 'RG')->first()->status_id == 2)
                                                    <a href="#">Subustituir</a>
                                                @endif
                                            @endif
                                        </li>
                                        <li class="flex
                                                items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->procuracao }}')"
                                                class="hover:underline">
                                                Procuração
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'Procuracao')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'Procuracao')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'Procuracao')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'Procuracao')->first()->status->label }}
                                                </span>
                                                @if ($item->validaDocumentos->where('documento', 'Procuracao')->first()->status_id == 2)
                                                    <a href="#">Subustituir</a>
                                                @endif
                                            @endif
                                        </li>
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->fatura_da_uc }}')"
                                                class="hover:underline">
                                                Fatura da Unidade Consumidora
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'Fatura')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'Fatura')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'Fatura')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'Fatura')->first()->status->label }}
                                                </span>
                                                @if ($item->validaDocumentos->where('documento', 'Fatura')->first()->status_id == 2)
                                                    <a href="#">Subustituir</a>
                                                @endif
                                            @endif
                                        </li>
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->padrao_de_entrada }}')"
                                                class="hover:underline">
                                                Padrao de entrada
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'Padrao')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'Padrao')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'Padrao')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'Padrao')->first()->status->label }}
                                                </span>
                                                @if ($item->validaDocumentos->where('documento', 'Padrao')->first()->status_id == 2)
                                                    <a href="#">Subustituir</a>
                                                @endif
                                            @endif
                                        </li>
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->datasheet }}')"
                                                class="hover:underline">
                                                Datasheet
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'Datasheet')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'Datasheet')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'Datasheet')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'Datasheet')->first()->status->label }}
                                                </span>
                                                @if ($item->validaDocumentos->where('documento', 'Datasheet')->first()->status_id == 2)
                                                    <a href="#">Subustituir</a>
                                                @endif
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                                        Informaçoes do modelo
                                    </h2>
                                    <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                        <li class="flex items-center">Disjuntor:
                                            {{ $item->disjuntor->name }}
                                        </li>
                                        <li class="flex items-center">
                                            KWP: {{ $item->kwp }}
                                        </li>
                                        <li class="flex items-center">
                                            fotovoltaico: {{ $item->fotovoltaico }}
                                        </li>
                                        <li class="flex items-center">
                                            inversor: {{ $item->inversor }}
                                        </li>
                                        <li class="flex items-center">
                                            @if (empty($item->observacao))
                                                <x-icon name="exclamation"
                                                    class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                                Não possui observação
                                            @else
                                                <x-icon name="search"
                                                    class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                                <a href="#" wire:click="showObs('{{ $item->observacao }}')">
                                                    Observacao
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <x-slot name="footer">
                                <div class="flex justify-between items-center">
                                    <x-button label="Delete" flat negative />
                                    <x-button label="Save" class="bg-primary w-32" />
                                </div>
                            </x-slot>
                        </x-card>
                    </div>
                @endforeach
                {{ $register->links() }}
            </div>
            {{-- grid-2 --}}
            <div class="mx-8 px-8">
                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite
                            Application UI v2.0.0 <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">Latest</span>
                        </h3>
                        <time
                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                            on
                            January 13th, 2022</time>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over 20+
                            pages
                            including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce &
                            Marketing
                            pages.</p>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                                class="w-3.5 h-3.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                <path
                                    d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg> Download ZIP</a>
                    </li>
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Figma v1.3.0</h3>
                        <time
                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                            on
                            December 7th, 2021</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">All of the pages and
                            components
                            are
                            first designed in Figma and we keep a parity between the two versions even as we update the
                            project.
                        </p>
                    </li>
                    <li class="ml-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.2.2
                        </h3>
                        <time
                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                            on
                            December 2nd, 2021</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of
                            web
                            components and interactive elements built on top of Tailwind CSS.</p>
                    </li>
                </ol>
                <ol>
                    <li>
                        <div>
                            <h2>Info Card</h2>
                            <p>{{ empty($infoProjet) ? 'Vazio' : 'test' }}</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    @endif

</div>
