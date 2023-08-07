<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="bg-white ">
        <div class="container w-full mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2">
                    <p>Bem vindo a editar documentos</p>
                    @forelse ($project as $item)
                        <p class="my-2">
                            @if (empty($item->documento))
                                Nota: {{ $item->notas }}
                            @else
                                Documento: {{ $item->documento }}
                            @endif
                        </p>
                    @empty
                        <p>vazio</p>
                    @endforelse
                </div>
                <div class="w-full sm:w-1/2">
                    dados
                    {{ $idProjeto }} / {{ $idStatus }}
                </div>
            </div>
        </div>
    </section>

</div>
