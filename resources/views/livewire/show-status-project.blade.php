<div>
    <section class="bg-white ">
        <div class="container w-full mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2">
                    <div class="mx-4 my-2">
                        <p><b>Status possiveis do Projeto</b></p>
                        <hr>
                        @foreach ($statusProject as $status)
                            <p>{{ $status->label }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="w-full sm:w-1/2">
                    <div class="mx-4 my-2">
                        <p><b>Status possiveis dos Documentos</b></p>
                        <hr>
                        @foreach ($statusDocumentos as $status)
                            <p>{{ $status->label }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
