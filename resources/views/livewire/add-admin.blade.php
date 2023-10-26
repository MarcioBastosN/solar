<div>
    <section class="bg-white ">
        <div class="container w-full ">
            <div class="flex flex-wrap">

                <div class="w-full sm:w-1/2 ">
                    <div class="mx-2 my-2">
                        <p class="text-center font-semibold text-lg my-2">Cadastrar novo gerente</p>
                        <form wire:submit.prevent="save" class="w-full  p-4 shadow-xl bg-form_color rounded-lg">
                            <x-input label="Nome" placeholder="Nome" wire:model="name" />
                            <x-input label="e-mail" placeholder="E-mail" wire:model="email" />
                            <x-input label="Password" placeholder="Password" wire:model="password" type="password" />
                            <div class="flex mt-3">
                                <button type="submit"
                                    class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                                    border-2-secondary text-center shadow-xl ring-4 ring-white
                                    hover:bg-primary hover:text-secondary">
                                    Salvar
                                </button>
                            </div>
                        </form>
                        <div wire:loading wire:target="save" class="text-center text-primary font-extrabold ">
                            Aguarde carregando....
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 ">
                    <div class="w-full mx-auto px-2">
                        <input wire:model="search" type="search" placeholder="Procura email ou nome"
                            class="mt-2 block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                        text-sm text-primary bg-gray-400  border-0
                        border-b-2 border-white appearance-none
                        focus:outline-none focus:ring-0 focus:border-primary peer">
                    </div>
                    <div class="mx-2 my-2">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-primary ">
                                <thead class="text-xs text-primary uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">User</th>
                                        <th scope="col" class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="bg-white border-b hover:bg-gray-400 hover:text-white">
                                            <td class="px-6 py-4">
                                                <ul>
                                                    <li class="text-lg font-semibold">
                                                        {{ $user->name }}
                                                    </li>
                                                    <li>
                                                        {{ $user->email }}
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4">
                                                <button
                                                    class="block text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                                                    type="button" wire:click=''>
                                                    Açoes
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</div>
