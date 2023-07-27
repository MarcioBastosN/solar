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
                                <span
                                    class="mx-1 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aprovado</span>
                                <button class="mx-2">teste validar</button>
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->procuracao }}')"
                                    class="hover:underline">
                                    Procuração
                                </a>
                                <span
                                    class="mx-1 bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Revisar</span>
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->fatura_da_uc }}')"
                                    class="hover:underline">
                                    Fatura da Unidade Consumidora
                                </a>
                                <span
                                    class="mx-1 bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Revisar</span>
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->padrao_de_entrada }}')"
                                    class="hover:underline">
                                    Padrao de entrada
                                </a>
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Reprovado</span>
                            </li>
                            <li class="flex items-center">
                                <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                <a href="#" wire:click="export('{{ $item->datasheet }}')" class="hover:underline">
                                    Datasheet
                                </a>
                                <span
                                    class="mx-1 bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Revisar</span>
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
                            <p>Verificar Documntos e iniciar</p>
                        @endif
                        <x-button label="Save" class="bg-primary w-32" />
                    </div>
                </x-slot>
            </x-card>
        </div>
    @endforeach

</div>
