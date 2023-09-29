<div>

    <div class="max-w-lg mx-auto px-2">
        <input wire:model="search" type="search" placeholder="Procura email ou nome"
            class="mt-2 block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
        text-sm text-primary bg-gray-400  border-0
        border-b-2 border-white appearance-none
        focus:outline-none focus:ring-0 focus:border-primary peer">
    </div>

    @foreach ($users as $user)
        {{-- @if ($user->roles->first()->name != 'admin') --}}
        <div class="mx-2 my-2">
            <div
                class="max-w-md mx-auto {{ empty($user->pendencia) ? 'bg-white text-primary' : 'bg-gray-400 text-white' }} rounded-xl shadow-md overflow-hidden md:max-w-2xl ">
                <div class="md:flex">

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

                    <div class="p-6 w-full">
                        <a href="#" class="block mt-1 text-lg leading-tight font-medium hover:underline">Id:
                            {{ $user->id }} - {{ $user->name }}</a>
                        <p class="mt-2">{{ $user->email }}</p>
                        <p>Cadastrado: {{ $user->created_at->format('d-m-Y') }}</p>
                    </div>

                    @if ($user->register->count() > 0)
                        <a href="#" wire:click='paginaDetalhes({{ $user->id }})'
                            class="w-full hover:bg-primary group ">
                            <div class="md:group-hover:text-white  group-hover:text-primary text-center align-middle">
                                <p class=" text-2xl scale-150 mt-8 ">
                                    {{ $user->register->count() }}
                                </p>
                                <p>
                                    <span>Projetos</span>
                                </p>
                            </div>
                        </a>
                    @else
                        <div class="w-full bg-white hover:bg-gray-400 group ">
                            <div class="group-hover:text-secondary text-center align-middle cursor-not-allowed">
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
        {{-- @endif --}}
    @endforeach
    <div class="max-w-lg mx-auto ">
        {{ $users->links() }}
    </div>
</div>
