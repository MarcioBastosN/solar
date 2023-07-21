<div class="grid grid-cols-2">
    <div class="container mx-auto px-8 ">
        @foreach ($register as $item)
            <div class="bg-primary mt-2 box-border box-border-4">
                <p class="text-lg mt-2 ml-4">Registro: {{ $item->id }} -
                    {{ $item->tipo_pessoa == 'pf' ? 'Pessoa Fisica' : 'Pessoa Juridica' }}</p>
                <p class="ml-2">Documentos informados:</p>
                <ul class="text-secondary ml-2">
                    @if ($item->tipo_pessoa == 'pj')
                        @if (!empty($item->cnpj))
                            <li>CNPJ: {{ $item->cnpj }}</li>
                        @else
                            <li>CNPJ: Não informado</li>
                        @endif
                    @else
                        @if (!empty($item->rg_cnh))
                            <li>rg_cnh: {{ $item->rg_cnh }}</li>
                        @else
                            <li>rg_cnh: Não informado</li>
                        @endif
                    @endif
                    <li>Procuracao: {{ $item->procuracao ?? 'não informado' }}</li>
                    <li>Fatura da UC: {{ $item->fatura_da_uc ?? 'não informado' }}</li>
                    <li>Padrão de entrada: {{ $item->padrao_de_entrada ?? 'não informado' }}</li>
                    <li>Dijuntor: {{ $item->dijuntor ?? 'não informado' }}</li>
                    <li>kit - info: {{ $item->user_kit_id ?? 'não informado' }}</li>
                </ul>
                <hr>
                <button class="w-full my-2 rounded-md bg-primary_dark">
                    Ver detalhes
                </button>
            </div>
        @endforeach
    </div>
    <div class="container mx-auto px-8">
        <p>Detalhes</p>
    </div>
</div>
