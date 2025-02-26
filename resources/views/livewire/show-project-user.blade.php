<div>

    @if (!empty($pendencia))
        <div class="text-center my-16">
            <h3 class=" text-red-500 text-2xl">Ops! - perfil suspenso</h3>
            <p>Contate o responsavel para verificar suas pendencias!</p>
        </div>
    @else
        <section class="bg-white dark:bg-gray-600">
            <div class="container w-full mx-2 my-2">
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 ">
                        <div class="mx-2 my-2">
                            @foreach ($register as $item)
                                <div class="my-2">
                                    <x-card
                                        title="Registro: {{ $item->id }} -
                                        {{ $item->tipo_pessoa == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica' }} - {{ $item->created_at->format('d/m/Y') }}">

                                        <section class="bg-white ">
                                            <div class="container w-full mx-auto ">
                                                <div class="flex flex-wrap flex-col-reverse sm:flex-row">

                                                    <div class="w-full sm:w-1/2 ">
                                                        <h2 class="mb-2 text-lg font-semibold text-primary">
                                                            Arquivos enviados
                                                        </h2>
                                                        {{-- tabela --}}
                                                        @include('meus_modelos.tabela-arquivos')
                                                    </div>

                                                    <div class="w-full sm:w-1/2 ">
                                                        <h2 class="mb-2 text-lg font-semibold text-primary">
                                                            Informaçoes do modelo
                                                        </h2>
                                                        <ul class="max-w-md space-y-1 text-primary list-inside">
                                                            <li class="flex items-center">Corrente disjuntor:
                                                                {{ $item->corrente_disjuntor }}
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
                                                                    <a href="#"
                                                                        wire:click="showObs('{{ $item->observacao }}')">
                                                                        Observacao
                                                                    </a>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <x-slot name="footer">
                                            <div class="flex justify-between items-center">
                                                @if ($item->validaDocumentos->where('status_id', 2)->count() > 0)
                                                    <x-button label="Corrigir arquivos" flat negative
                                                        wire:click="paginaArquivosCliente({{ $item->id }})" />
                                                @endif
                                                @if (!$item->habilitaProjeto())
                                                    <span>Aguardando aprovação dos arquivos</span>
                                                @else
                                                    <button
                                                        class="bg-primary text-white hover:text-gray-400 hover:bg-primary w-32
                                                        font-semibold rounded-xl px-4 py-1"
                                                        wire:click="exbibeDetalhes({{ $item->id }})">
                                                        Detalhes
                                                    </button>
                                                @endif
                                            </div>
                                        </x-slot>
                                    </x-card>
                                </div>
                            @endforeach
                            {{ $register->links() }}
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 ">
                        <div class="mx-4 px-2 my-2">
                            @if (!$cardDetalhes && !$cardReenvio)
                                <div class="flex justify-center">
                                    <img src="{{ asset('LOGO PRIMARIA FUNDO TRANSPARENTE.svg') }}" alt=""
                                        class="w-64">
                                </div>
                                <p class="text-center font-bold text-primary">Selecione uma opção de detalhes!</p>
                                <p class="text-center text-primary text-sm">(detalhes) fica disponivel quando o
                                    projeto e aprovado!</p>
                            @endif
                            @if ($cardDetalhes)
                                @include('card_porjet_user.card_detalhes')
                            @endif
                            @if ($cardReenvio)
                                @include('card_porjet_user.card_form_reenvio')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

</div>
