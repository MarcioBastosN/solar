<div>
    @foreach ($registros as $registro)
        <div class="my-2 mx-2">
            <x-card
                title="Registro: {{ $registro->id }} - {{ $registro->user->name }} -
                {{ $registro->tipo_pessoa == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica' }} -
                {{ $registro->created_at->format('d/m/Y') }}">

                <div class="bg-white">
                    <div class="container max-w-5xl mx-2">
                        <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                            <div class="w-full sm:w-1/2 my-2">
                                {{-- lado esquerdo --}}
                                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                                    Arquivos recebidos
                                </h2>
                                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                    <li class="flex items-center">
                                        <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                        <a href="#" wire:click="export('{{ $registro->identificacao_pf_pj }}')"
                                            class="hover:underline">
                                            {{ $registro->tipo_pessoa == 'pj' ? 'CNPJ' : 'RG ou CNH' }}
                                        </a>
                                        @if (!empty($registro->possuiProjeto))
                                            @if (empty($registro->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()) ||
                                                    $registro->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                                    mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                                    {{ $registro->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $registro->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status->label }}
                                                </span>
                                            @endif
                                            @if ($registro->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id != 3)
                                                <button class="mx-2"
                                                    wire:click="validar('identificacao_pf_pj', {{ $registro->id }})">
                                                    Avaliar</button>
                                            @endif
                                        @endif
                                    </li>
                                    <li class="flex items-center">
                                        <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                        <a href="#" wire:click="export('{{ $registro->procuracao }}')"
                                            class="hover:underline">
                                            Procuração
                                        </a>
                                        @if (!empty($registro->possuiProjeto))
                                            @if (empty($registro->validaDocumentos->where('documento', 'procuracao')->first()) ||
                                                    $registro->validaDocumentos->where('documento', 'procuracao')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                                    mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                                    {{ $registro->validaDocumentos->where('documento', 'procuracao')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $registro->validaDocumentos->where('documento', 'procuracao')->first()->status->label }}
                                                </span>
                                            @endif
                                            @if ($registro->validaDocumentos->where('documento', 'procuracao')->first()->status_id != 3)
                                                <button class="mx-2"
                                                    wire:click="validar('procuracao', {{ $registro->id }})">
                                                    Avaliar</button>
                                            @endif
                                        @endif
                                    </li>
                                    <li class="flex items-center">
                                        <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                        <a href="#" wire:click="export('{{ $registro->fatura_da_uc }}')"
                                            class="hover:underline">
                                            Fatura da Unidade Consumidora
                                        </a>
                                        @if (!empty($registro->possuiProjeto))
                                            @if (empty($registro->validaDocumentos->where('documento', 'fatura_da_uc')->first()) ||
                                                    $registro->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                                    mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                                    {{ $registro->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $registro->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status->label }}
                                                </span>
                                            @endif
                                            @if ($registro->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id != 3)
                                                <button class="mx-2"
                                                    wire:click="validar('fatura_da_uc', {{ $registro->id }})">
                                                    Avaliar</button>
                                            @endif
                                        @endif
                                    </li>
                                    <li class="flex items-center">
                                        <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                        <a href="#" wire:click="export('{{ $registro->padrao_de_entrada }}')"
                                            class="hover:underline">
                                            Padrao de entrada
                                        </a>
                                        @if (!empty($registro->possuiProjeto))
                                            @if (empty($registro->validaDocumentos->where('documento', 'padrao_de_entrada')->first()) ||
                                                    $registro->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $registro->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $registro->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status->label }}
                                                </span>
                                            @endif
                                            @if ($registro->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status_id != 3)
                                                <button class="mx-2"
                                                    wire:click="validar('padrao_de_entrada', {{ $registro->id }})">
                                                    Avaliar</button>
                                            @endif
                                        @endif
                                    </li>
                                    <li class="flex items-center">
                                        <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                        <a href="#" wire:click="export('{{ $registro->datasheet }}')"
                                            class="hover:underline">
                                            Datasheet
                                        </a>
                                        @if (!empty($registro->possuiProjeto))
                                            @if (empty($registro->validaDocumentos->where('documento', 'datasheet')->first()) ||
                                                    $registro->validaDocumentos->where('documento', 'datasheet')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                                    mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                                    {{ $registro->validaDocumentos->where('documento', 'datasheet')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $registro->validaDocumentos->where('documento', 'datasheet')->first()->status->label }}
                                                </span>
                                            @endif
                                            @if ($registro->validaDocumentos->where('documento', 'datasheet')->first()->status_id != 3)
                                                <button class="mx-2"
                                                    wire:click="validar('datasheet', {{ $registro->id }})">
                                                    Avaliar</button>
                                            @endif
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full sm:w-1/2 my-2">
                                <div class="align-middle">
                                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                                        Informaçoes do modelo
                                    </h2>
                                    <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                        <li class="flex items-center">Disjuntor:
                                            {{ $registro->disjuntor->name }}
                                        </li>
                                        <li class="flex items-center">
                                            KWP: {{ $registro->kwp }}
                                        </li>
                                        <li class="flex items-center">
                                            fotovoltaico: {{ $registro->fotovoltaico }}
                                        </li>
                                        <li class="flex items-center">
                                            inversor: {{ $registro->inversor }}
                                        </li>
                                        <li class="flex items-center">
                                            @if (empty($registro->observacao))
                                                <x-icon name="exclamation"
                                                    class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                                Não possui observação
                                            @else
                                                <x-icon name="search"
                                                    class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                                <a href="#" wire:click="showObs('{{ $registro->observacao }}')">
                                                    Observacao
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        @if (empty($registro->possuiProjeto))
                            <button class="flex-auto text-primary text-center bg-secondary"
                                wire:click='trabalhar({{ $registro->id }})' wire:loading.attr="disabled">
                                Pegar o Trabalho {{ $registro->id }}</button>
                        @else
                            <p class="text-gray-500 "> Responsavel: {{ $registro->possuiProjeto->responsavel->name }}
                            </p>
                        @endif
                        @if ($registro->habilitaProjeto())
                            @if (empty($registro->dadosProject->first()))
                                <button label="Save" class="bg-primary w-32 rounded-xl"
                                    wire:click='InicioProjeto({{ $registro->possuiProjeto->id }}, {{ $registro->id }})'
                                    wire:loading.attr="disabled">
                                    Iniciar projeto
                                </button>
                                <p>Projeto id: {{ $registro->possuiProjeto->id }}, resgistro: {{ $registro->id }}</p>
                            @else
                                <button label="Save" class="bg-primary w-32"
                                    wire:click='viewProjeto({{ $registro->id }})'>
                                    ver detalhes
                                </button>
                            @endif
                        @else
                            <p>Verificar Documentos para iniciar</p>
                            @if (empty($registro->dadosProject->first()) && !empty($registro->possuiProjeto))
                                <button label="Save" class="bg-primary w-32 rounded-xl"
                                    wire:click='validarTodos({{ $registro->id }})'>
                                    Aprovar todos
                                </button>
                            @endif
                        @endif
                    </div>
                    <div wire:loading wire:target="trabalhar({{ $registro->id }})"
                        class="text-center text-primary font-extrabold ">
                        Aguarde carregando....
                    </div>
                </x-slot>
            </x-card>
        </div>
    @endforeach
</div>
