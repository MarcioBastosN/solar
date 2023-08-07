<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="max-w-lg mx-auto ">
        <input wire:model="search" type="search" placeholder="Procura email ou nome"
            class="mt-2 block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
        text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
        border-b-2 border-gray-300 appearance-none dark:text-white
        dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
        focus:ring-0 focus:border-blue-600 peer">
        {{-- <p>Lista de clientes registrados</p> --}}
    </div>

    @foreach ($users as $user)
        <div class="mx-2 my-2">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl ">
                <div class="md:flex">
                    {{-- esquerda --}}
                    <div class="w-full p-6 group ">
                        <div class="text-center align-middle">
                            @if (empty($user->pendencia))
                                <div class="group-hover:text-red-500 cursor-pointer">
                                    <x-icon name="emoji-sad" class="w-full h-12"
                                        wire:click='desativar({{ $user->id }})' />
                                    <p>Desabilitar registro</p>
                                </div>
                            @else
                                <div class="group-hover:text-white group-hover:bg-primary rounded-xl cursor-pointer">
                                    <x-icon name="badge-check" class="w-full h-12 "
                                        wire:click='ativar({{ $user->id }})' />
                                    <p>Ativar registro</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- centro --}}
                    <div class="p-6 w-full">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                            {{ !empty($user->roles->first()) ? $user->roles->first()->name : 'ops' }}</div>
                        <a href="#"
                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $user->name }}</a>
                        <p class="mt-2 text-gray-500">{{ $user->email }}</p>
                    </div>
                    {{-- direita --}}
                    @if ($user->register->count() > 0)
                        <a href="#" wire:click='paginaDetalhes({{ $user->id }})'
                            class="w-full bg-primary-200 hover:bg-primary group ">
                            <div class="group-hover:text-white text-center align-middle">
                                <p class=" text-2xl scale-150 mt-8 ">
                                    {{ $user->register->count() }}
                                </p>
                                <p>
                                    <span>Projetos</span>
                                </p>
                            </div>
                        </a>
                    @else
                        <div class="w-full bg-primary-200 hover:bg-gray-400 group ">
                            <div class="group-hover:text-white text-center align-middle cursor-not-allowed">
                                <p class=" text-2xl scale-150 mt-8 ">
                                    {{ $user->register->count() }}
                                </p>
                                <p>
                                    <span>Projetos</span>
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endforeach
    <div class="max-w-lg mx-auto ">
        {{ $users->links() }}
    </div>
</div>
