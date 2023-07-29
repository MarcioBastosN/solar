<div>
    <p class="text-center">
        Você pode enviar Todos os arquivos ou Um por vez.
    </p>
    <form wire:submit.prevent='atualizar' class="max-w-xl mx-auto p-4 shadow-xl bg-form_color dark:bg-form_color_dark">
        <h3 class="font-medium leading-tight">Documentos</h3>
        <p class="text-sm">Arquivos diversos (foto ou
            pdf) até 1Mb</p>
        @foreach ($arquivosParaCorrigir as $item)
            @if ($item->documento == 'identificacao_pf_pj')
                <div class="mt-2 text-gray-700  ">
                    <label for="file_input_pf_pj">{{ $exibir_empresa == 'pj' ? 'CONTRATO SOCIAL' : 'Identidade ou CNH' }}
                    </label>
                    <input wire:model="identificacao_pf_pj" accept="image/*,.pdf"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                        cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input_identificacao_pf_pj" type="file">
                    @error('identificacao_pf_pj')
                        <span class="text-text_error">{{ $message }}</span>
                    @enderror

                    <div wire:loading wire:target="identificacao_pf_pj">Uploading...</div>
                </div>
            @endif

            @if ($item->documento == 'procuracao')
                <div class="mt-2 text-gray-700  ">
                    <label for="Procuracao_input">Procuração autenticada</label>
                    <input wire:model="Procuracao" accept="image/*,.pdf"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                    cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="Procuracao_input_help" id="Procuracao_input" type="file">
                    @error('Procuracao')
                        <span class="text-text_error">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="Procuracao">Uploading...</div>
                </div>
            @endif

            @if ($item->documento == 'fatura_da_uc')
                <div class="mt-2 text-gray-700  ">
                    <label for="uc_input">Fatura da uc geradora</label>
                    <input wire:model="Fatura" accept="image/*,.pdf"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                    cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="uc_input_help" id="uc_input" type="file">
                    @error('Fatura')
                        <span class="text-text_error">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="Fatura">Uploading...</div>
                </div>
            @endif

            @if ($item->documento == 'padrao_de_entrada')
                <div class="mt-2 text-gray-700  ">
                    <label for="entrada_input">Foto do padrão de entrada</label>
                    <input wire:model="Padrao" accept="image/*,.pdf"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                    cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="entrada_input_help" id="entrada_input" type="file">
                    @error('Padrao')
                        <span class="text-text_error">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="Padrao">Uploading...</div>
                </div>
            @endif

            @if ($item->documento == 'datasheet')
                <div class="mt-2 text-gray-700  ">
                    <label for="Datasheet">Datasheet</label>
                    <input wire:model="Datasheet" accept="image/*,.pdf"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="Datasheet_help" id="Datasheet" type="file">
                    @error('Datasheet')
                        <span class="text-text_error">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="Datasheet">Uploading...</div>
                </div>
            @endif
        @endforeach

        <button type="submit"
            class="w-full bg-gray-400 h-12 rounded-lg border-spacing-2
                border-2-secondary text-center shadow-xl ring-4 ring-white
                hover:bg-primary hover:text-secondary my-2">
            Salvar
        </button>
    </form>

</div>
