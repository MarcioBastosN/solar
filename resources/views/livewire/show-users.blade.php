<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <input wire:model="search" type="search" placeholder="Search users..." class="bg-primary bg-opacity-70 ">
    <p>Lista de clientes registrados</p>

    @foreach ($users as $user)
        {{-- <p>{{ $user->name }} - {{ $user->email }} - Level
            {{ !empty($user->roles->first()) ? $user->roles->first()->name : 'ops' }}</p> --}}
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:h-full md:w-48" src="/img/store.jpg"
                        alt="Man looking at item at a store">
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                        {{ !empty($user->roles->first()) ? $user->roles->first()->name : 'ops' }}</div>
                    <a href="#"
                        class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $user->name }}</a>
                    <p class="mt-2 text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
