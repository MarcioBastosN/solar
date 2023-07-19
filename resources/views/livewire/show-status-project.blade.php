<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="grid grid-cols-2 my-2 mx-4">
        <div class="mx-4">
            <p><b>Status possiveis do Projeto</b></p>
            <hr>
            @foreach ($statusProject as $status)
                <p>{{ $status->label }}</p>
            @endforeach
        </div>
        <div class="mx-4">
            <p><b>Status possiveis dos Documentos</b></p>
            <hr>
            @foreach ($statusDocumentos as $status)
                <p>{{ $status->label }}</p>
            @endforeach
        </div>
    </div>
</div>
