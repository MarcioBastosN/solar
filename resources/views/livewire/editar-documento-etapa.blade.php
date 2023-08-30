<div>

    <section class="bg-white ">
        <div class="container w-full mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 my-2">
                    @forelse ($project->groupBy(function ($item) {
                        return $item->created_at->format('Y-m-d');}) as $dados)
                        <span class="text-sm text-gray-400">
                            Inseridos Dia: {{ $dados->first()->created_at->format('d/m/Y') }}
                        </span>
                        @foreach ($dados as $item)
                            <p class="my-2">
                                @if (empty($item->documento))
                                    Nota: {{ $item->notas }}
                                    @if ($idNota == $item->id && $exibeCampoEditarNota == true)
                                        <div class=" flex flex-auto items-center ">
                                            <input class="w-full" type="text" wire:model='valorNota'>
                                        </div>
                                    @endif
                                    @if (!$exibeCampoEditarNota)
                                        <button class="bg-primary rounded-lg text-white mx-2 px-1 my-1"
                                            wire:click='editarNota({{ $item->id }})'>Editar</button>

                                        <button class="bg-red-500 rounded-lg text-white mx-2 px-1 my-1"
                                            wire:click='infoApagarDocumento({{ $item->id }})'>Apagar</button>
                                    @else
                                        <button class="bg-primary rounded-lg text-white mx-2 px-1 my-1"
                                            wire:click='alteraNota'>Alterar</button>

                                        <button class="bg-red-500 rounded-lg text-white mx-2 px-1 my-1"
                                            wire:click='ocultarNota({{ $item->id }})'>Cancelar</button>
                                    @endif
                                @else
                                    <div class="flex flex-auto items-center">
                                        <span class="mx-1">Documento:</span>
                                        <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                                        <a href="#" wire:click="export('{{ $item->documento }}')"
                                            class="hover:underline">
                                            download doc-{{ $item->id }}
                                        </a>
                                        <button class="bg-red-500 rounded-lg text-white mx-2 px-1 my-1"
                                            wire:click='infoApagarDocumento({{ $item->id }})'>Apagar</button>
                                    </div>
                                @endif
                            </p>
                        @endforeach
                    @empty
                        <p>vazio</p>
                    @endforelse
                </div>
                <div class="w-full sm:w-1/2 my-2">
                    <div class="font-bold text-2xl text-primary flex-auto text-center">
                        Fase selecionada: {{ $status->label }}
                    </div>
                    <div>
                        Solicitante:
                        {{ $dadosProjeto->contratante->customer->name }}
                    </div>
                    <span>
                        E-mail: {{ $dadosProjeto->contratante->customer->email }}
                    </span>
                </div>
            </div>
        </div>
    </section>

</div>
