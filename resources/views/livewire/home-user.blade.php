<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="bg-white">
        <div class="max-w-xl mx-auto p-8">
            <form wire:submit.prevent="save">
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
                                            <x-input-label for="telefone" :value="__('telefone')" />
                                            <x-text-input id="telefone" class="block mt-1 w-full" type="text"
                                                name="telefone" :value="old('telefone')" required autofocus />
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
                                        <div class="mt-2 text-gray-700">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt nunc
                                                ipsum
                                                tempor purus vitae id. Morbi in vestibulum nec varius. Et diam cursus
                                                quis
                                                sed purus nam. Scelerisque amet elit non sit ut tincidunt condimentum.
                                                Nisl
                                                ultrices eu venenatis diam.</p>

                                            <input type="file" wire:model="photo">

                                            @if ($photo)
                                                Photo Preview:
                                                <img src="{{ $photo->temporaryUrl() }}" width="200" height="200">
                                            @endif

                                            @error('photo')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                            <div wire:loading wire:target="photo">Uploading...</div>

                                        </div>
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
                                            @foreach ($dijuntores as $item)
                                                <p>{{ $item->id }} - {{ $item->name }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>

    </div>
</div>
