<div>
    @foreach ($projetos as $item)
        <div class="my-2 mx-4">
            <x-card
                title="Registro: {{ $item->id }} - {{ $item->user->name }} -
                {{ $item->tipo_pessoa == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica' }} -
                {{ $item->created_at->format('d/m/Y') }}">
                <div class="grid grid-cols-2">
                    <div>
                        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                            Arquivos recebidos
                        </h2>
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->identificacao_pf_pj }}')"
                                    class="hover:underline">
                                    {{ $item->tipo_pessoa == 'pj' ? 'CNPJ' : 'RG ou CNH' }}
                                </a>
                                @if (!empty($item->possuiProjeto))
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
                                    @endif
                                    @if ($item->validaDocumentos->where('documento', 'RG')->first()->status_id != 3)
                                        <button class="mx-2" wire:click="validar('Rg', {{ $item->id }})">
                                            Avaliar</button>
                                    @endif
                                @endif
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->procuracao }}')"
                                    class="hover:underline">
                                    Procuração
                                </a>
                                @if (!empty($item->possuiProjeto))
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
                                    @endif
                                    @if ($item->validaDocumentos->where('documento', 'Procuracao')->first()->status_id != 3)
                                        <button class="mx-2" wire:click="validar('Procuracao', {{ $item->id }})">
                                            Avaliar</button>
                                    @endif
                                @endif
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->fatura_da_uc }}')"
                                    class="hover:underline">
                                    Fatura da Unidade Consumidora
                                </a>
                                @if (!empty($item->possuiProjeto))
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
                                    @endif
                                    @if ($item->validaDocumentos->where('documento', 'Fatura')->first()->status_id != 3)
                                        <button class="mx-2" wire:click="validar('Fatura', {{ $item->id }})">
                                            Avaliar</button>
                                    @endif
                                @endif
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->padrao_de_entrada }}')"
                                    class="hover:underline">
                                    Padrao de entrada
                                </a>
                                @if (!empty($item->possuiProjeto))
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
                                    @endif
                                    @if ($item->validaDocumentos->where('documento', 'Padrao')->first()->status_id != 3)
                                        <button class="mx-2" wire:click="validar('Padrao', {{ $item->id }})">
                                            Avaliar</button>
                                    @endif
                                @endif
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->datasheet }}')"
                                    class="hover:underline">
                                    Datasheet
                                </a>
                                @if (!empty($item->possuiProjeto))
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
                                    @endif
                                    @if ($item->validaDocumentos->where('documento', 'Datasheet')->first()->status_id != 3)
                                        <button class="mx-2" wire:click="validar('Datasheet', {{ $item->id }})">
                                            Avaliar</button>
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
                                    <x-icon name="exclamation" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                    Não possui observação
                                @else
                                    <x-icon name="search" class="w-3.5 h-3.5 text-primary dark:text-primary" />
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
                        @if (empty($item->possuiProjeto))
                            <button class="flex-auto text-primary text-center bg-secondary"
                                wire:click='trabalhar({{ $item->id }})'>Pegar
                                Trabalho</button>
                        @else
                            <p class="text-gray-500 "> Responsavel: {{ $item->possuiProjeto->responsavel->name }}</p>
                        @endif
                        @if ($item->habilitaProjeto())
                            <x-button label="Save" class="bg-primary w-32" wire:click='' />
                        @else
                            <p>Verificar Documentos para iniciar</p>
                        @endif
                    </div>
                </x-slot>
            </x-card>
        </div>
    @endforeach
</div>
