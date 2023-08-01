<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="grid grid-cols-2 my-2 mx-4">
        <div>

            <div class="text-center">O projeto esta na fase de: {{ $projeto->dadosProject->last()->status->label }}
            </div>
            <form wire:submit.prevent="trocarFase"
                class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
                <select id="underline_select" wire:model="faseProjeto"
                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                border-b-2 border-gray-300 appearance-none dark:text-white
                                dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                focus:ring-0 focus:border-blue-600
                                peer">
                    <option selected>Selecione ...</option>
                    @foreach ($statusProjeto as $item)
                        <option value={{ $item->id }}>{{ $item->label }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                border-2-secondary text-center shadow-xl ring-4 ring-white
                hover:bg-primary hover:text-secondary my-2">Alterar
                    a fase</button>
            </form>
            <form wire:submit.prevent="save"
                class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="multiple_files" type="file" multiple>
                <x-textarea label="Anotaçoes" placeholder="Caso necessario informe algo" />
                <button type="submit"
                    class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                border-2-secondary text-center shadow-xl ring-4 ring-white
                hover:bg-primary hover:text-secondary my-2">Salvar</button>
            </form>
        </div>
        {{--  --}}
        <div>Detalhes</div>
    </div>
</div>
