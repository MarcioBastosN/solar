@foreach ($statusProjeto as $item)
    <ol class="relative border-l border-gray-400 ">
        <li class="mb-10 ml-6">
            <span
                class="absolute flex items-center justify-center w-6 h-6
                bg-primary rounded-full -left-3 ring-8 ring-gray-200 text-white">
                <x-icon name="archive" class="w-5 h-5" />
            </span>
            <h3 class="flex items-center mb-1 text-lg font-semibold text-primary ">
                {{ $item->label }}
            </h3>
            @foreach ($projeto->registrosValidos->where('status_project_id', $item->id)->groupBy(function ($item) {
        return $item->created_at->format('Y-m-d');
    }) as $itemData)
                <time class="block mb-2 text-sm font-normal leading-none text-gray-500">
                    Inicio: {{ $itemData->first()->created_at->format('d-m-Y') }}</time>
                <div class=" bg-gray-100 rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-2 group/item">
                    <div class="md:flex hover:bg-gray-200 py-2">
                        <div class="flex-auto px-4 ">
                            @foreach ($itemData as $item)
                                @if (!empty($item['documento']))
                                    <button wire:click="filedownload('{{ $item['documento'] }}')" type="button"
                                        class="text-white bg-primary focus:ring-2 focus:outline-none
                                                                focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2 my-1 text-center inline-flex
                                                                items-center mr-2 ">
                                        <x-icon name="cloud-download" class="w-5 h-5" /> dowload
                                    </button>
                                @endif
                                @if (!empty($item['notas']))
                                    <p>Nota: {{ $item['notas'] }}</p>
                                @endif
                            @endforeach
                        </div>
                        {{-- <div class="flex-auto text-end mx-4 my-auto">
                            <a class="group/edit invisible hover:bg-primary group-hover/item:visible px-4 py-2 rounded-lg"
                                href="#"
                                wire:click="editarDocumentos({{ $item->projects_id }}, {{ $item->status_project_id }})">
                                <span class="group-hover/edit:text-gray-900">Editar</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </li>
    </ol>
@endforeach
