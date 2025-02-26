<div>
    <div class="bg-white dark:bg-gray-600">
        <form wire:submit.prevent="save" class="max-w-xl mx-auto p-4 shadow-xl bg-form_color">
            <div class="max-w-xl mx-auto">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" wire:click="trocaStatus">
                    <div
                        class="w-14 h-7 bg-gray-300 dark:bg-gray-700 dark:border-gray-600
                        after:bg-white after:border-gray-300
                        peer-focus:outline-none peer-focus:ring-4
                        peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full
                        peer peer-checked:after:translate-x-full
                        peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px]
                        after:left-[2px]  after:border after:rounded-full after:h-6 after:w-6 after:transition-all
                        peer-checked:bg-primary ">
                    </div>
                    <span class="ml-3 text-md font-extrabold text-primary dark:text-primary">
                        {{ $exibir_empresa == false ? 'Cliente Pessoa Fisica' : 'Cliente Pessoa jurídica' }}</span>
                </label>
            </div>
            <div class=" max-w-xl mx-auto p-4">
                <ol class="relative text-gray-800 border-l border-gray-200 dark:border-gray-700 dark:text-gray-500">
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-900">
                            <x-icon name="phone" class="w-3.5 h-3.5" />
                        </span>
                        <h3 class="font-medium leading-tight">Contato</h3>
                        <p class="text-sm">informe o telefone para contato</p>
                        <div class="min-w-0 flex-1 py-0">
                            <div class="mt-2 text-gray-700">
                                <div class="relative">
                                    <x-inputs.maskable mask="(##) # ####-####" id="floating_filled"
                                        class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                    focus:ring-0 focus:border-blue-600 peer"
                                        placeholder="" wire:model.defer="telefone" />
                                    <label for="floating_filled"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400
                                        duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                        Telefone</label>
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="mt-2 text-gray-700">
                            <div class="relative">
                                <input type="text" id="nome_person"
                                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                    focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " wire:model="nome" />
                                <label for="nome_person"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400
                                    duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    {{ $exibir_empresa == false ? 'Nome Completo' : 'Razão social da empresa' }}
                                </label>
                            </div>
                            @error('nome')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                        </div>
                    </li>
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <x-icon name="archive" class="w-3.5 h-3.5" />
                        </span>
                        <h3 class="font-medium leading-tight">Documentos</h3>
                        <p class="text-sm">Arquivos diversos (foto ou
                            pdf) até 10Mb</p>
                        <div class="mt-2 text-gray-700  ">
                            <label
                                for="file_input_identificacao_pf_pj">{{ $exibir_empresa ? 'Contrato Social' : 'Identidade ou CNH' }}
                                (1 ou mais arquivos)
                            </label>
                            <input wire:model="identificacao_pf_pj" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input_identificacao_pf_pj" type="file"
                                multiple>
                            @error('identificacao_pf_pj')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror

                            <div wire:loading wire:target="identificacao_pf_pj">Uploading...</div>
                        </div>

                        <div class="mt-2 text-gray-700  ">
                            <label for="procuracao_input">Procuração autenticada (1 ou mais arquivos)</label>
                            <input wire:model="procuracao" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="procuracao_input_help" id="procuracao_input" type="file" multiple>
                            @error('procuracao')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="procuracao">Uploading...</div>
                        </div>

                        <div class="mt-2 text-gray-700  ">
                            <label for="uc_input">Fatura da uc geradora (1 ou mais arquivos)</label>
                            <input wire:model="fatura_da_uc" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="uc_input_help" id="uc_input" type="file" multiple>
                            @error('fatura_da_uc')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="fatura_da_uc">Uploading...</div>
                        </div>
                        {{--  --}}
                        @if ($exibir_empresa)
                            <div class="mt-2 text-gray-700  ">
                                <label for="cnh_socio">CNH Sócio</label>
                                <input wire:model="cnh_socio" accept="image/*,.pdf"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="cnh_socio_help" id="cnh_socio" type="file">
                                @error('cnh_socio')
                                    <span class="text-text_error">{{ $message }}</span>
                                @enderror
                                <div wire:loading wire:target="cnh_socio">Uploading...</div>
                            </div>
                        @endif

                        <div class="mt-2 text-gray-700  ">
                            <label for="fatura_beneficiaria">Fatura das beneficiarias (1 ou mais arquivos)</label>
                            <input wire:model="fatura_beneficiaria" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="fatura_beneficiaria_help" id="fatura_beneficiaria" type="file"
                                multiple>
                            @error('fatura_beneficiaria')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="fatura_beneficiaria">Uploading...</div>
                        </div>
                    </li>
                    {{--  --}}
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Informaçoes do Padão de Entrada Atual</h3>
                        <p class="text-sm">informe os detalhes </p>
                        <div class="mt-2 text-gray-700 flex flex-col gap-2">
                            @foreach ($dijuntores as $item)
                                <div class="flex items-center">
                                    <input id="default-radio-{{ $item->id }}" type="radio"
                                        wire:click="dijuntor({{ $item->id }})" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="default-radio-{{ $item->id }}"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-2 text-gray-700">
                            <div class="relative">
                                <input type="text" id="floating_corrente_disjuntor"
                                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                    focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " wire:model="corrente_disjuntor" />
                                <label for="floating_corrente_disjuntor"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400
                                    duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    CORRENTE DIJUNTOR</label>
                            </div>
                            @error('inversor')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                        </div>

                    </li>
                    {{--  --}}
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Informaçoes do Kit</h3>
                        <p class="text-sm">informe os detalhes, Arquivos diversos (foto ou
                            pdf) até 10Mb</p>
                        {{-- <div class="mt-2 text-gray-700">

                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select id="underline_select" wire:model="dijuntor_id"
                                class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                border-b-2 border-gray-300 appearance-none dark:text-white
                                dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                focus:ring-0 focus:border-blue-600
                                peer">
                                <option selected>Selecione ...</option>
                                @foreach ($dijuntores as $item)
                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('dijuntor_id')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mt-2 text-gray-700">
                            <div class="relative">
                                <input type="text" id="floating_kwp"
                                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                    focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " wire:model="kwp" />
                                <label for="floating_kwp"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400
                                    duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    POTENCIA DO KIT - KWP</label>
                            </div>
                            @error('kwp')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2 text-gray-700">
                            <div class="relative">
                                <input type="text" id="floating_fotovoltaico"
                                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                    focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " wire:model="fotovoltaico" />
                                <label for="floating_fotovoltaico"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400
                                    duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    MODELO DO MÓDULO FOTOVOLTAICO</label>
                            </div>
                            @error('fotovoltaico')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2 text-gray-700">
                            <div class="relative">
                                <input type="text" id="floating_inversor"
                                    class="block rounded-t-lg px-2.5 pb-1.5 pt-5 w-full
                                    text-sm text-gray-900 bg-primary-100 dark:bg-gray-700 border-0
                                    border-b-2 border-gray-300 appearance-none dark:text-white
                                    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                                    focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " wire:model="inversor" />
                                <label for="floating_inversor"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400
                                    duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5
                                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                    MODELO DO INVERSOR</label>
                            </div>
                            @error('inversor')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-2 text-gray-700  ">
                            <label for="datasheet_inversor">Datasheet do Inversor (1 ou mais arquivos)</label>
                            <input wire:model="datasheet_inversor" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="datasheet_help" id="datasheet_inversor" type="file" multiple>
                            @error('datasheet_inversor')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="datasheet_inversor">Uploading...</div>
                        </div>

                        <div class="mt-2 text-gray-700  ">
                            <label for="datasheet_modulo">Datasheet do Modulo (1 ou mais arquivos)</label>
                            <input wire:model="datasheet_modulo" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="datasheet_help" id="datasheet_modulo" type="file" multiple>
                            @error('datasheet_modulo')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="datasheet_modulo">Uploading...</div>
                        </div>
                    </li>
                    <li class="ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <x-icon name="check" class="w-3.5 h-3.5" />
                        </span>
                        <h3 class="font-medium leading-tight">Confirmação</h3>
                        <p class="text-sm">informe observações se houver</p>
                        <x-textarea wire:model="observacao" label="Notas" placeholder="Suas considerações" />
                        <div class="flex mt-3">
                            <button type="submit"
                                class="w-full bg-primary h-12 rounded-lg border-spacing-2
                                border-2-secondary text-center shadow-xl ring-4 ring-white
                             hover:text-white text-gray-300"
                                wire:loading.attr="disabled">
                                Salvar
                            </button>
                        </div>
                    </li>
                </ol>
                <div wire:loading wire:target="save" class="text-center text-primary font-extrabold ">
                    Aguarde carregando....
                </div>
            </div>
        </form>
    </div>
</div>
