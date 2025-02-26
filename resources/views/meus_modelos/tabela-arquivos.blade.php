<ul class="max-w-md space-y-1 text-primary list-inside ">
    {{-- pf - pj --}}
    <li class="flex items-center">
        <div class="flex flex-col">
            {{-- status e action --}}
            <div class="flex flex-row my-2">
                {{ $item->tipo_pessoa == 'pj' ? 'CNPJ' : 'RG ou CNH' }}
                @if (empty($item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()) ||
                        $item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id == 1)
                    <span class="bg-gray-300 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded mx-2">
                        Não visualizado
                    </span>
                @else
                    <span
                        class=" text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded mx-2
            {{ $item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ $item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status->label }}
                    </span>
                @endif

                @hasanyrole('admin')
                    @if ($item->validaDocumentos->where('documento', 'identificacao_pf_pj')->first()->status_id != 3)
                        <button class="mx-2" wire:click="validar('identificacao_pf_pj', {{ $item->id }})">
                            Avaliar</button>
                    @endif
                @endhasanyrole
            </div>
            {{-- arquivos --}}
            <div class="flex flex-row gap-2 bg-gray-300 rounded-md px-2">
                @foreach ($item->listRgCnh as $rg_cnh)
                    <div class="flex flex-row">
                        <a href="#" wire:click="export('{{ $rg_cnh->path }}')" class="hover:underline">
                            <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                            <span>doc-{{ $rg_cnh->id }}</span>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </li>
    {{-- procuracao --}}
    <li class="flex items-center">
        <div class="flex flex-col">
            <div class='flex flex-row my-2'>
                Procuração
                @if (empty($item->validaDocumentos->where('documento', 'procuracao')->first()) ||
                        $item->validaDocumentos->where('documento', 'procuracao')->first()->status_id == 1)
                    <span class="bg-gray-300 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2">
                        Não visualizado
                    </span>
                @else
                    <span
                        class=" text-primary text-xs font-mediummr-2 px-2.5 py-0.5 rounded  mx-2
            {{ $item->validaDocumentos->where('documento', 'procuracao')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ $item->validaDocumentos->where('documento', 'procuracao')->first()->status->label }}
                    </span>
                @endif
                @hasrole('admin')
                    @if ($item->validaDocumentos->where('documento', 'procuracao')->first()->status_id != 3)
                        <button class="mx-2" wire:click="validar('procuracao', {{ $item->id }})">
                            Avaliar</button>
                    @endif
                @endhasrole
            </div>
            {{--  --}}
            <div class="flex flex-row gap-2 bg-gray-300 rounded-md px-2">
                @foreach ($item->listProcuracao as $procuracao)
                    <div class="flex flex-row">
                        <a href="#" wire:click="export('{{ $procuracao->path }}')" class="hover:underline">
                            <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                            <span>doc-{{ $procuracao->id }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </li>
    {{-- fatura da uc --}}
    <li class="flex items-center">

        <div class="flex flex-col">
            <div class="flex flex-row my-2">
                Fatura da Unidade Consumidora
                @if (empty($item->validaDocumentos->where('documento', 'fatura_da_uc')->first()) ||
                        $item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id == 1)
                    <span class="bg-gray-300 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2">
                        Não visualizado
                    </span>
                @else
                    <span
                        class=" text-primary text-xs font-mediummr-2 px-2.5 py-0.5 rounded  mx-2
                {{ $item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ $item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status->label }}
                    </span>
                @endif
                @hasanyrole('admin')
                    @if ($item->validaDocumentos->where('documento', 'fatura_da_uc')->first()->status_id != 3)
                        <button class="mx-2" wire:click="validar('fatura_da_uc', {{ $item->id }})">
                            Avaliar</button>
                    @endif
                @endhasanyrole
            </div>

            <div class="flex flex-row gap-1 bg-gray-300 rounded-md px-2">
                @foreach ($item->listFaturas as $fatura)
                    <div class="flex flex-row">
                        <a href="#" wire:click="export('{{ $fatura->path }}')" class="hover:underline">
                            <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                            <span>doc-{{ $fatura->id }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>


    </li>
    {{-- fatura beneficiaria --}}
    <li class="flex items-center">

        <div class=" flex flex-col">
            <div class="flex flex-row my-2">
                Fatura Beneficiaria
                @if (empty($item->validaDocumentos->where('documento', 'fatura_beneficiaria')->first()) ||
                        $item->validaDocumentos->where('documento', 'fatura_beneficiaria')->first()->status_id == 1)
                    <span class="bg-gray-300 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2">
                        Não visualizado
                    </span>
                @else
                    <span
                        class=" text-primary text-xs font-mediummr-2 px-2.5 py-0.5 rounded  mx-2
            {{ $item->validaDocumentos->where('documento', 'fatura_beneficiaria')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ $item->validaDocumentos->where('documento', 'fatura_beneficiaria')->first()->status->label }}
                    </span>
                @endif
                @hasanyrole('admin')
                    @if ($item->validaDocumentos->where('documento', 'fatura_beneficiaria')->first()->status_id != 3)
                        <button class="mx-2" wire:click="validar('fatura_beneficiaria', {{ $item->id }})">
                            Avaliar</button>
                    @endif
                @endhasanyrole

            </div>

            <div class="flex flex-row gap-1 bg-gray-300 rounded-md px-2">
                @foreach ($item->listBeneficiaria as $fatura)
                    <div class="flex flex-row">
                        <a href="#" wire:click="export('{{ $fatura->path }}')" class="hover:underline">
                            <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                            <span>doc-{{ $fatura->id }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </li>
    {{-- datasheet inversor --}}
    <li class="flex items-center">
        <div class="flex flex-col">
            <div class="flex flex-row my-2">
                Datasheet Inversor
                @if (empty($item->validaDocumentos->where('documento', 'datasheet_inversor')->first()) ||
                        $item->validaDocumentos->where('documento', 'datasheet_inversor')->first()->status_id == 1)
                    <span class="bg-gray-300 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2">
                        Não visualizado
                    </span>
                @else
                    <span
                        class=" text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2
                {{ $item->validaDocumentos->where('documento', 'datasheet_inversor')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ $item->validaDocumentos->where('documento', 'datasheet_inversor')->first()->status->label }}
                    </span>
                @endif
                @hasanyrole('admin')
                    @if ($item->validaDocumentos->where('documento', 'datasheet_inversor')->first()->status_id != 3)
                        <button class="mx-2" wire:click="validar('datasheet_inversor', {{ $item->id }})">
                            Avaliar</button>
                    @endif
                @endhasanyrole
            </div>

            <div class="flex flex-row gap-1 bg-gray-300 rounded-md px-2">
                @foreach ($item->listDataSheetInversor as $inversor)
                    <div class="flex flex-row">
                        <a href="#" wire:click="export('{{ $inversor->path }}')" class="hover:underline">
                            <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                            <span>doc-{{ $inversor->id }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>


    </li>
    {{-- datasheet modulo --}}
    <li class="flex items-center">
        <div class="flex flex-col">
            <div class="flex flex-row my-2">
                Datasheet Modulo
                @if (empty($item->validaDocumentos->where('documento', 'datasheet_modulo')->first()) ||
                        $item->validaDocumentos->where('documento', 'datasheet_modulo')->first()->status_id == 1)
                    <span class="bg-gray-300 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2">
                        Não visualizado
                    </span>
                @else
                    <span
                        class=" text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded  mx-2
                    {{ $item->validaDocumentos->where('documento', 'datasheet_modulo')->first()->status_id == 2 ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ $item->validaDocumentos->where('documento', 'datasheet_modulo')->first()->status->label }}
                    </span>
                @endif
                @hasanyrole('admin')
                    @if ($item->validaDocumentos->where('documento', 'datasheet_modulo')->first()->status_id != 3)
                        <button class="mx-2" wire:click="validar('datasheet_modulo', {{ $item->id }})">
                            Avaliar</button>
                    @endif
                @endhasanyrole
            </div>

            <div class="flex flex-row gap-1 bg-gray-300 rounded-md px-2">
                @foreach ($item->listDataSheetModulo as $modulo)
                    <div class="flex flex-row">
                        <a href="#" wire:click="export('{{ $modulo->path }}')" class="hover:underline">
                            <x-icon name="download" class="w-3.5 h-3.5 text-primary dark:text-primary" />
                            <span>doc-{{ $modulo->id }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </li>
</ul>
