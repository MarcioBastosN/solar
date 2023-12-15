<div>
    @foreach ($registros as $item)
        <div class="my-2 mx-2">
            <x-card
                title="Registro: {{ $item->id }} - {{ $item->user->name }} -
                {{-- contato - {{ $item->telefone }} - --}}
                {{ $item->tipo_pessoa == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica' }} -
                {{ $item->created_at->format('d/m/Y') }}">

                <div class="bg-white">
                    <div class="container max-w-5xl mx-2">
                        <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                            <div class="w-full sm:w-1/2 my-2">

                                <h2 class="mb-2 text-lg font-semibold text-primary ">
                                    Arquivos recebidos
                                </h2>
                                @include('meus_modelos.tabela-arquivos')
                            </div>
                            <div class="w-full sm:w-1/2 my-2">
                                <div class="align-middle">
                                    <h2 class="mb-2 text-lg font-semibold text-primary">
                                        Informaçoes do modelo
                                    </h2>
                                    <ul class="max-w-md space-y-1 text-gray-400 list-inside">
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
                                                <x-icon name="exclamation" class="w-3.5 h-3.5 text-primary" />
                                                Não possui observação
                                            @else
                                                <x-icon name="search" class="w-3.5 h-3.5 text-primary " />
                                                <a href="#" wire:click="showObs('{{ $item->observacao }}')">
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
                        @if (empty($item->possuiProjeto))
                            <button class="flex-auto text-gray-200 text-center bg-primary rounded-md mx-4 py-2 text-lg"
                                wire:click='trabalhar({{ $item->id }})' wire:loading.attr="disabled">
                                Pegar o Trabalho</button>
                        @else
                            <p class="text-gray-400 "> Responsavel: {{ $item->possuiProjeto->responsavel->name }}
                            </p>
                        @endif
                        @if ($item->habilitaProjeto())
                            @if (empty($item->dadosProject->first()))
                                <button label="Save" class="bg-primary text-white rounded-md px-4 py-1 text-lg"
                                    wire:click='InicioProjeto({{ $item->possuiProjeto->id }}, {{ $item->id }})'
                                    wire:loading.attr="disabled">
                                    Iniciar projeto
                                </button>
                                <p>Projeto id: {{ $item->possuiProjeto->id }}, resgistro: {{ $item->id }}</p>
                            @else
                                <button label="Save" class="bg-primary text-white rounded-lg text-md w-32"
                                    wire:click='viewProjeto({{ $item->id }})'>
                                    ver detalhes
                                </button>
                            @endif
                        @else
                            <p>Verificar Documentos para iniciar</p>
                            @if (empty($item->dadosProject->first()) && !empty($item->possuiProjeto))
                                <button label="Save" class="bg-primary text-white w-32 rounded-lg"
                                    wire:click='validarTodos({{ $item->id }})'>
                                    Aprovar todos
                                </button>
                            @endif
                        @endif
                    </div>
                    <div wire:loading wire:target="trabalhar({{ $item->id }})"
                        class="text-center text-primary font-extrabold ">
                        Aguarde carregando....
                    </div>
                </x-slot>
            </x-card>
        </div>
    @endforeach
</div>
