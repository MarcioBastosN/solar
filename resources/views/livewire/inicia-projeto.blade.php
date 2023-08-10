<div>
    <section class="bg-white">
        <div class="container w-full ">
            <div class="flex flex-wrap">
                {{-- esquerda --}}
                <div class="sm:w-1/2 mx-auto px-4">
                    <div class="text-center text-xl mx-2">
                        A fase atual do seu projeto é: <br />
                        {{ $projeto->dadosProject->last()->status->label }}
                    </div>
                    <div class="text-center text-md mx-2">
                        Você esta Trabalhando no projeto de: {{ $projeto->user->name }}
                    </div>
                    <form wire:submit.prevent="trocarFase"
                        class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark rounded-xl my-1">
                        <select id="underline_select" wire:model="faseProjeto"
                            class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                        text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                        border-b-2 border-gray-300 appearance-none dark:text-white
                                        dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                        focus:ring-0 focus:border-blue-600
                                        peer">
                            <option selected>Selecione ...</option>
                            @foreach ($statusProjeto as $item)
                                <option value={{ $item->id }}>{{ $item->label }}</option>
                            @endforeach
                        </select>
                        @error('faseProjeto')
                            <span class="text-text_error">{{ $message }}</span>
                        @enderror
                        <button type="submit"
                            class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                        border-2-secondary text-center shadow-xl ring-4 ring-white
                        hover:bg-primary hover:text-secondary my-2">
                            Alterar a fase</button>
                    </form>
                    <form wire:submit.prevent="novoRegistro"
                        class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
                        <div class="text-primary text-center text-xl mb-2">
                            <p>
                                Fase: {{ $projeto->dadosProject->last()->status->label }}
                            </p>
                        </div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="multiple_files" multiple wire:model="documento" type="file" accept="image/*,.pdf">
                        @error('documento.*')
                            <span class="text-text_error">{{ $message }}</span>
                        @enderror

                        <div wire:loading wire:target="documento">Uploading...</div>

                        <x-textarea label="Anotaçoes" placeholder="Caso necessario informe algo" wire:model="obs" />
                        <button type="submit"
                            class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                        border-2-secondary text-center shadow-xl ring-4 ring-white
                        hover:bg-primary hover:text-secondary my-2">Salvar</button>
                    </form>
                </div>
                {{-- direita --}}
                <div class="sm:w-1/2 mx-auto px-8">
                    <p class="text-center text-2xl text-primary">
                        Detalhes
                    </p>
                    @foreach ($statusProjeto as $item)
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">
                            <li class="mb-10 ml-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                    <x-icon name="archive" class="w-5 h-5" />
                                </span>
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $item->label }}
                                </h3>
                                @foreach ($dados->where('status_project_id', $item->id)->groupBy(function ($item) {
        return $item->created_at->format('Y-m-d');
    }) as $itemData)
                                    <time
                                        class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                        Dia: {{ $itemData->first()->created_at->format('d-m-Y') }}</time>
                                    <div
                                        class=" bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-2 group/item">
                                        <div class="md:flex hover:bg-gray-200 py-2">
                                            <div class="flex-auto px-4 ">
                                                @foreach ($itemData as $item)
                                                    @if (!empty($item['documento']))
                                                        <button wire:click="filedownload('{{ $item['documento'] }}')"
                                                            type="button"
                                                            class="text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none
                                                                focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 my-1 text-center inline-flex
                                                                items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            <x-icon name="cloud-download" class="w-5 h-5" /> dowload
                                                        </button>
                                                    @endif
                                                    @if (!empty($item['notas']))
                                                        <p>Nota: {{ $item['notas'] }}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="flex-auto text-end mx-4 my-auto">
                                                <a class="group/edit invisible hover:bg-primary group-hover/item:visible px-4 py-2 rounded-lg"
                                                    href="#"
                                                    wire:click="editarDocumentos({{ $item->projects_id }}, {{ $item->status_project_id }})">
                                                    <span class="group-hover/edit:text-gray-900">Editar</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        </ol>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
