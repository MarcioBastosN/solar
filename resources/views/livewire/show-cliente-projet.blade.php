<div>
    @foreach ($projetos as $projeto)
        <div class="mt-2 ml-2 block max-w-sm p-6 bg-primary border border-gray-200 rounded-lg shadow-primary ">
            <div class="flex-auto bg-primary-500">
                <p> {{ $projeto->user->name }} - {{ $projeto->tipo_pessoa }}</p>
            </div>
            @if ($projeto->tipo_pessoa == 'pf')
                <span>RG/CNH</span>
                <img src="{{ asset('storage/' . $projeto->rg_cnh) }}" alt="" class="w-32">
                <a href="#">download</a>
            @else
                <span>CNPJ</span>
                <img src="{{ asset('storage/' . $projeto->cnpj) }}" alt="" class="w-32">
                <a href="#">download</a>
            @endif
            <p><b>{{ $projeto->statusRequest->status->label }}</b></p>
            <p><span>Registrado em:{{ $projeto->created_at->format('d/m/Y') }}</span></p>
            <p><span>Atualizado em:{{ $projeto->statusRequest->created_at->format('d/m/Y') }}</span></p>

            @if (empty($projeto->possuiProjeto))
                <button class="flex-auto text-primary text-center bg-secondary"
                    wire:click='trabalhar({{ $projeto->id }})'>Pegar
                    Trabalho</button>
            @else
                <p class="text-white "> Responsavel: {{ $projeto->possuiProjeto->responsavel->name }}</p>
                <p>Verificar Documntos e iniciar</p>
            @endif

        </div>
    @endforeach

</div>
