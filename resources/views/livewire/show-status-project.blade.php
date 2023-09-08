<div>
    <section class="bg-white ">
        <div class="container w-full mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2">
                    <div class="mx-4 my-2">
                        <div class="text-primary font-bold text-lg my-2 flex-auto">
                            Status possiveis do Projeto
                        </div>
                        <hr>
                        <table class="w-full text-sm text-left text-primary">
                            <thead class="text-xs text-primary uppercase bg-gray-400 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusProject as $status)
                                    <tr class="bg-white border-b text-primary">
                                        <td class="px-6 py-4">
                                            {{ $status->label }}
                                        </td>
                                        <td class="px-6 py-4">açao</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full sm:w-1/2">
                    <div class="mx-4 my-2">
                        <div class="text-primary font-bold text-lg my-2 flex-auto">
                            Status possiveis dos Documentos
                        </div>
                        <hr>
                        <table class="w-full text-sm text-left text-primary ">
                            <thead class="text-xs text-primary uppercase bg-gray-400 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusDocumentos as $status)
                                    <tr class="bg-white border-b text-primary">
                                        <td class="px-6 py-4">
                                            {{ $status->label }}
                                        </td>
                                        <td class="px-6 py-4">Actions</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
