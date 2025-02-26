<div>
    <section class="bg-white dark:bg-gray-600">
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
                                    hover:bg-primary hover:text-white">
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
                                                    type="button" wire:click='' data-modal-target="defaultModal"
                                                    data-modal-toggle="defaultModal">
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


    <div wire:ignore.self id="defaultModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Alterar a senha
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal" wire:click=''>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form wire:submit.prevent="save">

                        <div class="flex flex-col gap-2">
                            <input type="password" name="" wire:model='pwd'>
                            <input type="password" name="" wire:model='confirme_pwd'>
                        </div>

                        <input type="submit" value="Salvar"
                            class="w-full bg-primary rounded-lg m-2 py-2
                            text-white text-center text-lg font-semibold
                            transition delay-75 duration-300">
                    </form>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">

                    <button data-modal-hide="defaultModal" type="button"
                        class="text-gray-500 bg-white hover:bg-card_hover
                    focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg
                    border border-gray-200 text-sm font-medium px-5 py-2.5
                    hover:text-gray-900 focus:z-10 "
                        wire:click=''>Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
