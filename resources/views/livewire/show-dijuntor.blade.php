<div>
    <section class="bg-white ">
        <div class="container w-full ">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 ">
                    <div class="mx-2 my-2">
                        <form wire:submit.prevent="save" class="w-full  p-4 shadow-xl bg-form_color rounded-lg">
                            <x-input label="Informe o nome do Disjuntor" placeholder="informe o nome do disjuntor"
                                wire:model="name" />
                            <div class="flex mt-3">
                                <button type="submit"
                                    class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                                    border-2-secondary text-center shadow-xl ring-4 ring-white
                                    hover:bg-primary hover:text-secondary">
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 ">
                    <div class="mx-2 my-2">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-primary ">
                                <thead class="text-xs text-primary uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disjuntores as $disjuntor)
                                        <tr class="bg-white border-b ">
                                            <td class="px-6 py-4">{{ $disjuntor->name }}</td>
                                            <td class="px-6 py-4">açao</td>
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
