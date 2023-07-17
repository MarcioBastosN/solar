<div>
    @foreach ($projetos as $projeto)
        <div class="mt-2 ml-2 block max-w-sm p-6 bg-primary-100 border border-gray-200 rounded-lg shadow-primary ">
            <div class="flex-auto bg-primary-500">
                <p> {{ $projeto->user->name }} - {{ $projeto->tipo_pessoa }}</p>
            </div>
            {{-- <p class="font-normal text-gray-700 dark:text-gray-400">{{ $projeto }}</p> --}}
            @if ($projeto->tipo_pessoa == 'pf')
                <span>RG/CNH</span>
                <img src="{{ asset('storage/' . $projeto->rg_cnh) }}" alt="" class="w-32">
                <a href="#">download</a>
            @else
                <span>CNPJ</span>
                <img src="{{ asset('storage/' . $projeto->cnpj) }}" alt="" class="w-32">
                <a href="#">download</a>
            @endif
            {{--
                'fatura_da_uc',
            'padrao_de_entrada',
            'dijuntor_id',
            'user_kit_id',
            --}}
        </div>
    @endforeach

</div>
