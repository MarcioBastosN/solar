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
                                            @if (empty($item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status->label }}
                                                </span>
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
                                            @if (empty($item->validaDocumentos->where('documento', 'procuracao')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'procuracao')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'procuracao')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'procuracao')->first()->status->label }}
                                                </span>
                                            @endif
                                        </li>
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->fatura_da_uc }}')"
                                                class="hover:underline">
                                                Fatura da Unidade Consumidora
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'fatura_da_uc')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status->label }}
                                                </span>
                                            @endif
                                        </li>
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->padrao_de_entrada }}')"
                                                class="hover:underline">
                                                Padrao de entrada
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'padrao_de_entrada')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'padrao_de_entrada')->first()->status->label }}
                                                </span>
                                            @endif
                                        </li>
                                        <li class="flex items-center">
                                            <x-icon name="download"
                                                class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                            <a href="#" wire:click="export('{{ $item->datasheet }}')"
                                                class="hover:underline">
                                                Datasheet
                                            </a>
                                            @if (empty($item->validaDocumentos->where('documento', 'datasheet')->first()) ||
                                                    $item->validaDocumentos->where('documento', 'datasheet')->first()->status_id == 1)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2">
                                                    Não visualizado
                                                </span>
                                            @else
                                                <span
                                                    class=" text-gray-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mx-2
                                            {{ $item->validaDocumentos->where('documento', 'datasheet')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                                                    {{ $item->validaDocumentos->where('documento', 'datasheet')->first()->status->label }}
                                                </span>
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
                                    @if ($item->validaDocumentos->where('status_id', 2)->count() > 0)
                                        <x-button label="Corrigir arquivos" flat negative
                                            wire:click="paginaArquivosCliente({{ $item->id }})" />
                                    @endif
                                    <x-button label="Detalhes" class="bg-primary w-32"
                                        wire:click="exbibeDetalhes({{ $item->id }})" />
                                </div>
                            </x-slot>
                        </x-card>
                    </div>
                @endforeach
                {{ $register->links() }}
            </div>
            {{-- grid-2 --}}
            {{-- exibe o grid correspondente a ação --}}
            <div class="mx-8 px-8">
                @if (!$cardDetalhes && !$cardReenvio)
                    <p>Selecione uma ação para exibir!</p>
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        <li>Corrigir arquivos</li>
                        <li>Detalhes</li>
                    </ol>
                @endif
                @if ($cardDetalhes)
                    @include('card_porjet_user.card_detalhes')
                @endif
                @if ($cardReenvio)
                    @include('card_porjet_user.card_form_reenvio')
                @endif
            </div>
        </div>
    @endif

</div>
