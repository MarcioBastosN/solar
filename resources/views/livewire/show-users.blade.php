<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="max-w-lg mx-auto ">
        <input wire:model="search" type="search" placeholder="Procura email..."
            class="mt-2 block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
        text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
        border-b-2 border-gray-300 appearance-none dark:text-white
        dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
        focus:ring-0 focus:border-blue-600 peer">
        <p>Lista de clientes registrados</p>
    </div>

    @foreach ($users as $user)
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-2">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    @if (empty($user->pendencia))
                        <x-icon name="emoji-sad" class="w-full h-12 hover:text-red-500"
                            wire:click='desativar({{ $user->id }})' />
                        <p>Desabilitar registro</p>
                    @else
                        <x-icon name="badge-check" class="w-full h-12 hover:bg-primary"
                            wire:click='ativar({{ $user->id }})' />
                        <p>Ativar registro</p>
                    @endif
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
                <a href="#" wire:click='paginaDetalhes({{ $user->id }})'
                    class="w-full bg-primary-200 hover:bg-primary">
                    <div>
                        <p class="text-center align-middle text-2xl scale-150 mt-8">
                            {{ $user->register->count() }}
                        </p>
                        <p class="text-center align-middle">
                            <span>Projetos</span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
