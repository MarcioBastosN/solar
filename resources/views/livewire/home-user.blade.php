<div>
    <div class="bg-white">
        <form wire:submit.prevent="save" class="max-w-xl mx-auto p-4 shadow-xl bg-primary-50">
            <div class="max-w-xl mx-auto p-4">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" wire:click="trocaStatus">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4
                        peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full
                        peer dark:bg-gray-700 peer-checked:after:translate-x-full
                        peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px]
                        after:left-[2px] after:bg-white after:border-gray-300 after:border
                        after:rounded-full after:h-5 after:w-5 after:transition-all
                        dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ $exibir_empresa == false ? 'Sou um pessoa' : 'Sou uma empresa' }}</span>
                </label>
            </div>
            <div class="max-w-xl mx-auto p-4">
                <div class="flow-root">
                    <ul class="-mb-8">
                        {{-- step 1 --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex items-start space-x-3">
                                    <div>
                                        <div class="relative px-1">
                                            <div
                                                class="h-8 w-8 bg-blue-500 rounded-full ring-8 ring-white flex items-center justify-center">
                                                <svg class="text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1 py-0">
                                        <div class="text-md text-primary">
                                            <div>
                                                <a href="#" class="font-medium text-primary mr-2">Step 1</a>
                                                <a href="#"
                                                    class="my-0.5 relative inline-flex items-center bg-white rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                                                    <div
                                                        class="absolute flex-shrink-0 flex items-center justify-center">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="ml-3.5 font-medium text-primary">Contato</div>
                                                </a>
                                            </div>
                                            <span class="whitespace-nowrap text-sm">Complete seus dados</span>
                                        </div>
                                        <div class="mt-2 text-gray-700">
                                            <div class="relative">
                                                <input type="text" id="floating_filled"
                                                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                                    focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " wire:model="telefone" />
                                                <label for="floating_filled"
                                                    class="absolute text-sm text-gray-500 dark:text-gray-400
                                                    duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                                    Telefone</label>
                                            </div>
                                            @error('telefone')
                                                <span class="text-text_error">{{ $message }}</span>
                                            @enderror
                                            {{-- uploads --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- step 2 --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex items-start space-x-3">
                                    <div>
                                        <div class="relative px-1">
                                            <div
                                                class="h-8 w-8 bg-blue-500 rounded-full ring-8 ring-white flex items-center justify-center">
                                                <svg class="text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1 py-0">
                                        <div class="text-md text-primary">
                                            <div>
                                                <a href="#" class="font-medium text-primary mr-2">Step 2</a>

                                                <a href="#"
                                                    class="my-0.5 relative inline-flex items-center bg-white rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                                                    <div
                                                        class="absolute flex-shrink-0 flex items-center justify-center">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="ml-3.5 font-medium text-primary">Documentos</div>
                                                </a>
                                            </div>
                                            <span class="whitespace-nowrap text-sm">arquivos diversos</span>
                                        </div>
                                        @if ($exibir_empresa)
                                            <div class="mt-2 text-gray-700  ">
                                                <label for="file_input_cnpj">CONTRATO SOCIAL (CASO TITULAR SEJA CNPJ)
                                                </label>
                                                <input wire:model="cnpj" accept="image/*,.pdf"
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                    aria-describedby="file_input_help" id="file_input_cnpj"
                                                    type="file">
                                                @error('cnpj')
                                                    <br>
                                                    <span class="text-text_error">{{ $message }}</span>
                                                @enderror

                                                <div wire:loading wire:target="cnpj">Uploading...</div>
                                            </div>
                                        @else
                                            <div class="mt-2 text-gray-700  ">
                                                <label for="file_input">Identidade ou CNH</label>
                                                <input wire:model="rg_cnh" accept="image/*,.pdf"
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                    aria-describedby="file_input_help" id="file_input" type="file">
                                                @error('rg_cnh')
                                                    <br>
                                                    <span class="text-text_error">{{ $message }}</span>
                                                @enderror

                                                <div wire:loading wire:target="rg_cnh">Uploading...</div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- step 3 --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex items-start space-x-3">
                                    <div>
                                        <div class="relative px-1">
                                            <div
                                                class="h-8 w-8 bg-blue-500 rounded-full ring-8 ring-white flex items-center justify-center">
                                                <svg class="text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1 py-0">
                                        <div class="text-md text-primary">
                                            <div>
                                                <a href="#" class="font-medium text-primary mr-2">Step 3</a>

                                                <a href="#"
                                                    class="my-0.5 relative inline-flex items-center bg-white rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                                                    <div
                                                        class="absolute flex-shrink-0 flex items-center justify-center">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="ml-3.5 font-medium text-gray-900">Kit</div>
                                                </a>
                                            </div>
                                            <span class="whitespace-nowrap text-sm">Se ja possuir um Kit</span>
                                        </div>
                                        <div class="mt-2 text-gray-700">
                                            {{-- entradas --}}
                                            <label for="underline_select" class="sr-only">Underline select</label>
                                            <select id="underline_select" wire:model="kit_id"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent
                                                border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400
                                                dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200
                                                peer">
                                                <option selected>Choose ...</option>
                                                @foreach ($dijuntores as $item)
                                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex">
                <button type="submit"
                    class="w-full bg-primary-200 h-8 rounded-lg border-spacing-1 border-l-secondary text-center shadow-xl hover:bg-primary hover:text-secondary">
                    Slavar
                </button>
            </div>

        </form>

    </div>
</div>
