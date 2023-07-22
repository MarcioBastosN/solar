<div>
    <div class="bg-white">
        <form wire:submit.prevent="save" class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
            <div class="max-w-xl mx-auto">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" wire:click="trocaStatus">
                    <div
                        class="w-14 h-7 bg-secondary_dark dark:bg-gray-700 dark:border-gray-600
                        after:bg-white after:border-gray-300
                        peer-focus:outline-none peer-focus:ring-4
                        peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full
                        peer peer-checked:after:translate-x-full
                        peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px]
                        after:left-[2px]  after:border after:rounded-full after:h-6 after:w-6 after:transition-all
                        peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-md font-extrabold text-primary dark:text-primary">
                        {{ $exibir_empresa == false ? 'Sou uma Pessoa' : 'Sou Empresa' }}</span>
                </label>
            </div>
            <div class=" max-w-xl mx-auto p-4">
                <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-900">
                            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                            </svg>
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
                                {{-- @error('telefone')
                                    <span class="text-text_error">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                    </li>
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Documentos</h3>
                        <p class="text-sm">Arquivos diversos (foto ou
                            pdf) até 1Mb</p>
                        @if ($exibir_empresa)
                            <div class="mt-2 text-gray-700  ">
                                <label for="file_input_cnpj">CONTRATO SOCIAL (CASO TITULAR SEJA CNPJ)
                                </label>
                                <input wire:model="cnpj" accept="image/*,.pdf"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input_cnpj" type="file">
                                @error('cnpj')
                                    <span class="text-text_error">{{ $message }}</span>
                                @enderror

                                <div wire:loading wire:target="cnpj">Uploading...</div>
                            </div>
                        @else
                            <div class="mt-2 text-gray-700  ">
                                <label for="file_input">Identidade ou CNH</label>
                                <input wire:model="rg_cnh" accept="image/*,.pdf"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file">
                                @error('rg_cnh')
                                    <span class="text-text_error">{{ $message }}</span>
                                @enderror
                                <div wire:loading wire:target="rg_cnh">Uploading...</div>
                            </div>
                        @endif
                        <div class="mt-2 text-gray-700  ">
                            <label for="procuracao_input">Procuração autenticada</label>
                            <input wire:model="procuracao" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="procuracao_input_help" id="procuracao_input" type="file">
                            @error('procuracao')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="procuracao">Uploading...</div>
                        </div>

                        <div class="mt-2 text-gray-700  ">
                            <label for="uc_input">Fatura da uc geradora</label>
                            <input wire:model="fatura_da_uc" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="uc_input_help" id="uc_input" type="file">
                            @error('fatura_da_uc')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="fatura_da_uc">Uploading...</div>
                        </div>

                        <div class="mt-2 text-gray-700  ">
                            <label for="entrada_input">Foto do padrão de entrada</label>
                            <input wire:model="padrao_de_entrada" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="entrada_input_help" id="entrada_input" type="file">
                            @error('padrao_de_entrada')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="padrao_de_entrada">Uploading...</div>
                        </div>
                    </li>
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
                        <p class="text-sm">informe os detalhes</p>
                        <div class="mt-2 text-gray-700">

                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select id="underline_select" wire:model="kit_id"
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
                        </div>

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
                            <label for="datasheet">Padrao de entrada</label>
                            <input wire:model="datasheet" accept="image/*,.pdf"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                            cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="datasheet_help" id="datasheet" type="file">
                            @error('datasheet')
                                <span class="text-text_error">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="datasheet">Uploading...</div>
                        </div>
                    </li>
                    <li class="ml-6">
                        <span
                            class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">Confirmation</h3>
                        <p class="text-sm">Step details here</p>
                        <div class="flex mt-3">
                            <button type="submit"
                                class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                                border-2-secondary text-center shadow-xl ring-4 ring-white
                                hover:bg-primary hover:text-secondary">
                                Salvar
                            </button>
                        </div>
                    </li>
                </ol>
            </div>


        </form>
    </div>
</div>
