<div>

    <form wire:submit.prevent="save" class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
        <x-input label="Disjuntor" placeholder="informe o nome do disjuntor" wire:model="name" />
        <div class="flex mt-3">
            <button type="submit"
                class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                border-2-secondary text-center shadow-xl ring-4 ring-white
                hover:bg-primary hover:text-secondary">
                Salvar
            </button>
        </div>
    </form>

    <p>exibe os disjuntores</p>
    @foreach ($disjuntores as $disjuntor)
        <p>{{ $disjuntor->name }}</p>
    @endforeach
</div>
