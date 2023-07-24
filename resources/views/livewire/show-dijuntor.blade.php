<div>
    <div class="grid grid-cols-2 py-4  my-4">
        <div class="mx-2">
            <form wire:submit.prevent="save" class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
                <x-input label="Informe o nome do Disjuntor" placeholder="informe o nome do disjuntor" wire:model="name" />
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
        <div class="mx-2">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disjuntores as $disjuntor)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $disjuntor->name }}</td>
                                <td class="px-6 py-4">açao</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
