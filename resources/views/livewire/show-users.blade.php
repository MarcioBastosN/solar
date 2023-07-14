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
                    <img class="h-48 w-full object-cover md:h-full md:w-48" src="/img/store.jpg"
                        alt="Man looking at item at a store">
                </div>
                <div class="p-6 w-full">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                        {{ !empty($user->roles->first()) ? $user->roles->first()->name : 'ops' }}</div>
                    <a href="#"
                        class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $user->name }}</a>
                    <p class="mt-2 text-gray-500">{{ $user->email }}</p>
                </div>
                <div class="w-full bg-primary-200">
                    <p class="text-center align-middle text-2xl scale-150 my-8">
                        {{ $user->register->count() }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
